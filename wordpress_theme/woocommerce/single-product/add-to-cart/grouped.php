<?php if (!defined('ABSPATH')) exit;
global $product, $post; ?>

<form class="item-about__form grouped_form" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
    <?php
    $quantites_required      = false;
    $previous_post           = $post;
    $grouped_product_columns = apply_filters(
        'woocommerce_grouped_product_columns',
        array(
            'quantity',
            'label',
            'price',
        ),
        $product
    );
    $show_add_to_cart_button = false;

    echo '<div class="item-about__product-list">';
    foreach ($grouped_products as $grouped_product_child) {
        $post_object        = get_post($grouped_product_child->get_id());
        $quantites_required = $quantites_required || ($grouped_product_child->is_purchasable() && !$grouped_product_child->has_options());
        $post               = $post_object; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
        setup_postdata($post);

        if ($grouped_product_child->is_in_stock()) {
            $show_add_to_cart_button = true;
        }

        echo '<div class="item-about__product-item">';
        foreach ($grouped_product_columns as $column_id) {
            switch ($column_id) {
                case 'quantity':
                    ob_start();

                    if (!$grouped_product_child->is_purchasable() || $grouped_product_child->has_options() || !$grouped_product_child->is_in_stock()) {
                        woocommerce_template_loop_add_to_cart();
                    } elseif ($grouped_product_child->is_sold_individually()) {
                        echo '<input type="checkbox" name="' . esc_attr('quantity[' . $grouped_product_child->get_id() . ']') . '" value="1" class="wc-grouped-product-add-to-cart-checkbox" id="' . esc_attr('quantity-' . $grouped_product_child->get_id()) . '" />';
                        echo '<label for="' . esc_attr('quantity-' . $grouped_product_child->get_id()) . '" class="screen-reader-text">' . esc_html__('Buy one of this item', 'woocommerce') . '</label>';
                    } else {
                        woocommerce_quantity_input(array(
                            'input_name'  => 'quantity[' . $grouped_product_child->get_id() . ']',
                            'input_value' => isset($_POST['quantity'][$grouped_product_child->get_id()]) ? wc_stock_amount(wc_clean(wp_unslash($_POST['quantity'][$grouped_product_child->get_id()]))) : '', // phpcs:ignore WordPress.Security.NonceVerification.Missing
                            'min_value'   => apply_filters('woocommerce_quantity_input_min', 0, $grouped_product_child),
                            'max_value'   => apply_filters('woocommerce_quantity_input_max', $grouped_product_child->get_max_purchase_quantity(), $grouped_product_child),
                            'placeholder' => '0',
                        ));
                    }

                    $value = ob_get_clean();
                    break;
                case 'label':
                    $value  = '<label for="product-' . esc_attr($grouped_product_child->get_id()) . '">';
                    $value .= $grouped_product_child->is_visible() ? '<a href="' . esc_url(apply_filters('woocommerce_grouped_product_list_link', $grouped_product_child->get_permalink(), $grouped_product_child->get_id())) . '">' . $grouped_product_child->get_name() . '</a>' : $grouped_product_child->get_name();
                    $value .= '</label>';
                    break;
                case 'price':
                    $value = $grouped_product_child->get_price_html() . wc_get_stock_html($grouped_product_child);
                    break;
                default:
                    $value = '';
                    break;
            }
            echo '<div class="item-about__product-item-feature item-about__product-item-feature-' . esc_attr($column_id) . '">' . apply_filters('woocommerce_grouped_product_list_column_' . $column_id, $value, $grouped_product_child) . '</div>';
        }
        echo '</div>';
    }
    echo '</div>';
    $post = $previous_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
    setup_postdata($post); ?>

    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" />

    <?php if ($quantites_required && $show_add_to_cart_button) : ?>
        <div class="item-about__button-wrapper">
            <button type="submit" class="single_add_to_cart_button alt<?= esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> item-about__button">
                <?= esc_html($product->single_add_to_cart_text()); ?>
            </button>
        </div>
    <?php endif; ?>
</form>