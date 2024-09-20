<?php if (!defined('ABSPATH')) exit;

$product_tabs = apply_filters('woocommerce_product_tabs', array());
if (!empty($product_tabs)) : ?>
	<div class="item-feature">
		<div class="container">
			<div class="item-feature__inner">
				<ul class="item-feature__links" role="tablist">
					<?php foreach ($product_tabs as $key => $product_tab) : ?>
						<li class="<?php echo esc_attr($key); ?>_tab item-feature__link" id="tab-title-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">
							<a href="#tab-<?php echo esc_attr($key); ?>">
								<?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="item-feature__sections">
					<?php foreach ($product_tabs as $key => $product_tab) : ?>
						<div class="item-feature__section" id="tab-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
							<?php
							if (isset($product_tab['callback'])) {
								call_user_func($product_tab['callback'], $key, $product_tab);
							}
							?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>