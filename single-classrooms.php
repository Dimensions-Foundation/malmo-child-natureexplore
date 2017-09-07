<?php get_header(); ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<?php malmo_elated_get_title(); ?>
		<?php get_template_part('slider'); ?>
		<div class="eltd-container">
			<?php do_action('malmo_elated_after_container_open'); ?>
			<div class="eltd-container-inner">
				<div class="clearfix eltd-full-section-inner">
					<div class="wpb_column vc_column_container vc_col-sm-4">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper" style="overflow: hidden;">
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="wpb_single_image wpb_content_element vc_align_left">
										<figure class="wpb_wrapper vc_figure">
											<div class="vc_single_image-wrapper   vc_box_border_grey">
												<?php the_post_thumbnail(); ?>
											</div>
										</figure>
									</div>
									<?	} 	?>
									<div data-eltd-parallax-speed="1" class="vc_row wpb_row vc_inner vc_row-fluid eltd-section vc_custom_1503412080161 eltd-content-aligment-left">

										<div class="wpb_column vc_column_container vc_col-sm-12" style="background: #efefef;margin-top:35px;padding:25px 45px ;">
											<!-- Icons here -->
											<!-- Display Classroom Address -->
											<?php
											if (get_post_meta( get_the_ID(), 'classroom-address', true)) {
												$classroom_address = get_post_meta( get_the_ID(), 'classroom-address', true);
												$google_address = strip_tags( 'http://maps.google.com/?q='.$classroom_address); ?>
												<div  class="classroom-fact" style="padding:15px 0">
													<div  class="classroom-icon wpb_column vc_column_container vc_col-sm-4">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/icons/LocationIcon_Gray.png" />
													</div>
													<div  class="classroom-info wpb_column vc_column_container vc_col-sm-8">
														<?php echo "<a href='".$google_address."' target='_blank'>".$classroom_address."</a>"; ?>
													</div>
												</div>
												<?php
											} ?>
											<br />
											<!-- Display Classroom Orginial Year Certified -->
											<?php
											if (get_post_meta( get_the_ID(), 'classroom-certified-original', true)) {
												$classroom_certified_original = get_post_meta( get_the_ID(), 'classroom-certified-original', true);?>
												<div  class="classroom-fact" style="padding:15px 0">
													<div  class="classroom-icon wpb_column vc_column_container vc_col-sm-4">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/icons/CertificateIcon_Gray.png" />
													</div>
													<div  class="classroom-info wpb_column vc_column_container vc_col-sm-8">
														<?php echo "First Certified " . $classroom_certified_original; ?>
													</div>
												</div>
												<?php
											} ?>
											<br />
											<!-- Display Classroom Current Year Certified -->
											<?php
											if (get_post_meta( get_the_ID(), 'classroom-certified-current', true)) {
												"";
												$classroom_certified_current = get_post_meta( get_the_ID(), 'classroom-certified-current', true);
												$years_plural = ($classroom_certified_current == 1 ? '':'s');
												?>
												<div  class="classroom-fact" style="padding:15px 0">
													<div  class="classroom-icon wpb_column vc_column_container vc_col-sm-4">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/icons/TrophyIcon_Gray.png" />
													</div>
													<div  class="classroom-info wpb_column vc_column_container vc_col-sm-8">
														<?php echo $classroom_certified_current." Year".$years_plural." Certified"; ?>
													</div>
												</div>
												<?php
											} ?>
											<br />
											<!-- Display Classroom Website -->
											<?php
											if (get_post_meta( get_the_ID(), 'classroom-website', true)) {
												$classroom_website = get_post_meta( get_the_ID(), 'classroom-website', true);?>
												<div  class="classroom-fact" style="padding:15px 0">
													<div  class="classroom-icon wpb_column vc_column_container vc_col-sm-4">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/icons/ComputerIcon_Gray.png" />
													</div>
													<div  class="classroom-info wpb_column vc_column_container vc_col-sm-8">
														<?php echo "<a href='https://".$classroom_website."' target='_blank'>Classroom Website</a>"; ?>
													</div>
												</div>
												<?php
											} ?>
											<br />
											<!-- Display Classroom Facebook Page -->
											<?php
											if (get_post_meta( get_the_ID(), 'classroom-facebook', true)) {
												$classroom_facebook = get_post_meta( get_the_ID(), 'classroom-facebook', true); ?>
												<div  class="classroom-fact" style="padding:15px 0">
													<div  class="classroom-icon wpb_column vc_column_container vc_col-sm-4">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/icons/FacebookIcon_Gray.png" />
													</div>
													<div  class="classroom-info wpb_column vc_column_container vc_col-sm-8">
														<?php echo "<a href='".$classroom_facebook."'>Classroom Facebook</a>"; ?>
													</div>
												</div>
												<?php
											} ?>
										</div>

										<div class="eltd-full-section-inner">
											<div class="wpb_column vc_column_container vc_col-sm-12"style="padding:25px;">
												<a href="/certified-classrooms/view-all/"><< view all classrooms</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="wpb_column vc_column_container vc_col-sm-8">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<?php do_action('malmo_elated_before_container_close'); ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php get_footer(); ?>
