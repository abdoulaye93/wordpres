<?php 
/**
 * @package  paydunyaWoocommercePsrGateway
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/css/setting.css' );
		wp_enqueue_script( 'myjqueryscript', "https://code.jquery.com/jquery.min.js");
		wp_enqueue_script( 'mysettingscript', $this->plugin_url . 'assets/setting.js' );
		wp_enqueue_script( 'mypaydunyascript', "https://paydunya.com/assets/psr/js/psr.paydunya.min.js");
	}
}