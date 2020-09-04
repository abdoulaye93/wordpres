<?php if ( 'page' == get_option( 'show_on_front' ) ) {

	get_header(); ?>

	<!-- EDITOR CONTENT -->
	<?php get_template_part( 'includes/front', 'editor-content' ); ?>

	<!-- TIMELINE SECTION -->
	<?php get_template_part( 'includes/front', 'timeline-section' ); ?>

	<!-- LANDING PAGE SECTION -->
	<?php get_template_part( 'includes/front', 'landing-section' ); ?>

	<?php get_footer();

} else {

	include( get_home_template() );

} ?>