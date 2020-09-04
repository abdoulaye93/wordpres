<?php
/**
 * The template part for displaying first landing section
 *
 * @package WordPress
 * @subpackage SketchThemes
 * @since xPerson Lite 1.0.0
 */
global $xpersonlite;

$xpersonlite_landing_page1 = ( isset($xpersonlite['skt-landing-page1']) && $xpersonlite['skt-landing-page1'] != '' ) ? $xpersonlite['skt-landing-page1'] : 'none';

if( $xpersonlite_landing_page1 != 'none' ) {
	$the_query = new WP_Query( array( 'page_id' => $xpersonlite_landing_page1 ) );
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<section id="section1" class="front-sections section-padding no-top">
	 		<div class="skt-page-overlay"></div>
	 		<div class="skt-page-content">
				<div class="container">
					<div class="row">
						<h2 class="section-title wow fadeInUp"><?php the_title(); ?></h2>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>
		<?php break;
		endwhile;
		wp_reset_postdata();
	endif;
} ?>