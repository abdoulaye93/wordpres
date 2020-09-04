<?php
function xperson_lite_stylesheet(){
	$theme = wp_get_theme();
	$version = $theme->Version;
	$css_directory_uri = get_template_directory_uri().'/css/';

	wp_enqueue_style('xperson-lite-google-font-roboto', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic', false, $version);
	wp_enqueue_style('xperson-lite-google-font-roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic', false, $version);
	wp_enqueue_style('bootstrap', $css_directory_uri.'bootstrap.css', false, $version);
	wp_enqueue_style('font-awesome', $css_directory_uri.'font-awesome.min.css', false, $version);
	wp_enqueue_style('animate', $css_directory_uri.'animate.css', false, $version);
	
	wp_enqueue_style('xperson-lite-stylesheet', get_stylesheet_uri(), false, $version);
	wp_enqueue_style('xperson-lite-responsive', $css_directory_uri.'responsive.css', false, $version);

}
add_action('wp_enqueue_scripts', 'xperson_lite_stylesheet');

function xperson_lite_script(){
	$theme = wp_get_theme();
	$version = $theme->Version;
	$js_directory_uri = get_template_directory_uri().'/js/';

	wp_enqueue_script('jquery');
    // [if lt IE 9]
    wp_enqueue_script('html5shiv', $js_directory_uri.'html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data('html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script('respond', $js_directory_uri.'respond.min.js', array(), '1.4.2' );
	wp_script_add_data('respond', 'conditional', 'lt IE 9' );
	wp_enqueue_script('bootstrap', $js_directory_uri.'bootstrap.min.js', array(), $version, true);
	wp_enqueue_script('sticky', $js_directory_uri.'jquery.sticky.js', array(), $version, true);
	wp_enqueue_script('smoothscroll', $js_directory_uri.'smoothscroll.js', array(), $version, true);
	wp_enqueue_script('wow', $js_directory_uri.'wow.min.js', array(), $version, true);
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('xperson-lite-scripts', $js_directory_uri.'scripts.js', array(), $version, true);
}
add_action('wp_enqueue_scripts', 'xperson_lite_script');

function xperson_lite_custom_css(){
	require_once( get_template_directory(). '/includes/custom-css.php' );	// theme custom css
}
add_action('wp_head', 'xperson_lite_custom_css');