<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage xPerson Lite
 * @since xPerson Lite 1.0.0
 */
?>

<article id="post-none" <?php post_class('blog-post-wrapper'); ?>>

	<div class="blog-post-content">
		<header class="entry-header">
			<h2 class="entry-title"><i class="fa fa-exclamation"></i> <?php esc_html_e('Nothing Found', 'xperson-lite'); ?></h2>
		</header><!-- .entry-header -->

		<div class="entry-summary clearfix">
			<p><?php esc_html_e('Try searching...', 'xperson-lite'); ?></p>
			<?php get_search_form(); ?>			
		</div><!-- .entry-content -->
		
	</div>
</article><!-- #post-## -->
