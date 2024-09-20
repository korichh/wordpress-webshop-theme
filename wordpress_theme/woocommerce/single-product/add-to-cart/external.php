<?php if (!defined('ABSPATH')) exit;
global $product;

if ($product->is_in_stock()) : ?>
	<form action="<?php echo esc_url($product_url); ?>" method="get" class="item-about__form external_form">
		<div class="item-about__button-wrapper">
			<button type="submit" class="single_add_to_cart_button alt<?= esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> item-about__button">
				<?= esc_html($button_text); ?>
			</button>
		</div>

		<?php wc_query_string_form_fields($product_url); ?>
	</form>
<?php endif; ?>