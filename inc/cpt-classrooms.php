<?php
if ( !function_exists( 'nep_register_classroom_post_type' ) ) {
	function nep_register_classroom_post_type() {

		$singular = 'Certified Classroom';
		$plural = 'Certified Classrooms';

		$labels = array(
			'name'					   => $plural,
			'singular_name'		=> $singular,
			'add_name' 			   => 'Add New',
			'add_new_item' 		=> 'Add New ' . $singular,
			'edit' 						   => 'Edit',
			'edit_item' 			=> 'Edit ' . $singular,
			'new_item' 				=> 'New ' . $singular,
			'view' 						=> 'View ' . $singular,
			'view_item' 			=> 'View ' . $singular,
			'search_term' 			=> 'Search ' . $plural,
			'parent' 						=> 'Parent ' . $singular,
			'not_found' 					=> 'No ' . $plural . ' found',
			'not_found_in_trash'	=> 'No ' . $plural . ' in Trash'
		);

		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'exclude_from_search' 	=> false,
			'show_in_nav_menus' 		=> true,
			'show_ui' 				=> true,
			'show_in_menu' 			=> true,
			'show_in_admin_bar'		=> true,
			'menu_position' 			=> 10,
			'menu_icon' 				=> 'dashicons-admin-multisite',
			'can_export' 			=> true,
			'delete_with_user' 		=> false,
			'hierachical' 			=> true,
			'has_archive' 			=> true,
			'query_var' 				=> true,
			'capability_type' 		=> 'post',
			'map_meta_cap' 			=> true,
			'rewrite' 				=> array(
				'slug' 			=> 'classroom',
				'with_front' 	=> true,
				'pages' 			=> true,
				'feeds' 			=> true,
			),
			'supports' 				=> array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'revisions'
			)
		);

		register_post_type( 'classrooms', $args );
	}	// END nep_register_classroom_post_type()

	add_action( 'init', 'nep_register_classroom_post_type' );
}	// END if ( !function_exists( 'nep_register_classroom_post_type' ) )

if ( !function_exists( 'nep_register_classroom_taxonomy' ) ) {

	/**
	*		Classroom Location Taxonomy
	**/
	function nep_register_classroom_taxonomy() {

		$singular = 'Location';
		$plural = 'Locations';

		$labels = array(
			'name' 						=> $plural,
			'singular_name' 				=> $singular,
			'search_items'				=> 'Search ' . $plural,
			'popular_items'				=> 'Popular ' . $plural,
			'all_items'					=> 'All ' . $plural,
			'parent_item'				=> null,
			'parent_item_colon' 			=> null,
			'new_item_name' 				=> 'New ' . $singular . ' Name',
			'add_or_remove_items' 		=> 'Add or remove' . $plural,
			'add_new_item' 				=> 'Add New ' . $singular,
			'seperate_items_with_commas' => 'Seperate ' . $plural . ' with commas',
			'choose_from_most_used' 		=> 'Choose from most used ' . $plural,
			'update_item' 				=> 'Update' . $singular,
			'edit_item' 					=> 'Edit ' . $singular,
			'not_found' 					=> 'No ' . $plural . ' found',
			'menu_name'					=> $plural
		);

		$args = array(
			'hierarchical' 			=> true,
			'labels' 				=> $labels,
			'show_ui' 				=> true,
			'show_admin_column' 		=> true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' 				=> true,
			'rewrite' 				=> array( 'slug' => 'locations' ),

		);

		register_taxonomy( 'locations', 'classrooms', $args );
	}	// END nep_register_classroom_taxonomy()

	add_action( 'init', 'nep_register_classroom_taxonomy' );
}	// END if ( !function_exists( 'nep_register_classroom_taxonomy' ) )

if ( !function_exists( 'nep_register_classroom_cert_taxonomy' ) ) {
	/**
	*	Classroom Certfication Taxonomy
	**/
	function nep_register_classroom_cert_taxonomy() {

		$singular = 'Certification';
		$plural = 'Certifications';

		$labels = array(
			'name' 						=> $plural,
			'singular_name' 				=> $singular,
			'search_items'				=> 'Search ' . $plural,
			'popular_items'				=> 'Popular ' . $plural,
			'all_items'					=> 'All ' . $plural,
			'parent_item'				=> null,
			'parent_item_colon' 			=> null,
			'new_item_name' 				=> 'New ' . $singular . ' Name',
			'add_or_remove_items' 		=> 'Add or remove' . $plural,
			'add_new_item' 				=> 'Add New ' . $singular,
			'seperate_items_with_commas' => 'Seperate ' . $plural . ' with commas',
			'choose_from_most_used' 		=> 'Choose from most used ' . $plural,
			'update_item' 				=> 'Update' . $singular,
			'edit_item' 					=> 'Edit ' . $singular,
			'not_found' 					=> 'No ' . $plural . ' found',
			'menu_name'					=> $plural
		);

		$args = array(
			'hierarchical' 			=> true,
			'labels' 				=> $labels,
			'show_ui' 				=> true,
			'show_admin_column' 		=> true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' 				=> true,
			'rewrite' 				=> array( 'slug' => 'certification' ),
		);

		register_taxonomy( 'certification', 'classrooms', $args );
	}	// END nep_register_classroom_cert_taxonomy()

	add_action( 'init', 'nep_register_classroom_cert_taxonomy' );
}	// END if ( !function_exists( 'nep_register_classroom_cert_taxonomy' ) )
