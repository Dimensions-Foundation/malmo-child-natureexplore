<?php
/**
* 	== Article Loop ==
*	This loop is for the [nep_loop loop_type="article"] shortcode
*	Displays results using the <article> tag
*/
?>
<section class="<?php echo 'nep_'.$post_type.'_'.$loop_type.'_loop_container' ; ?>">
	<div class="<?php echo 'nep_'.$post_type.'_'.$loop_type.'_loop_row' ; ?> row">
		<?php if ($newLoop->have_posts()) {
			while ($newLoop->have_posts()) : $newLoop->the_post(); ?>
			<article class="col-xs-12 col-md-4">

				<h2 class="<?php echo 'nep_'.$post_type.'_'.$loop_type.'_loop_title' ; ?>">
					<?php the_title() ?></h2>
					<div class="<?php echo 'nep_'.$post_type.'_'.$loop_type.'_loop_content' ; ?>">
						<?php the_excerpt(); ?>
					</div><br />
					<div class="<?php echo 'nep_'.$post_type.'_'.$loop_type.'_loop_button' ; ?> eltd-btn eltd-btn-outline eltd-btn-small">
						<a href='<?php the_permalink(); ?>'>
							Learn More
						</a>
					</div>
				</article>
			<?php endwhile;
		} else {
			echo "<p>Oops! Looks like this query didn't return any results. Please check your search criterea.</p>";
		}
		?>
	</div>
</section>
