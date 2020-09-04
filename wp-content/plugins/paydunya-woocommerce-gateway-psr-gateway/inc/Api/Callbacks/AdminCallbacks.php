<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminWidget()
	{
		return require_once( "$this->plugin_path/templates/widget.php" );
	}

    public function paydunyaWoocommercePsrGatewayOptionsGroup( $input )
    {
        return $input;
    }

    public function paydunyaWoocommercePsrGatewayAdminSection()
    {
        echo 'Enter your compte paydunya parameters here ';
    }

    public function paydunyaWoocommercePsrGatewayTextExample()
    {
        $value = esc_attr( get_option( 'master_key' ) );
        echo '<input type="text" class="regular-text" name="master_key" value="' . $value . '" placeholder="Enter your master_key!">';
    }

    public function paydunyaWoocommercePsrGatewayLivePrivateKey()
    {
        $value = esc_attr( get_option( 'live_private_key' ) );
        echo '<input type="text" class="regular-text" name="live_private_key" value="' . $value . '" placeholder="Enter your love_private_key">';
    }
    public function paydunyaWoocommercePsrGatewayLiveToken()
    {
        $value = esc_attr( get_option( 'live_token' ) );
        echo '<input type="text" class="regular-text" name="live_token" value="' . $value . '" placeholder="Enter your live_token">';
    }

    public function paydunyaWoocommercePsrGatewayTestPrivateKey()
    {
        $value = esc_attr( get_option( 'test_private_key' ) );
        echo '<input type="text" class="regular-text" name="test_private_key" value="' . $value . '" placeholder="Enter your test_private_key">';
    }

    public function paydunyaWoocommercePsrGatewayTestToken()
    {
        $value = esc_attr( get_option( 'test_token' ) );
        echo '<input type="text" class="regular-text" name="test_token" value="' . $value . '" placeholder="Enter your test_token">';
    }

    public function paydunyaWoocommercePsrGatewayModeLive()
    {
        $value = esc_attr( get_option( 'mode_live' ) );
        echo '<input type="radio" class="regular-text" name="mode" value="' . $value . '" ">';
    }


}