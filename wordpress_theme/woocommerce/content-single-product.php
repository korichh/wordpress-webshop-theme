<?php defined('ABSPATH') || exit;
global $product;
if (post_password_required()) {
    echo get_the_password_form();
    return;
} ?>
<section class="item">
    <div class="item-wrapper">
        <div id="product-<?php the_ID(); ?>" class="item-product">
            <div class="container">
                <?php do_action('woocommerce_before_single_product'); ?>
                <div class="item-product__breadcrumbs item-breadcrumbs">
                    <?php woocommerce_breadcrumb() ?>
                </div>
                <div class="item-product__inner">
                    <?php woocommerce_show_product_images() ?>
                    <div class="item-product__about item-about">
                        <div class="item-about__heading">
                            <h1><?php woocommerce_template_single_title() ?></h1>
                            <button class="favorite-button" data-role="wishlist">
                                <svg viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.83333 1C3.61217 1 1 3.58533 1 6.775C1 9.34983 2.02083 15.4608 12.0693 21.6383C12.2493 21.7479 12.456 21.8058 12.6667 21.8058C12.8774 21.8058 13.084 21.7479 13.264 21.6383C23.3125 15.4608 24.3333 9.34983 24.3333 6.775C24.3333 3.58533 21.7212 1 18.5 1C15.2788 1 12.6667 4.5 12.6667 4.5C12.6667 4.5 10.0545 1 6.83333 1Z" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="item-about__price">
                            <?php woocommerce_template_single_price() ?>
                        </div>
                        <?php woocommerce_template_single_rating() ?>
                        <div class="item-about__text">
                            <?php woocommerce_template_single_excerpt() ?>
                        </div>
                        <?php woocommerce_template_single_add_to_cart(); ?>
                        <?php woocommerce_template_single_meta(); ?>
                        <?php $WC_Structured_Data = new WC_Structured_Data();
                        $WC_Structured_Data->generate_product_data($product); ?>
                    </div>
                </div>
                <?php do_action('woocommerce_after_single_product'); ?>
            </div>
        </div>
        <?php
        woocommerce_output_product_data_tabs();
        woocommerce_upsell_display();
        ?>
    </div>
</section>