<?php

if ( !function_exists( 'nep_custom_post_type_loop_shortcode' ) ) {

	// Function to add subscribe text to posts and pages
	function nep_custom_post_type_loop_shortcode( $attrs ) {
		extract( shortcode_atts(
			array(
				'order' => 'ASC',
				'orderby' => 'date',
				'posts' => -1,
				'type' => 'post',
				'loop_type' => 'list'
			), $attrs)
		);
		$newLoop = new WP_Query( array(
			'post_type' => $type,
			'posts_per_page' => $posts,
			'order' => $order,
			'orderby' => $orderby
		) );
		// Change layout based on layout type selected
		switch ( $loop_type ) {
			// Article Layout
			case 'article':	?>
			<section class="<?php echo 'nep_'.$type.'_'.$loop_type.'_loop_container' ; ?>">
				<?php if ($newLoop->have_posts()) :
					while ($newLoop->have_posts()) : $newLoop->the_post(); ?>
					<article class="<?php echo 'nep_'.$type.'_'.$loop_type.'_loop_article' ; ?>">
						<a href=' <?php the_permalink(); ?> '>
							<h2 class="<?php echo 'nep_'.$type.'_'.$loop_type.'_loop_title' ; ?>"> <?php the_title() ?> </h2>
							<div class="<?php echo 'nep_'.$type.'_'.$loop_type.'_loop_content' ; ?>">
								<?php	the_excerpt(); ?>
							</div>
						</a>
					</article>
				<?php endwhile; endif; ?>
			</section>
			<?php
			break;
			// Unordered List Layout (DEFAULT)
			case 'list':
			default:	 ?>
			<ul class="<?php echo 'nep_'.$type.'_'.$loop_type.'_loop_container' ; ?>">
				<?php if ($newLoop->have_posts()) :
					while ($newLoop->have_posts()) : $newLoop->the_post(); ?>
					<li class="<?php echo 'nep_'.$type.'_'.$loop_type.'_item' ; ?>">
						<a href=' <?php the_permalink(); ?> '>
							<?php the_title() ?>
						</a>
					</li>
				<?php endwhile; endif; ?>
			</ul>
			<?php break;
		}	// END switch ( $loop_type )
		wp_reset_query(); // Reset the loop
	}	// END function nep_custom_post_type_loop_shortcode()

	function nep_register_shortcodes() {
		add_shortcode('nep_loop', 'nep_custom_post_type_loop_shortcode');
	}	// END function nep_register_shortcodes()
	add_action( 'init', 'nep_register_shortcodes');
}	// END if ( !function_exists( 'nep_custom_post_type_loop_shortcode' ) )
