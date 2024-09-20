<?php if (!defined('ABSPATH')) exit;
global $product;
if ($product->is_on_sale()) :
	echo '<span class="onsale-flash">' . esc_html__('Sale!', 'webshop') . '</span>';
endif;
