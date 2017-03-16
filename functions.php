<?php

// Check to see if setup function already exists
if ( !function_exists( 'malmo_child_nep_theme_setup' ) ) {

	function malmo_child_nep_theme_setup() {

		/**
		*    Child Theme Function
		*    Register and enqueue the parent stylesheet
		*/

		function malmo_elated_child_theme_enqueue_scripts() {
			wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
			wp_enqueue_style( 'childstyle' );
		}
		add_action('wp_enqueue_scripts', 'malmo_elated_child_theme_enqueue_scripts', 11);


		function malmo_child_nep_enqueue_styles() {
			wp_register_style( 'nep_sass_main', get_stylesheet_directory_uri() . '/sass/main.min.css'  );
			wp_enqueue_style( 'nep_sass_main' );

		}
		add_action( 'wp_enqueue_scripts', 'malmo_child_nep_enqueue_styles' );


	}  // End malmo_child_nep_theme_setup()
	add_action('after_setup_theme', 'malmo_child_nep_theme_setup');

} // End if ( !function_exists( 'malmo_child_nep_theme_setup' ) )
