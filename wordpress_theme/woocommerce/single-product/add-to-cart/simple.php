<?php if (!defined('ABSPATH')) exit;
global $product;

if (!$product->is_purchasable()) return;

echo wc_get_stock_html($product);

if ($product->is_in_stock()) : ?>
	<form action="<?= esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" class="item-about__form simple_form" enctype='multipart/form-data'>
		<div class="item-about__form-row">
			<?php woocommerce_quantity_input([
				'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
				'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
				'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(),
			]) ?>
			<div class="item-about__button-wrapper">
				<button type="submit" name="add-to-cart" value="<?= esc_attr($product->get_id()); ?>" class="single_add_to_cart_button alt<?= esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> item-about__button">
					<?= esc_html($product->single_add_to_cart_text()); ?>
				</button>
			</div>
		</div>
	</form>
<?php endif; ?>