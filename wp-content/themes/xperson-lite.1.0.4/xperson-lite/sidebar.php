<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage xPerson Lite
 * @since xPerson Lite 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'primary-sidebar' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<?php dynamic_sidebar( 'primary-sidebar' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>