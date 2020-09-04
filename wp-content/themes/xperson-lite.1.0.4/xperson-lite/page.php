<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage xPerson Lite
 * @since xPerson Lite 1.0.0
 */

get_header();
global $xpersonlite, $post;

$gbreadcrumb_section_on_off = isset( $xpersonlite['skt-breadcrumb-section'] ) ? $xpersonlite['skt-breadcrumb-section'] : 'on';
$breadcrumb_section_on_off  = get_post_meta( $post->ID, 'breadcrumb_section_on_off', true);
$gbreadcrumb_section_on_off = ( isset($breadcrumb_section_on_off) && $breadcrumb_section_on_off != '' ) ? $breadcrumb_section_on_off : $gbreadcrumb_section_on_off;
?>
<div id="content" class="site-content container">
	<div class="row">
		<div id="primary" class="content-area col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<main id="main" class="site-main">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if( $gbreadcrumb_section_on_off == 'off' ) { ?>
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
						<?php }
						xperson_lite_post_thumbnail(); ?>
						
						<div class="blog-post-content">
							<div class="entry-content clearfix">
								<?php
								the_content();

								wp_link_pages( array(
									'before'	  => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'xperson-lite' ) . '</span>',
									'after'	   => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
									'pagelink'	=> '<span class="screen-reader-text">' . esc_html__( 'Page', 'xperson-lite' ) . ' </span>%',
									'separator'   => '<span class="screen-reader-text">, </span>',
								) );
								?>
							</div><!-- .entry-content -->

							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'xperson-lite' ),
										get_the_title()
									),
									'<footer class="entry-footer"><span class="edit-link">',
									'</span></footer><!-- .entry-footer -->'
								);
							?>
						</div>
					</article><!-- #post-## -->					

					<?php // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) { ?>
						<div class="comments-post-wrapper">
							<?php comments_template(); ?>
						</div>
					<?php }
					// End of the loop.
				endwhile;
				?>
			</main><!-- .site-main -->
		</div><!-- .content-area -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
