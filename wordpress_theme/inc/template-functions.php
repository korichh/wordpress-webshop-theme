<?php

if (!function_exists('webshop_paginate')) :
    function webshop_paginate($max_num_pages, $paged, array $args = [])
    {
        $big = 999999999;

        $defaults = array(
            'show_all'  => false,
            'prev_next' => true,
            'prev_text' => esc_html__('Prev', 'test'),
            'next_text' => esc_html__('Next', 'test'),
            'end_size'  => 1,
            'mid_size'  => 1,
            'type'      => 'plain',
        );

        $args = wp_parse_args($args, $defaults);

        return paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $max_num_pages,

            'show_all'  => $args['show_all'],
            'prev_next' => $args['prev_next'],
            'prev_text' => $args['prev_text'],
            'next_text' => $args['next_text'],
            'end_size'  => $args['end_size'],
            'mid_size'  => $args['mid_size'],
            'type'      => $args['type'],
        ));
    }
endif;

if (!function_exists('webshop_reading_time')) :
    function webshop_reading_time($ID)
    {
        $content = get_post_field('post_content', $ID);
        $word_count = str_word_count(strip_tags($content));
        $readingtime = ceil($word_count / 200);
        $totalreadingtime = $readingtime . ' min';

        return $totalreadingtime;
    }
endif;

if (!function_exists('webshop_get_product_image')) :
    function webshop_get_product_image($attachment_id)
    {
        add_filter('wp_calculate_image_srcset_meta', '__return_null');
        $image = wp_get_attachment_image($attachment_id, 'full');
        remove_filter('wp_calculate_image_srcset_meta', '__return_null');

        return $image;
    }
endif;
