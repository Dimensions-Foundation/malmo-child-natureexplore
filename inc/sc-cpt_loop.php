<?php

if ( !function_exists( 'nep_custom_post_type_loop_shortcode' ) ) {

	function nep_custom_post_type_loop_shortcode( $attrs ) {
		/**
		*	Function to add subscribe text to posts and pages
		*
		*	@param $attrs array of custom post type attributes
		*
		*	@return a sturctured selected number of post based on $attrs values
		*/
		extract( shortcode_atts(
			array(
				'order' => 'ASC',
				'orderby' => 'date',
				'posts' => -1,
				'post_type' => 'post',
				'loop_type' => 'list',
				'tax_type' => '',
				'tax_slug' => ''
			), $attrs)
		);

		if ($tax_type != "" && $tax_slug != "" ) {
				$new_args = array(
					'post_type' => $post_type,
					'posts_per_page' => $posts,
					'order' => $order,
					'orderby' => $orderby,
					'tax_query' => array(
						array(
							'taxonomy' => $tax_type,
							'field' => 'slug',
							'terms' => $tax_slug
						)
					)
				);
		} else {
			$new_args = array(
				'post_type' => $post_type,
				'posts_per_page' => $posts,
				'order' => $order,
				'orderby' => $orderby
			);
		}
		/**
		*	Create a new loop based on the CPT slug
		*/
		$newLoop = new WP_Query( $new_args );

		include( 'loop-templates/'.$loop_type.'.php' ) ;

		wp_reset_query(); // Reset the loop
	}	// END function nep_custom_post_type_loop_shortcode()
}	// END if ( !function_exists( 'nep_custom_post_type_loop_shortcode' ) )

if ( !function_exists( 'nep_register_shortcodes' ) ) {

	function nep_register_shortcodes() {
		/**
		*	Function to register custom short code
		*/
		add_shortcode('nep_loop', 'nep_custom_post_type_loop_shortcode');
	}	// END function nep_register_shortcodes()
	add_action( 'init', 'nep_register_shortcodes');
}	// END if ( !function_exists( 'nep_register_shortcodes' ) )
