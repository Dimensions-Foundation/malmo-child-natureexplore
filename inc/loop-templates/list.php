<?php
/**
*	== List Loop ==
*	This loop is for the [nep_loop loop_type="list"] shortcode
*	Displays results in an unordered list
*/
?>
<ul class="<?php
echo 'nep_'.$post_type.'_'.$loop_type.'_loop_container' ; ?>">
<?php if ($newLoop->have_posts()) {
	while ($newLoop->have_posts()) : $newLoop->the_post(); ?>
	<li class="<?php echo 'nep_'.$post_type.'_'.$loop_type.'_item' ; ?>">
		<a href=' <?php the_permalink(); ?> '>
			<?php the_title() ?>
		</a>
	</li>
<?php endwhile;
} else {
	echo "<p>Oops! Looks like this query didn't return any results. Please check your search criterea.</p>";
}
 ?>
</ul>
