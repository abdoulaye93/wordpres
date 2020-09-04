<?php 
/**
 * @package  paydunyaWoocommercePsrGateway
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;




/**
* 
*/
class Admin extends BaseController
{
    public $settings;

    public $callbacks;
    public $callbacks_mngr;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'Setting' )->addSubPages( $this->subpages )->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Paydunya Plugin',
                'menu_title' => 'Paydunya',
                'capability' => 'manage_options',
                'menu_slug' => 'paydunya_woocommerce_psr_gateway',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
//            array(
//                'parent_slug' => 'paydunya_woocommerce_psr_gateway',
//                'page_title' => 'Custom Post Types',
//                'menu_title' => 'Ajouter un produit',
//                'capability' => 'manage_options',
//                'menu_slug' => 'alecaddd_cpt',
//                'callback' => array( $this->callbacks, 'adminWidget' )
//            )

        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'paydunya_woocommerce_psr_gateway_options_group',
                'option_name' => 'master_key',
                'callback' => array( $this->callbacks, 'paydunyaWoocommercePsrGateway' )
            ),
            array(
                'option_group' => 'paydunya_woocommerce_psr_gateway_options_group',
                'option_name' => 'live_private_key'
            ),
            array(
                'option_group' => 'paydunya_woocommerce_psr_gateway_options_group',
                'option_name' => 'live_token'
            ),
            array(
                'option_group' => 'paydunya_woocommerce_psr_gateway_options_group',
                'option_name' => 'test_private_key'
            ),
            array(
                'option_group' => 'paydunya_woocommerce_psr_gateway_options_group',
                'option_name' => 'test_token'
            ),
            array(
                'option_group' => 'paydunya_woocommerce_psr_gateway_options_group',
                'option_name' => 'mode_live'
            ),
            array(
                'option_group' => 'paydunya_woocommerce_psr_gateway_options_group',
                'option_name' => 'mode_test'
            )
        );

        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'title' => 'Settings',
                'callback' => array( $this->callbacks, 'paydunyaWoocommercePsrGatewayAdminSection' ),
                'page' => 'paydunya_woocommerce_psr_gateway'
            )
        );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'master_key',
                'callback' => array( $this->callbacks, 'paydunyaWoocommercePsrGatewayTextExample' ),
                'page' => 'paydunya_woocommerce_psr_gateway',
                'section' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'args' => array(
                    'label_for' => 'master_key',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'live_private_key',
                'title' => 'live_private_key ',
                'callback' => array( $this->callbacks, 'paydunyaWoocommercePsrGatewayLivePrivateKey' ),
                'page' => 'paydunya_woocommerce_psr_gateway',
                'section' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'args' => array(
                    'label_for' => 'live_private_key',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'live_token',
                'title' => 'live_token ',
                'callback' => array( $this->callbacks, 'paydunyaWoocommercePsrGatewayLiveToken' ),
                'page' => 'paydunya_woocommerce_psr_gateway',
                'section' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'args' => array(
                    'label_for' => 'live_token',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'test_private_key',
                'title' => 'test_private_key ',
                'callback' => array( $this->callbacks, 'paydunyaWoocommercePsrGatewayTestPrivateKey' ),
                'page' => 'paydunya_woocommerce_psr_gateway',
                'section' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'args' => array(
                    'label_for' => 'test_private_key',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'test_token',
                'title' => 'test_token ',
                'callback' => array( $this->callbacks, 'paydunyaWoocommercePsrGatewayTestToken' ),
                'page' => 'paydunya_woocommerce_psr_gateway',
                'section' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'args' => array(
                    'label_for' => 'test_token',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'mode_live',
                'title' => 'mode live ',
                'callback' => array( $this->callbacks_mngr, 'checkboxField1' ),
                'page' => 'paydunya_woocommerce_psr_gateway',
                'section' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'args' => array(
                    'label_for' => 'mode_live',
                )
            ),
            array(
                'id' => 'mode_test',
                'title' => 'mode test',
                'callback' => array( $this->callbacks_mngr, 'checkboxField2' ),
                'page' => 'paydunya_woocommerce_psr_gateway',
                'section' => 'paydunya_woocommerce_psr_gateway_admin_index',
                'args' => array(
                    'label_for' => 'mode_test',
                )
            ),
        );

        $this->settings->setFields( $args );
    }
}