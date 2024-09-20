<?php if (!defined('ABSPATH')) exit; ?>
<form class="woocommerce-ordering products-tools__form products-form" method="get">
    <?php
    $per_page = filter_input(INPUT_GET, 'posts_per_page', FILTER_SANITIZE_NUMBER_INT);
    $show_options = array(
        '10' => __('Default', 'webshop'),
        '4' => '4',
        '8' => '8',
        '12' => '12',
        '16' => '16',
        '20' => '20',
        '24' => '24',
    );
    ?>
    <div class="products-form__row">
        <label for="products-form__show">
            <?= esc_html__('Show', 'webshop') ?>
        </label>
        <select name="posts_per_page" class="posts_per_page" id="products-form__show">
            <?php foreach ($show_options as $value => $label) :  ?>
                <option value="<?= esc_attr($value) ?>" <?php selected($per_page, $value) ?>><?= esc_html($label); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="products-form__row">
        <label for="products-form__sort">
            <?= esc_html__('Sort by', 'webshop') ?>
        </label>
        <select name="orderby" class="orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>" id="products-form__sort">
            <?php foreach ($catalog_orderby_options as $id => $name) : ?>
                <option value="<?= esc_attr($id); ?>" <?php selected($orderby, $id); ?>><?= esc_html($name); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="paged" value="1" />
</form>