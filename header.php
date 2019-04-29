<html>
<head>
	<?php wp_head(); ?>
	<script src="<?= get_stylesheet_directory_uri().'/js/jquery.js'; ?>"></script>
	<script src="<?= get_stylesheet_directory_uri().'/js/jquery-ui.min.js'; ?>"></script>
	<script src="<?= get_stylesheet_directory_uri().'/js/bootstrap.js'; ?>"></script>
	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri().'/css/bootstrap.css'; ?>">
	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri().'/css/reset.css'; ?>">
	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri().'/css/woocommerce.css'; ?>">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>

<body <?php body_class(); ?>>
	
	<?php

		wp_nav_menu( array( 
		   'theme_location' => 'custom-menu', 
		   'container_class' => 'top-menu'
		));

	    //wp_nav_menu( array(
	        //'theme_location'    => 'main_menu',
	        //'depth'             => 3,
	        //'container'         => 'nav',
	        //'container_class'   => 'collapse navbar-collapse navbar-1-collapse',
	        //'menu_class'        => 'nav navbar-nav boxed',
	        //'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	        //'walker'            => new wp_bootstrap_navwalker()
	    //));
	?>

	<header class="flex between">
		
			
			
				
				<a href="#">
					<img src="<?= get_template_directory_uri().'/logo.png'; ?>">
				</a>

				<?php get_search_form(); ?>
			
		


	</header>

	
		
	<?php 

		wp_nav_menu( array( 
		   'theme_location'  => 'main-menu', 
		   'container'       => 'nav',
		   'container_class' => 'wrap',
		   'menu_class'      => 'flex'
		));

	 ?>
	

	<!-- <div class="container"> -->

