<?php
/**
 * @package  paydunyaWoocommercePsrGateway
 */
namespace Inc\Base;


class PostController extends BaseController
{
    public function register()
    {
        add_action( 'init', array( $this, 'activate' ) );
    }

    public function activate()
    {
        register_post_type( 'paydunya_products',
            array(
                'labels' => array(
                    'name' => 'Products',
                    'singular_name' => 'Product'
                ),
                'public' => true,
                'has_archive' => true,
            )
        );
    }
}