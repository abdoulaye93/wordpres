<?php
/**
 * @package  paydunyaWoocommercePsrGateway
 */
/*
Plugin Name: paydunya-woocommerce-psr-gateway
Plugin URI: https://paydunya.com/developers/wordpress-psr
Description: Intégrer facilement des paiements via Orange Money dans votre site WooCommerce et commencer à accepter les paiements depuis le Sénégal.
Version: 1.0.0
Author: PAYDUNYA
Author URI: https://paydunya.com

*/
// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_alecaddd_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_paydunya_woocommerce_psr_gateway' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_alecaddd_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_paydunya_woocommerce_psr_gateway' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}