<?php  global $xpersonlite;
$xpersonlite_timeline_category = ( isset($xpersonlite['skt-timeline-category']) ) ? $xpersonlite['skt-timeline-category'] : 'uncategorized';
$xpersonlite_timeline_section = ( isset($xpersonlite['skt-timeline-section']) ) ? $xpersonlite['skt-timeline-section'] : 'on';
$xpersonlite_timeline_temp = get_category_by_slug( $xpersonlite_timeline_category );
$xpersonlite_timeline_cat_name = $xpersonlite_timeline_temp->name;

if( $xpersonlite_timeline_section == 'on') { ?>
<section id="front-timeline-section" class="front-sections section-padding no-top">
	<div class="container">
		<?php $count = 2; ?>
		<div class="resume-section">
			<?php // The Query
			$the_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'category_name' => $xpersonlite_timeline_category ) );
			if( $the_query->have_posts() ) { ?>
			<div class="row no-margin">
				<div class="col-md-12">
					<div class="resume-title">
						<h3><?php echo esc_html( $xpersonlite_timeline_cat_name ); ?></h3>
					</div>
					<div class="resume">
						<ul class="timeline">
						<?php 
						while( $the_query->have_posts() ) {
							$the_query->the_post();

							if( $count%2 == 0 ) {
						?>
								<li>
									<div class="posted-date">
										<span class="month"><?php the_time('Y'); ?></span>
									</div><!-- /posted-date -->

									<div class="timeline-panel wow fadeInUp">
										<div class="timeline-content">
											<div class="timeline-heading">
												<h3><?php the_title(); ?></h3>
											</div><!-- /timeline-heading -->

											<div class="timeline-body">
												<?php the_excerpt(); ?>
											</div><!-- /timeline-body -->
										</div> <!-- /timeline-content -->
									</div><!-- /timeline-panel -->
								</li>

							<?php } else { ?>

								<li class="timeline-inverted">
									<div class="posted-date">
										<span class="month"><?php the_time('Y'); ?></span>
									</div><!-- /posted-date -->

									<div class="timeline-panel wow fadeInUp">
										<div class="timeline-content">
											<div class="timeline-heading">
												<h3><?php the_title(); ?></h3>
											</div><!-- /timeline-heading -->

											<div class="timeline-body">
												<?php the_excerpt(); ?>
											</div><!-- /timeline-body -->
										</div> <!-- /timeline-content -->
									</div> <!-- /timeline-panel -->
								</li>
							
							<?php } $count++;
						} ?>
						</ul>
					</div>
				</div>
			</div>
			<?php } else { ?>
				<br>
				<div class="container text-center">
					<div class="row">
						<div class="alert-warning">
						<?php esc_html_e('Please select the post category to show in timeline from xPerson Options->Static Front Page Settings or disable the timeline.', 'xperson-lite' ); ?>
						</div>
					</div>
				</div>
			<?php }
			/* Restore original Post Data */
			wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php } ?>