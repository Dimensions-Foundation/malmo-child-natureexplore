/**
*	This page displays all classrooms based on thier organization_type.
*	Currently this feature is put on hold.
*
*/

<?php get_header(); ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<?php malmo_elated_get_title(); ?>
		<?php get_template_part('slider'); ?>
		<div class="eltd-container">
			<?php do_action('malmo_elated_after_container_open'); ?>
			<div class="eltd-container-inner">
			<div style="max-width:300px">	<?php the_post_thumbnail(); ?></div>
				<h2><?php the_title() ?></h2>
				<p><?php the_terms( $post->ID , 'locations' ); ?></p>
				<div class=" eltd-btn eltd-btn-outline eltd-btn-small">
					<a href='<?php the_permalink(); ?>'>
						Visit Classroom Page
					</a>
				</div>

				<?php do_action('malmo_elated_before_container_close'); ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php get_footer(); ?>
