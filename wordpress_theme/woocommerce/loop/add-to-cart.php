<?php if (!defined('ABSPATH')) exit;
global $product;

echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<div class="item-about__button-wrapper"><a href="%s" data-quantity="%s" class="%s" %s>%s</a></div>',
		esc_url($product->add_to_cart_url()),
		esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
		esc_attr(isset($args['class']) ? $args['class'] : '') . ' item-about__button',
		isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
		esc_html($product->add_to_cart_text())
	),
	$product,
	$args
);
