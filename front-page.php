<?php get_header(); ?>

<?php get_template_part('content', 'page'); ?>


<?php if (is_home()) : ?>
	<section class="banner">
		<img src="https://vinicolacastanho.com.br/wp-content/uploads/2018/10/3930-Vin%C3%ADcola-Castanho-Tour-para-empresas-Banner-site-1348x289.png" alt="">
	</section>
<?php else : ?>

<?php endif; ?>


<?php if (is_page($page = 'Blog')) : ?>
	<?php the_title() ?>
	<?php the_content() ?>
<?php endif; ?>



<section class="woocommerce">

	<div class="wrap">

		<ul class="products">
			<?php
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 10,
					'product_cat' => 'vinhos'
				);

				$query = new WP_Query($args);
			?>

			<?php while ($query->have_posts()) : $query->the_post(); global $product; ?>
				
				<strong>Vinhos</strong>

				<li class="product">

					<a href="<?= get_permalink($query->post->ID) ?>">
						<?php
						
							woocommerce_show_product_sale_flash($post, $product);
						
							if (has_post_thumbnail($query->post->ID))
								echo get_the_post_thumbnail($query->post->ID, 'shop_catalog');
							else
								echo '<img src="' . woocommerce_placeholder_img_src() . '" />';

							the_title('<h2 class="woocommerce-loop-product__title">', '</h2>');

							echo '<span class="price">' . $product->get_price_html() . '</span>';
						
						?>
					</a>

					<!-- chamar botao comprar do woocommerce -->
					<?php woocommerce_template_loop_add_to_cart($query->post, $product); ?>
				</li>
			
			<?php endwhile; ?>

			<?php wp_reset_query(); ?>
		</ul>

	</div>

</section>


<div class="container">

	<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 10
		);

		$query = new WP_Query($args);
	?>
	
	<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

		<div>
			<?php echo get_the_post_thumbnail($query->post->ID, 'shop_catalog'); ?>
			<h1>### <?php the_title(); ?> ###</h1>
			<h4>Posted on <?php the_time('F jS, Y') ?></h4>
			<p><?php the_content(__('(more...)')); ?></p>
		</div>

	<?php endwhile; else : ?>

		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

	<?php endif; ?>

</div>  <!-- container -->

<?php get_footer(); ?>