<?php global $xpersonlite;

$imagepath  =  get_template_directory_uri() . '/images/';

$primary_color = isset( $xpersonlite['skt-primary-color'] ) ? $xpersonlite['skt-primary-color'] : '#009387';
$secondary_color = isset( $xpersonlite['skt-secondary-color'] ) ? $xpersonlite['skt-secondary-color'] : '#2e383e';

$header_overlay_color = isset( $xpersonlite['skt-header-overlay-color']['rgba'] ) ? $xpersonlite['skt-header-overlay-color']['rgba'] : 'rgba(26, 30, 35, 0.7)';

$footer_bgcolor = isset( $xpersonlite['skt-footer-background-color'] ) ? $xpersonlite['skt-footer-background-color'] : '#1a1e23';
$footer_color = isset( $xpersonlite['skt-footer-font-color'] ) ? $xpersonlite['skt-footer-font-color'] : '#fff';

$rgb = array();
$rgb = xperson_lite_Hex2RGB( $primary_color );
$R = $rgb['red'];
$G = $rgb['green'];
$B = $rgb['blue'];

$primary_rgba_color = "rgba(". $R .",". $G .",". $B .",.4)";
$primary_bdrgba_color = "rgba(". $R .",". $G .",". $B .",.7)";

// Pre Loader Image
$preloader_image = ( isset( $xpersonlite['skt-preloader-image']['url'] ) && $xpersonlite['skt-preloader-image']['url'] != '' ) ? $xpersonlite['skt-preloader-image']['url'] : $imagepath.'preloader.gif';


// Global Breadcrumb Options
$gbreadcrumb_background_image= ( isset($xpersonlite['skt-breadcrumb-image']['url']) ) ? $xpersonlite['skt-breadcrumb-image']['url']: '';
$gbreadcrumb_image_repeat	= ( isset($xpersonlite['skt-breadcrumb-image-repeat']) ) ? $xpersonlite['skt-breadcrumb-image-repeat']: 'no-repeat';
$gbreadcrumb_image_attach	= ( isset($xpersonlite['skt-breadcrumb-image-attach']) ) ? $xpersonlite['skt-breadcrumb-image-attach']: 'scroll';
$gbreadcrumb_image_position	= ( isset($xpersonlite['skt-breadcrumb-image-position']) ) ? $xpersonlite['skt-breadcrumb-image-position']: 'center';
$gbreadcrumb_image_size		= ( isset($xpersonlite['skt-breadcrumb-image-size']) ) ? $xpersonlite['skt-breadcrumb-image-size']: 'cover';
$gbreadcrumb_overlay_color	= ( isset($xpersonlite['skt-breadcrumb-overlay-color']) ) ? $xpersonlite['skt-breadcrumb-overlay-color']: '#000';
$gbreadcrumb_overlay_opacity= ( isset($xpersonlite['skt-breadcrumb-overlay-opacity']) ) ? $xpersonlite['skt-breadcrumb-overlay-opacity']: '0.5';

$rgb = xperson_lite_Hex2RGB( $gbreadcrumb_overlay_color );
$R = $rgb['red'];
$G = $rgb['green'];
$B = $rgb['blue'];
$gbreadcrumb_overlay_color = "rgba(". $R .",". $G .",". $B .", $gbreadcrumb_overlay_opacity)";


?>
<style>
	body {
	<?php // Typography
		echo 'color:'.esc_attr($xpersonlite['skt-typography']['color']).'; font-weight:'.esc_attr($xpersonlite['skt-typography']['font-style']).'; font-family:"'.esc_attr($xpersonlite['skt-typography']['font-family']).'"; font-size:'.esc_attr($xpersonlite['skt-typography']['font-size']).'; line-height:'.esc_attr($xpersonlite['skt-typography']['line-height']);
	 ?> }

	#pre-status, .preload-placeholder {
		background-image: url('<?php echo esc_url($preloader_image); ?>');
	}

	<?php if ( has_header_image() ): ?>
		#home { background-image: url('<?php header_image(); ?>'); }
		#home:before{ background-color: <?php echo esc_attr($header_overlay_color); ?>; }
	<?php else:; ?>
		#home{display: none;}
	<?php endif; ?>

	/* Color Primary */
	a:hover,
	a:focus,
	.widget a:hover,
	.btn-default:hover, 
	.btn-default:focus, 
	.btn-default.focus, 
	.btn-default:active, 
	.btn-default.active,
	ul.list-check li::before,
	.intro h1 span,
	.navbar-custom .nav li.active,
	.navbar-custom .nav li a:hover,
	.navbar-custom .nav li a:focus,
	.navbar-custom .navbar-nav > li.active > a,
	.the-category a,
	.figure i,
	.entry-title a:hover,
	.entry-meta ul li a:hover,
	.personal-info h1 span,
	.hex-mid .hex:hover i,
	.timeline>li:hover .posted-date {
		color: <?php echo esc_attr($primary_color); ?>;
	}

	/* Background Color Primary */
	.btn-primary,
	input[type="submit"],
	input[type="button"],
	button,
	.video-intro a:hover,
	.progress-bar,
	.links a:hover i::after,
	.portfolio-info,
	.posted-date:before,
	.posted-date:after,
	.hex:hover,
	.owl-dot.active,
	.skt-quote,
	blockquote,
	.scroll-up .hex,
	.tagcloud a:hover,
	.tagcloud a:focus {
		background-color: <?php echo esc_attr($primary_color); ?>;
	}

	/* Background Primary */
	.social-icons a i:hover::after,
	.timeline>li:hover .timeline-content,
	#filter li a:hover,
	#filter li a.active {
		background: <?php echo esc_attr($primary_color); ?>;
	}

	/* Border Color Primary */
	input:focus, textarea:focus, .form-control:focus, .hex:hover, .hex:hover:before, .hex:hover:after, .video-intro a:hover, .scroll-up .hex, .scroll-up .hex:before, .scroll-up .hex:after, .tagcloud a:hover, .tagcloud a:focus {
		border-color: <?php echo esc_attr($primary_color); ?>;
	}

	/* Custom Border Color Primary */
	.navbar-custom .dropdown-menu {
		border-top: 2px solid <?php echo esc_attr($primary_color); ?>;
	}
	.timeline>li:hover .timeline-panel::before,
	.timeline>li:hover .timeline-panel::after {
		border-left: 12px solid <?php echo esc_attr($primary_color); ?>;
	}
	.timeline>li.timeline-inverted:hover .timeline-panel::before,
	.timeline>li.timeline-inverted:hover .timeline-panel::after {
		border-right: 12px solid <?php echo esc_attr($primary_color); ?>;
	}
	blockquote {
		border-left: 5px solid  <?php echo esc_attr($primary_color); ?>;
	}

	/* Secondary Color */
	.the-category a:hover{
		color: <?php echo esc_attr($secondary_color); ?>;
	}
	
	/* Secondary Background Color */
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	input[type="submit"]:hover,
	input[type="submit"]:focus,
	input[type="submit"]:active,
	input[type="button"]:hover,
	input[type="button"]:focus,
	input[type="button"]:active,
	button:hover,
	button:focus,
	button:active,
	.open>.dropdown-toggle.btn-primary,
	.btn-info:hover,
	.btn-info:focus,
	.btn-info.focus,
	.btn-info:active,
	.btn-info.active,
	.open>.dropdown-toggle.btn-info, 
	.scroll-up .hex:hover, .scroll-up .hex:hover:before, .scroll-up .hex:hover:after {
		background-color: <?php echo esc_attr($secondary_color); ?> !important;
	}

	/* Secondary Border Color */
	.scroll-up .hex:hover, .scroll-up .hex:hover:before, .scroll-up .hex:hover:after {
		border-color: <?php echo esc_attr($secondary_color); ?> !important;
	}

	/* Footer */
	.footer-wrapper, .footer-wrapper a:hover {
		background: <?php echo esc_attr($footer_bgcolor); ?>;
		color: <?php echo esc_attr($footer_color); ?>;
	}

	/* Breadcrumb */
	.page-header{
		background-color : <?php echo esc_attr($gbreadcrumb_overlay_color); ?>;
		color: #<?php header_textcolor(); ?>;
	}
	.intro-header-text, .intro-sub, .intro h1, .page-header a{
		color: #<?php header_textcolor(); ?>;
	}
	#page-header-overlay{
		background-image : url('<?php echo esc_url($gbreadcrumb_background_image); ?>');
		background-repeat : <?php echo esc_attr($gbreadcrumb_image_repeat); ?>;
		background-attachment : <?php echo esc_attr($gbreadcrumb_image_attach); ?>;
		background-position: <?php echo esc_attr($gbreadcrumb_image_position); ?>;
		background-size : <?php echo esc_attr($gbreadcrumb_image_size); ?>;
	}

	/* Shortcodes */
	.custom_list li:before{
		color: <?php echo esc_attr($primary_color); ?>;
	}
</style>