<?php
/**
 * @package   paydunyaWoocommercePsrGateway
 */
namespace Inc\Base;
use \Inc\Base\BaseController;

class WiApi extends BaseController
{

    public function register() {
       add_action('rest_api_init',function (){
           register_rest_route('test','paydunya-api',[
               'methods' => 'GET',
               'callback' => array( $this, 'paydunya_api' ),
           ]);
       });
    }

    function paydunya_api(){

        \Paydunya\Setup::setMasterKey("wQzk9ZwR-Qq9m-0hD0-zpud-je5coGC3FHKW");
//        Paydunya_Setup::setMasterKey("RuD3LUEr-3yUG-YY0c-NsW2-8YaOVSNfLmFK");
//        Paydunya_Setup::setPublicKey("live_public_anztOZ9CVTzqnlp9cA9p3WpT5aK");
//        Paydunya_Setup::setPrivateKey("live_private_mVgWy0BOqTdXPfQcPQxfMJ1aeMl");
//        Paydunya_Setup::setToken("T0NHU17wZgbmoqu5LQ2R");
//        Paydunya_Setup::setMode("live");
//        Paydunya_Checkout_Store::setName("Magasin Chez Sandra");
//        $invoice = new Paydunya_Checkout_Invoice();
//        $invoice->setTotalAmount((int)WC()->cart->get_cart_contents_total());
//
//        if($invoice->create()) {
//
//            $test = "{\"success\":true,\"token\":\"".$invoice->token."\"}";
//            echo  $test;
//
//        }else{
//            echo $invoice->response_text;
//        }
    }
}