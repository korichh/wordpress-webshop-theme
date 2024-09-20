<?php if (!defined('ABSPATH')) exit;

if ($related_products) : ?>
    <section class="related">
        <div class="related-wrapper">
            <div class="container">
                <div class="related-inner">
                    <?php $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));
                    if ($heading) : ?>
                        <h2 class="related-inner__title">
                            <?= esc_html($heading); ?>
                        </h2>
                    <?php endif; ?>

                    <ul class="related-inner__list related-list">
                        <?php foreach ($related_products as $related_product) : ?>
                            <?php $post_object = get_post($related_product->get_id());
                            setup_postdata($GLOBALS['post'] = &$post_object); ?>
                            <?php global $product; ?>

                            <li class="related-list__item related-item">
                                <?php woocommerce_template_loop_product_link_open() ?>
                                <div class="related-item__wrapper">
                                    <div class="related-item__image">
                                        <?php woocommerce_show_product_loop_sale_flash(); ?>
                                        <?= wp_get_attachment_image($product->get_image_id(), 'full') ?>
                                    </div>
                                    <h4 class="related-item__heading">
                                        <?= $product->get_name() ?>
                                    </h4>
                                    <div class="related-item__text">
                                        <?= woocommerce_template_loop_price() ?>
                                    </div>
                                </div>
                                <?php woocommerce_template_loop_product_link_close() ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <div class="related-inner__button-wrapper">
                        <a href="<?= esc_url(get_permalink(7)) ?>" class="related-inner__button">
                            <?= esc_html('View More') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
endif;

wp_reset_postdata();
