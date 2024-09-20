<?php if (!defined('ABSPATH')) exit;
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'webshop' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'webshop' ); ?>

<div class="item-about__count item-count <?= $type == 'hidden' ? 'item-count__single-out' : '' ?>">
	<label class="screen-reader-text" for="<?= esc_attr( $input_id ); ?>"><?= esc_attr( $label ); ?></label>
	<?php if ($type == 'hidden') : ?>
		<div class="out single-out">
			<?= 0 < $max_value ? $max_value : $min_value ?>
		</div>
	<?php else : ?>
		<div class="decr count-button">-</div>
		<input
		type="<?= esc_attr( $type ); ?>"
		<?= $readonly ? 'readonly="readonly"' : ''; ?>
		id="<?= esc_attr( $input_id ); ?>"
		class="<?= esc_attr( join( ' ', (array) $classes ) ); ?> out"
		name="<?= esc_attr( $input_name ); ?>"
		value="<?= esc_attr( $input_value ); ?>"
		aria-label="<?php esc_attr_e( 'Product quantity', 'webshop' ); ?>"
		size="4"
		min="<?= esc_attr( $min_value ); ?>"
		max="<?= esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
		<?php if ( ! $readonly ) : ?>
			step="<?= esc_attr( $step ); ?>"
			placeholder="<?= esc_attr( $placeholder ); ?>"
			inputmode="<?= esc_attr( $inputmode ); ?>"
			autocomplete="<?= esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
		<?php endif; ?>
		/>
		<div class="incr count-button">+</div>
	<?php endif; ?>
</div>