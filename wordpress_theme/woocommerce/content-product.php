<?php if (!defined('ABSPATH')) exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li class="post-<?= $product->get_id() ?> products-list__item products-item">
    <?php woocommerce_template_loop_product_link_open() ?>
    <form action="#" method="post" class="products-item__wrapper">
        <?php do_action('kaw_icon') ?>
        <!-- <button class="products-item__favorite" data-role="wishlist">
            <svg viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.83333 1C3.61217 1 1 3.58533 1 6.775C1 9.34983 2.02083 15.4608 12.0693 21.6383C12.2493 21.7479 12.456 21.8058 12.6667 21.8058C12.8774 21.8058 13.084 21.7479 13.264 21.6383C23.3125 15.4608 24.3333 9.34983 24.3333 6.775C24.3333 3.58533 21.7212 1 18.5 1C15.2788 1 12.6667 4.5 12.6667 4.5C12.6667 4.5 10.0545 1 6.83333 1Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button> -->
        <div class="products-item__image">
            <?php woocommerce_show_product_loop_sale_flash(); ?>
            <?= wp_get_attachment_image($product->get_image_id(), 'full') ?>
            <input type="text" name="image" value="<?= wp_get_attachment_url($product->get_image_id()) ?>" hidden>
        </div>
        <div class="products-item__content">
            <h2 class="products-item__heading">
                <?= $product->get_name() ?>
                <input type="text" name="heading" value="<?= $product->get_name() ?>" hidden>
            </h2>
            <div class="products-item__text">
                <p>
                    <?= $product->get_short_description() ?>
                </p>
            </div>
            <div class="products-item__price">
                <?= woocommerce_template_loop_price() ?>
                <input type="text" name="price" value="<?= $product->get_price() ?>" hidden>
            </div>
        </div>
    </form>
    <?php woocommerce_template_loop_product_link_close() ?>
</li>