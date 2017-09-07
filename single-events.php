<?php get_header(); ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<?php malmo_elated_get_title(); ?>
		<?php get_template_part('slider'); ?>
		<div class="eltd-container">
			<?php do_action('malmo_elated_after_container_open'); ?>
			<div class="eltd-container-inner">
				<?php malmo_elated_get_blog_single(); ?>
			</div>
			<?php do_action('malmo_elated_before_container_close'); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>