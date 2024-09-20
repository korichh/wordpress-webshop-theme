<?php

function webshop_mimes($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'webshop_mimes');

if ('disable_gutenberg') {
    add_filter('use_block_editor_for_post_type', '__return_false', 100);
}
