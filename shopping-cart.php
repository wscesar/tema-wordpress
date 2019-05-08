<div class="view-cart">

    <a class="cart-contents" href="<?= esc_url( wc_get_cart_url() ); ?>">
        <i class="fa fa-shopping-cart"></i>
        
        <span class="count">
            <?= wp_kses_data(sprintf(WC()->cart->get_cart_contents_count())); ?>
        </span>
    </a>

    <div class="top-cart-content">
        <p class="block-subtitle" style="text-align: center">Adicionado ao carrinho</p>
        <?php the_widget('WC_Widget_Cart', 'title='); ?>
    </div>

</div>