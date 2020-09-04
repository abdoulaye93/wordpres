<?php
/**
 * The template part for displaying editor content and recent blog
 *
 * @package WordPress
 * @subpackage SketchThemes
 * @since xPerson Lite 1.0.0
 */
?>
<!-- PAGE EDITER CONTENT -->
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<section id="front-page-section" class="front-sections section-padding">
	 		<div class="skt-page-overlay"></div>
	 		<div class="skt-page-content">
				<div class="container">
					<div class="row">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>