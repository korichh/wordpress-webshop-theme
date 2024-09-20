<?php if (!defined('ABSPATH')) exit;
global $product; ?>
<table class="item-about__details item-details">
	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>
		<tr>
			<td><?php esc_html_e('SKU', 'woocommerce'); ?></td>
			<td class="sku">: <?= ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></td>
		</tr>
	<?php endif; ?>
	<tr>
		<td><?= _n('Category', 'Categories', count($product->get_category_ids()), 'woocommerce') ?></td>
		<td class="category">: <?= wc_get_product_category_list($product->get_id()); ?></td>
	</tr>
	<tr>
		<td><?= _n('Tag', 'Tags', count($product->get_tag_ids()), 'woocommerce') ?></td>
		<td class="tag">: <?= wc_get_product_tag_list($product->get_id()); ?></td>
	</tr>
	<!-- <?php woocommerce_template_single_sharing(); ?> -->
</table>