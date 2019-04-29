<?php
    if( is_front_page() || is_home() || is_404() ) { 
       $heading = 'h1';
        $desc = 'h2';
    } else { 
        $heading = 'h2';
        $desc = 'h3';
    }
?> 

<style>
    .header-cart, .header-login{
        margin-top: 0
    }

    .cart-contents{
        display: flex;
        align-items: center
    }

    .cart-contents .amount-cart,
    .cart-contents .amount-title{
        display: none;
    }


</style>


<?php
    wp_nav_menu( array( 
       'theme_location' => 'my-custom-menu', 
       'container_class' => 'top-menu'
    ));
?>

<header>


    <?php if (function_exists( 'has_custom_logo' ) && has_custom_logo( ) ) : ?>

        <?php	the_custom_logo( ); ?>

    <?php else : ?>

        <div class="rsrc-header-text">
            <<?php echo $heading ?> class="site-title" ><a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></<?php echo $heading ?>>
            <<?php echo $desc ?> class="site-desc" ><?php esc_attr( bloginfo( 'description' ) ); ?></<?php echo $desc ?>>
        </div>

    <?php endif; ?>  


    <?php get_search_form(); ?>


    <?php if (function_exists('maxstore_header_cart')) {?> 
        <div class="header-cart hidden-xs">
            <?php maxstore_header_cart();?>
        </div>
    <?php } ?>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse" style="">
        
            <span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </span>

            <span>MENU</span>
            
        </button>

</header>


