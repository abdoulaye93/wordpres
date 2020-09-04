<?php
/**
 * The Header for our theme.
 * @package WordPress
 * @SketchThemes
 */
global $xpersonlite; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<span id="xperson-top"></span>
	
	<?php if( isset( $xpersonlite['skt-preloader-image']['url'] ) &&  $xpersonlite['skt-preloader-image']['url'] != '' ) { ?>
	<!-- Preloader -->
	<div id="tt-preloader">
		<div id="pre-status">
			<div class="preload-placeholder"></div>
		</div>
	</div>
	<?php } ?>
	
	<?php if( is_front_page() ) { ?>
	<!-- Home Section -->
	<section id="home" class="tt-fullHeight" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
		<div class="intro">
			<?php if( isset($xpersonlite['skt-header-subtitle']) && $xpersonlite['skt-header-subtitle'] != '' ) { ?>
				<div class="intro-sub">
					<?php echo esc_html( $xpersonlite['skt-header-subtitle'] ); ?>
				</div>
			<?php } ?>
			<?php if( isset($xpersonlite['skt-header-title']) && $xpersonlite['skt-header-title'] != '' ) { ?>
				<h1><?php echo wp_kses( $xpersonlite['skt-header-title'], array( 'span'=> array() ) ); ?></h1>
			<?php } ?>
			<?php if( isset($xpersonlite['skt-header-text']) && $xpersonlite['skt-header-text'] != '' ) { ?>
				<div class="intro-header-text">
				<?php echo esc_html( $xpersonlite['skt-header-text'] ); ?>
				</div>
			<?php } ?>

			<div class="social-icons">
				<ul class="social-list-inline">
					<?php if( isset($xpersonlite['facebook-url']) && $xpersonlite['facebook-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['facebook-url'] ); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php } if( isset($xpersonlite['twitter-url']) && $xpersonlite['twitter-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['twitter-url'] ); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php } if( isset($xpersonlite['behance-url']) && $xpersonlite['behance-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['behance-url'] ); ?>"><i class="fa fa-behance"></i></a></li>
					<?php } if( isset($xpersonlite['dribbble-url']) && $xpersonlite['dribbble-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['dribbble-url'] ); ?>"><i class="fa fa-dribbble"></i></a></li>
					<?php } if( isset($xpersonlite['pinterest-url']) && $xpersonlite['pinterest-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['pinterest-url'] ); ?>"><i class="fa fa-pinterest"></i></a></li>
					<?php } if( isset($xpersonlite['google-plus-url']) && $xpersonlite['google-plus-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['google-plus-url'] ); ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php } if( isset($xpersonlite['linkedin-url']) && $xpersonlite['linkedin-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['linkedin-url'] ); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php } if( isset($xpersonlite['instagram-url']) && $xpersonlite['instagram-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['instagram-url'] ); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php } if( isset($xpersonlite['xing-url']) && $xpersonlite['xing-url'] != '' ) { ?>
						<li class="hex"><a href="<?php echo esc_url( $xpersonlite['xing-url'] ); ?>"><i class="fa fa-xing"></i></a></li>
					<?php } ?>
				</ul>
			</div> <!-- /.social-icons -->
		</div>

		<div class="mouse-icon">
			<div class="wheel"></div>
		</div>
	</section><!-- End Home Section -->
	<?php } ?>


	<!-- Navigation -->
	<header class="header">
		<nav class="navbar navbar-custom">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
						<span class="sr-only"><span class="screen-reader-text"><?php esc_html_e('Toggle navigation', 'xperson-lite') ?></span></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php xperson_lite_custom_logo(); ?>
				</div>

				<div class="collapse navbar-collapse" id="custom-collapse">
				<?php if( has_nav_menu( 'landing_page_nav')  ){
					wp_nav_menu( array('theme_location' => 'landing_page_nav', 'menu_class' => 'nav navbar-nav navbar-right', 'menu_id' => 'menu', 'container' => '') );
				} else { ?>
					<ul id="menu" class="nav navbar-nav navbar-right">
						<?php wp_list_pages('title_li'); ?>
					</ul>
				<?php } ?>
				</div>
			</div><!-- .container -->
		</nav>
	</header><!-- End Navigation -->

	<?php if( ! is_front_page() ) {
		get_template_part('includes/breadcrumb', 'section');
	} ?>
