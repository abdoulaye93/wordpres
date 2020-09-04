<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage xPerson Lite
 * @since xPerson Lite 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php xperson_lite_post_thumbnail(); ?>
	
	<div class="blog-post-content">
		<header class="entry-header">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="sticky-post"><i class="fa fa-star-o"></i> <?php esc_html_e( 'Featured', 'xperson-lite' ); ?></span>
			<?php endif; ?>
			<div class="post-meta">
				<span class="the-category"> 
					<?php the_category( ', ' ); ?>
				</span>
			</div>

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary clearfix">
			<?php
				/* translators: %s: Name of current post */
				the_excerpt( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xperson-lite' ),
					get_the_title()
				) );

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
					<li>
						<span class="the-comments">
							<?php comments_popup_link( sprintf( esc_html__( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'xperson-lite' ), get_the_title() ) ); ?>
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
