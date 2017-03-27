<?php

// Check to see if setup function already exists
if ( !function_exists( 'malmo_child_nep_theme_setup' ) ) {

	function malmo_child_nep_theme_setup() {

		/**
		* Include Custom Post Types
		**/
		require_once(  'inc/cpt-classrooms.php' );
		require_once(  'inc/sc-cpt_loop.php' );

		/**
		*		Child Theme Function
		*		Register and enqueue the parent stylesheet
		**/
		function malmo_elated_child_theme_enqueue_scripts() {
			wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
			wp_enqueue_style( 'childstyle' );
		}
		add_action('wp_enqueue_scripts', 'malmo_elated_child_theme_enqueue_scripts', 11);

		if ( !function_exists( 'malmo_child_nep_enqueue_styles' ) ) {
			/**
			*		Child Theme Enqueue Styles
			*		Register and enqueue the child theme stylesheet
			**/
			function malmo_child_nep_enqueue_styles() {
				wp_register_style( 'nep_sass_main', get_stylesheet_directory_uri() . '/sass/main.min.css'  );
				wp_enqueue_style( 'nep_sass_main' );

			}
			add_action( 'wp_enqueue_scripts', 'malmo_child_nep_enqueue_styles' );
		}	// END if ( !function_exists( 'malmo_child_nep_enqueue_styles' ) )

		if ( !function_exists( 'malmo_child_nep_register_sidebars' ) ) {
			/**
			*		Register Sidebars
			*		Setup and configure custom sidebars/widet areas
			**/
			function malmo_child_nep_register_sidebars() {
				// Widget area just above the footer
				register_sidebar( array(
					'name'          =>'Footer Top',
					'id'            => 'footer-top-widget-area',
					'description'   => 'Widgets in this area will be shown in the footer above the column widget areas.',
					'before_widget' => '<div id="%1$s" class="eltd-grid-row %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="eltd-footer-widget-title">',
					'after_title'   => '</h5>',
				) );
			}	// END malmo_child_nep_register_sidebars()
			add_action( 'widgets_init', 'malmo_child_nep_register_sidebars' );
		}	// END if ( !function_exists( 'malmo_child_nep_register_sidebars' ) )

	}	// END malmo_child_nep_theme_setup()
	add_action('after_setup_theme', 'malmo_child_nep_theme_setup');

}	// END if ( !function_exists( 'malmo_child_nep_theme_setup' ) )
