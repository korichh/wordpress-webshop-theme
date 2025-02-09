<?php if (!defined('ABSPATH')) exit;

$total   = isset($total) ? $total : wc_get_loop_prop('total_pages');
$current = isset($current) ? $current : wc_get_loop_prop('current_page');
$base    = isset($base) ? $base : esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false))));
$format  = isset($format) ? $format : '';

if ($total <= 1) {
    return;
}
?>
<?= paginate_links(
    apply_filters(
        'woocommerce_pagination_args',
        array( // WPCS: XSS ok.
            'base'      => $base,
            'format'    => $format,
            'add_args'  => false,
            'current'   => max(1, $current),
            'total'     => $total,
            'prev_text' => esc_html__('Prev', 'webshop'),
            'next_text' => esc_html__('Next', 'webshop'),
            'type'      => 'plain',
            'end_size'  => 1,
            'mid_size'  => 1,
        )
    )
);
?>
