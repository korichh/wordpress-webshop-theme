<?php if (!defined('ABSPATH')) exit;
global $product; ?>

<div class="item-product__view item-view">
	<?php do_action('woocommerce_product_thumbnails'); ?>
	<div class="item-view__image-wrapper">
		<?php woocommerce_show_product_sale_flash() ?>
		<div class="item-view__image">
			<?= $html = $product->get_image_id() ? webshop_get_product_image($product->get_image_id()) : sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'webshop')); ?>
			<input type="text" name="image" value="<?= esc_url(wp_get_attachment_url($product->get_image_id())) ?>" hidden>
		</div>
	</div>
</div>