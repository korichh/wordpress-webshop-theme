<?php if (!defined('ABSPATH')) exit;
global $product;

if (!wc_review_ratings_enabled()) return;

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ($rating_count > 0) : ?>

	<div class="item-about__rating">
		<?= wc_get_rating_html($average, $rating_count) ?>
		<div class="item-about__review">
			<?php if (comments_open()) : ?>
				<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><?php printf(_n('%s customer review', '%s customer reviews', $review_count, 'woocommerce'), '<span class="count">' . esc_html($review_count) . '</span>'); ?></a>
			<?php endif ?>
		</div>
	</div>

<?php endif; ?>