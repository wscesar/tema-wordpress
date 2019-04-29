<?php
	
	function wsc_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}

	add_action( 'after_setup_theme', 'wsc_add_woocommerce_support' );


	function wsc_custom_new_menu() {
	  register_nav_menus(
	    array(
	      'main-menu' => __( 'Main Menu' ),
	      'custom-menu' => __( 'Top Menu' )
	    )
	  );
	}

	add_action( 'init', 'wsc_custom_new_menu' );

?>