<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'product_cat' => 'vinhos',
			'posts_per_page' => 12
			);

		$loop = new WP_Query( $args );

		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'Nenhum produto encontrado.' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products-->



<ul class="products">
    <?php
        $args = array(
        	'post_type' => 'product',
        	'posts_per_page' => 1,
        	'product_cat' => 'vinhos'
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
          	<h2>Vinhos</h2>
          	
          	<li class="product">
	            <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
	            	<?php
	            		woocommerce_show_product_sale_flash( $post, $product );
	              		if ( has_post_thumbnail( $loop->post->ID ) )
	              		{
	              			echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
	              		}
	              		
	              		else
	              		{
	              			echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />';
	              		}
	              		
	              		the_title( '<h3 class="woocommerce-loop-product__title">', '</h3>' );
	                	
	                	echo '<span class="price">'. $product->get_price_html() .'</span>';
	              	?>
	            </a>
            	<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
        	</li>
    	<?php endwhile;

    	wp_reset_query(); 
    ?>
</ul>