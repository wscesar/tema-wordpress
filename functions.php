<?php

	//thumbnail support
	add_theme_support( 'post-thumbnails' );

	//woocomerce support
	add_action( 'after_setup_theme', 'add_woocommerce_support' );
	function add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}


	//custom menus
	add_action( 'init', 'new_custom_menu' );
	function new_custom_menu() {
	  register_nav_menus (
	    array (
	      'main-menu' => __( 'Main Menu' ),
	      'custom-menu' => __( 'Top Menu' )
	    )
	  );
	}


	//add customer post type
	add_action( 'init', 'customers_init' );
	function customers_init() {
		
		$labels = array(
			'name' => _x('Clientes', 'post type general name'),
			'singular_name' => _x('Cliente', 'post type singular name'),
			'all_items' => __('Vizualizar Clientes'),
			'add_new' => _x('Adicionar cliente', 'clientes'),
			'add_new_item' => __('Adicionar cliente'),
			'edit_item' => __('Editar cliente'),
			'new_item' => __('Novo cliente'),
			'view_item' => __('Ver cliente'),
			'search_items' => __('Pesquisar em: clientes'),
			'not_found' =>  __('Nenhum cliente encontrado'),
			'not_found_in_trash' => __('Nenhum cliente encontrado na lixeira'), 
			'parent_item_colon' => ''
		);

		$args = array(
			'labels' => $labels,
			//'singular_label' => _x('Cliente', 'Clientes dessa empresa'),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
			'has_archive' => 'customers' //has parent page
		);

		register_post_type('clientes', $args);
	};




// add custom taxonomies for customers
add_action( 'init', 'customer_create_taxonomies', 0 );
function customer_create_taxonomies() {
	$customer_labels = array(
		'name' => _x( 'Tipos de Serviço', 'taxonomy general name' ),
		'singular_name' => _x( 'Tipos de Serviço', 'taxonomy singular name' ),
		'search_items' =>  __( 'Pesquisar in Tipos de Serviço' ),
		'all_items' => __( 'All Tipos de Serviço' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Editar Tipo de Serviço' ), 
		'update_item' => __( 'Atualizar Tipo de Serviço' ),
		'add_new_item' => __( 'Adicionar Tipo de Serviço' ),
		'new_item_name' => __( 'Novo Tipo de Serviço' ),
		'menu_name' => __( 'Tipos de Serviço' ),
	);
	
	register_taxonomy('customer-type', 'clientes', array(
		'hierarchical' => true,
		'labels' => $customer_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'customer-type' )
	));
}

add_filter( 'woocommerce_get_price_html', 'change_displayed_sale_price_html', 10, 2 );
function change_displayed_sale_price_html( $price, $product ) {
    // Only on sale products on frontend and excluding min/max price on variable products
    if( $product->is_on_sale() && ! is_admin() && ! $product->is_type('variable')){
        // Get product prices
        $regular_price = (float) $product->get_regular_price(); // Regular price
        $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)

        // "Saving Percentage" calculation and formatting
        $precision = 1; // Max number of decimals
        $saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';

        // Append to the formated html price
        $price .= sprintf( __('<p class="saved-sale">Save: %s</p>', 'woocommerce' ), $saving_percentage );
    }
    return $price;
}



?>