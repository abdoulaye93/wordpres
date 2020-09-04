<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage xPerson Lite
 * @since xPerson Lite 1.0.0
 */

get_header(); ?>

<div id="content" class="site-content container">
	<div class="row">
		<div id="primary" class="content-area col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<main id="main" class="site-main">
				<section class="error-404 not-found">
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'xperson-lite' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- .site-main -->
		</div><!-- .content-area -->
	
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>