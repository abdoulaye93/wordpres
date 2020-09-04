<?php
/**
 * The template for displaying search results pages
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

			<?php if ( have_posts() ) :

				// Start the loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content' );

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'		  => esc_html__( 'Previous', 'xperson-lite' ),
					'next_text'		  => esc_html__( 'Next', 'xperson-lite' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'xperson-lite' ) . ' </span>',
				) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>

			</main><!-- .site-main -->
		</div><!-- .content-area -->

	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
