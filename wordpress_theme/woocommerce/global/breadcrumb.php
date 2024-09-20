<?php if (!defined('ABSPATH')) exit;

if (!empty($breadcrumb)) {
    foreach ($breadcrumb as $key => $crumb) {
        if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
            echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
        } else {
            echo '<span>' . esc_html($crumb[0]) . '</span>';
        }
    }
}
