<?php

/*
Plugin Name: paydunya-psr
Plugin URI: https://paydunya.com/developers/wordpress
Description: Intégrer facilement des paiements via Orange Money dans votre site WooCommerce et commencer à accepter les paiements depuis le Sénégal.
Version: 1.0
Author: PAYDUNYA
Author URI: https://paydunya.com
*/

if (!defined('ABSPATH')) {
    exit;
}

if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    exit;
}

add_action('plugins_loaded', 'woocommerce_paydunya_init', 0);

function woocommerce_paydunya_init() {
    if (!class_exists('WC_Payment_Gateway'))
        return;

    class WC_Paydunya extends WC_Payment_Gateway {

        public function __construct() {
            wp_enqueue_style( 'mypluginstyle', 'https://paydunya.com/assets/psr/css/psr.paydunya.min.css' );
            wp_enqueue_script( 'mypaydunyascript', "https://paydunya.com/assets/psr/js/psr.paydunya.min.js");
            wp_enqueue_script( 'jquery', "https://code.jquery.com/jquery.min.js");
            wp_enqueue_script( 'mypaydunyconfigjquery', plugins_url('assets/setting.js', __FILE__));
            wp_enqueue_script( 'mypaydunyconfig', plugins_url('assets/config.js', __FILE__));
            wp_register_script('custom-js',WP_PLUGIN_URL.'/PLUGIN_NAME/js/custom.js',array(),NULL,true);
            wp_enqueue_script('custom-js');

            $wnm_custom = array( 'template_url' => get_bloginfo('siteurl') );
            wp_localize_script( 'custom-js', 'wnm_custom', $wnm_custom );
            $this->paydunya_errors = new WP_Error();

            $this->id = 'paydunya';
            $this->medthod_title = 'PAYDUNYA';
            $this->icon = apply_filters('woocommerce_paydunya_icon', plugins_url('assets/images/logo.png', __FILE__));
            $this->has_fields = false;

            $this->init_form_fields();
            $this->init_settings();

            $this->title = $this->settings['title'];
            $this->description = $this->settings['description'];

            $this->live_master_key = $this->settings['master_key'];

            $this->live_private_key = $this->settings['live_private_key'];
            $this->live_token = $this->settings['live_token'];

            $this->test_private_key = $this->settings['test_private_key'];
            $this->test_token = $this->settings['test_token'];

            $this->sandbox = $this->settings['sandbox'];


            if (version_compare(WOOCOMMERCE_VERSION, '2.0.0', '>=')) {
                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(&$this, 'process_admin_options'));
            } else {
                add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
            }
        }

        public function paydunya_api(){

            require('vendor/paydunya.php');

            $k = new WC_Paydunya();

            if ($k->settings['sandbox'] == "yes") {
                Paydunya_Setup::setMasterKey($k->settings['master_key']);
                Paydunya_Setup::setPrivateKey($k->settings['test_private_key']);
                Paydunya_Setup::setToken($k->settings['test_token']);
                Paydunya_Setup::setMode("test");
            }else{
                Paydunya_Setup::setMasterKey($k->settings['master_key']);
                Paydunya_Setup::setPrivateKey($k->settings['live_private_key']);
                Paydunya_Setup::setToken($k->settings['live_token']);
                Paydunya_Setup::setMode("live");
            }

            Paydunya_Checkout_Store::setName(WC()->customer->get_first_name());
            $invoice = new Paydunya_Checkout_Invoice();
            $invoice->setTotalAmount((int)WC()->cart->get_cart_contents_total());
            $invoice->addCustomData('name',WC()->customer->get_first_name());
            $invoice->addCustomData('phone',WC()->customer->get_billing_phone());
            $invoice->addCustomData('email',WC()->customer->get_billing_email());

            if($invoice->create()) {

                $test = "{\"success\":true,\"token\":\"".$invoice->token."\"}";
                echo  $test;

            }else{
                echo $invoice->response_text;
            }
        }
        function shapeSpace_disable_scripts() {
            wp_deregister_script('woocommerce');
        }
        function init_form_fields() {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => __('Activer/Désactiver', 'paydunya'),
                    'type' => 'checkbox',
                    'label' => __('Activer le module de paiement PAYDUNYA.', 'paydunya'),
                    'default' => 'no'),
                'title' => array(
                    'title' => __('Titre:', 'paydunya'),
                    'type' => 'text',
                    'description' => __('Texte que verra le client lors du paiement de sa commande.', 'paydunya'),
                    'default' => __('Paiement avec PAYDUNYA', 'paydunya')),
                'description' => array(
                    'title' => __('Description:', 'paydunya'),
                    'type' => 'textarea',
                    'description' => __('Description que verra le client lors du paiement de sa commande.', 'paydunya'),
                    'default' => __('PAYDUNYA est la passerelle de paiement la plus populaire pour les achats en ligne au Sénégal.', 'paydunya')),
                'master_key' => array(
                    'title' => __('Clé Principale', 'paydunya'),
                    'type' => 'text',
                    'description' => __('Clé principale fournie par PAYDUNYA lors de la création de votre application.')),
                'live_private_key' => array(
                    'title' => __('Clé Privée de production', 'paydunya'),
                    'type' => 'text',
                    'description' => __('Clé Privée de production fournie par PAYDUNYA lors de la création de votre application.')),
                'live_token' => array(
                    'title' => __('Token de production', 'paydunya'),
                    'type' => 'text',
                    'description' => __('Token de production fourni par PAYDUNYA lors de la création de votre application.')),
                'test_private_key' => array(
                    'title' => __('Clé Privée de test', 'paydunya'),
                    'type' => 'text',
                    'description' => __('Clé Privée de test fournie par PAYDUNYA lors de la création de votre application.')),
                'test_token' => array(
                    'title' => __('Token de test', 'paydunya'),
                    'type' => 'text',
                    'description' => __('Token de test fourni par PAYDUNYA lors de la création de votre application.')),
                'sandbox' => array(
                    'title' => __('Activer le mode test', 'paydunya'),
                    'type' => 'checkbox',
                    'description' => __("Cocher cette case si vous êtes encore à l'etape des paiements tests.", 'paydunya'))
            );
        }


        static function add_paydunya_fcfa_currency($currencies) {
            $currencies['FCFA'] = __('BCEAO XOF', 'woocommerce');
            return $currencies;
        }

        static function add_paydunya_fcfa_currency_symbol($currency_symbol, $currency) {
            switch (
            $currency) {
                case 'FCFA': $currency_symbol = 'FCFA';
                    break;
            }
            return $currency_symbol;
        }

        static function woocommerce_add_paydunya_gateway($methods) {
            $methods[] = 'WC_Paydunya';
            return $methods;
        }

        // Add settings link on plugin page
        static function woocommerce_add_paydunya_settings_link($links) {
            $settings_link = '<a href="admin.php?page=wc-settings&tab=checkout&section=wc_paydunya">Paramètres</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

    }



    $plugin = plugin_basename(__FILE__);

    add_filter('woocommerce_currencies', array('WC_Paydunya', 'add_paydunya_fcfa_currency'));
    add_filter('woocommerce_currency_symbol', array('WC_Paydunya', 'add_paydunya_fcfa_currency_symbol'), 10, 2);

    add_filter("plugin_action_links_$plugin", array('WC_Paydunya', 'woocommerce_add_paydunya_settings_link'));
    add_filter('woocommerce_payment_gateways', array('WC_Paydunya', 'woocommerce_add_paydunya_gateway'));
    add_action('wp_print_scripts', array('WC_Paydunya', 'shapeSpace_disable_scripts'));

    add_action('rest_api_init',function (){
        register_rest_route('wp/v1','/paydunya-api/',[
            'methods' => 'GET',
            'callback' => array('WC_Paydunya','paydunya_api' ),
        ]);
    });


}