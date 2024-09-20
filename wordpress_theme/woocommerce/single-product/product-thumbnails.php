<?php if (!defined('ABSPATH')) exit;
global $product;

$attachment_ids = $product->get_gallery_image_ids();

if ($attachment_ids && $product->get_image_id()) {
	echo '<ul class="item-view__list">';

	$main_image_html = webshop_get_product_image($product->get_image_id());
	echo '<li class="item-view__item">' . $main_image_html . '</li>';

	foreach ($attachment_ids as $attachment_id) {
		$gallery_image_html = webshop_get_product_image($attachment_id);
		echo '<li class="item-view__item">' . $gallery_image_html . '</li>';
	}

	echo '</ul>';
}
