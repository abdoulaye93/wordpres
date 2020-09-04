<?php
/**
 * The template for displaying all single posts and attachments
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
										<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
											<span class="sticky-post"><i class="fa fa-star-o"></i> <?php esc_html_e( 'Featured', 'xperson-lite' ); ?></span>
										<?php endif; ?>
										
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header><!-- .entry-header -->
								<?php }

								xperson_lite_post_thumbnail(); ?>

								<div class="blog-post-content">

									<div class="entry-summary clearfix">
										<?php
											// Full Content
											the_content();

											wp_link_pages( array(
												'before'	  => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'xperson-lite' ) . '</span>',
												'after'	   => '</div>',
												'link_before' => ' <span>',
												'link_after'  => '</span> ',
												'pagelink'	=> '<span class="screen-reader-text">' . esc_html__( 'Page', 'xperson-lite' ) . ' </span>%',
												'separator'   => '<span class="screen-reader-text">, </span>',
											) );
										?>
									</div><!-- .entry-content -->
									<hr>
									<footer class="entry-footer">
										<div class="entry-meta">
											<ul class="list-inline">
												<?php if( has_category() ){ ?>
												<li class="post-meta">
													<span class="the-category"> 
														<i class="fa fa-folder-open"></i> <?php the_category( ', ' ); ?>
													</span>
												</li>
												<?php } ?>
												<li class="post-meta">
													<?php the_tags('<span class="tag-name"><i class="fa fa-tag"></i> ',', ','</span>'); ?>
												</li>
												<br/>
												<li>
													<span class="the-author">
														<?php the_author_posts_link(); ?>
													</span>
												</li>
												<li>
													<span class="the-time">
														<?php echo wp_kses_post( xperson_lite_post_published_link() ); ?>
													</span>
												</li>
												<!-- <li>
												<span class="the-share">
												<a href="#" title="share">30</a>
												</span>
												</li> -->
												<li>
													<span class="the-comments">
														<?php comments_popup_link(__(' No Comments ','xperson-lite'), esc_html__(' 1 Comment ','xperson-lite'), esc_html__(' % Comments ','xperson-lite'), '', esc_html__(' Comments off ','xperson-lite') );
														?>
													</span>
												</li>
											</ul>
										</div><!-- .entry-meta -->
										<?php
											edit_post_link(
												sprintf(
													/* translators: %s: Name of current post */
													__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'xperson-lite' ),
													get_the_title()
												),
												'<div class="edit-link">',
												'</div>'
											);
										?>
									</footer><!-- .entry-footer -->
								</div>
							</article><!-- #post-## -->
					 	<?php 

					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => esc_html_x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'xperson-lite' ),
						) );
					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'xperson-lite' ) . '</span> ' .
								'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'xperson-lite' ) . '</span> ',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'xperson-lite' ) . '</span> ' .
								'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'xperson-lite' ) . '</span> ',
						) );
					} ?>

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
