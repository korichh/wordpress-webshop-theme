<?php if (!defined('ABSPATH')) exit;
global $product;

$attribute_keys  = array_keys($attributes);
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true); ?>

<form class="item-about__form variations_form" action="<?= esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data' data-product_id="<?= absint($product->get_id()); ?>" data-product_variations="<?= $variations_attr; ?>">
    <?php if (empty($available_variations) && false !== $available_variations) : ?>
        <p class="stock out-of-stock"><?= esc_html(apply_filters('woocommerce_out_of_stock_message', __('This product is currently out of stock and unavailable.', 'woocommerce'))); ?></p>
    <?php else : ?>
        <div class="variations">
            <?php foreach ($attributes as $attribute_name => $options) : ?>
                <div class="item-about__variations item-variations">
                    <div class="item-variations__title">
                        <?= wc_attribute_label($attribute_name); ?>
                    </div>
                    <?php wc_dropdown_variation_attribute_options(array(
                        'options'   => $options,
                        'attribute' => $attribute_name,
                        'product'   => $product,
                    ));
                    // webshop_dropdown_variation_attribute_radio(array(
                    //     'options'   => $options,
                    //     'attribute' => $attribute_name,
                    //     'product'   => $product,
                    // ));
                    ?>
                </div>
                <?= end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__('Clear', 'woocommerce') . '</a>')) : ''; ?>
            <?php endforeach; ?>
        </div>
        <div class="single_variation_wrap">
            <?php woocommerce_single_variation();
            woocommerce_single_variation_add_to_cart_button(); ?>
        </div>
    <?php endif; ?>
</form>