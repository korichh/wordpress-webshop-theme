<?php

function webshop_init()
{
    register_nav_menus(
        array(
            'header_menu' => esc_html__('Header menu', 'webshop'),
            'help_menu' => esc_html__('Help menu', 'webshop'),
        )
    );
}
add_action('init', 'webshop_init');

function webshop_setup()
{
    load_theme_textdomain('webshop', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'webshop_setup');

function webshop_scripts()
{
    wp_enqueue_style('webshop-options', get_template_directory_uri() . '/assets/css/options.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('webshop-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('webshop-common', get_template_directory_uri() . '/assets/css/common.css', array(), _S_VERSION, 'all');

    if (is_page('about')) {
        wp_enqueue_style('webshop-about', get_template_directory_uri() . '/assets/css/about.css', array(), _S_VERSION, 'all');
    } else if (is_page('blog')) {
        wp_enqueue_style('webshop-blog', get_template_directory_uri() . '/assets/css/blog.css', array(), _S_VERSION, 'all');
    } else if (is_cart()) {
        wp_enqueue_style('webshop-cart', get_template_directory_uri() . '/assets/css/cart.css', array(), _S_VERSION, 'all');
    } else if (is_checkout()) {
        wp_enqueue_style('webshop-checkout', get_template_directory_uri() . '/assets/css/checkout.css', array(), _S_VERSION, 'all');
    } else if (is_page('contact')) {
        wp_enqueue_style('webshop-contact', get_template_directory_uri() . '/assets/css/contact.css', array(), _S_VERSION, 'all');
    } else if (is_page('home')) {
        wp_enqueue_style('webshop-swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), _S_VERSION, 'all');
        wp_enqueue_style('webshop-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION, 'all');
    } else if (is_singular('post')) {
        wp_enqueue_style('webshop-post', get_template_directory_uri() . '/assets/css/post.css', array(), _S_VERSION, 'all');
    } else if (is_product()) {
        wp_enqueue_style('webshop-product', get_template_directory_uri() . '/assets/css/product.css', array(), _S_VERSION, 'all');
    } else if (is_account_page()) {
        wp_enqueue_style('webshop-profile', get_template_directory_uri() . '/assets/css/profile.css', array(), _S_VERSION, 'all');
    } else if (is_shop() || is_product_taxonomy()) {
        wp_enqueue_style('webshop-shop', get_template_directory_uri() . '/assets/css/shop.css', array(), _S_VERSION, 'all');
    }

    if (is_page('home')) {
        wp_enqueue_script('webshop-swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), _S_VERSION, true);
    }
    wp_enqueue_script('webshop-StickySidebar', get_template_directory_uri() . '/assets/js/StickySidebar.js', array(), _S_VERSION, true);
    wp_enqueue_script('webshop-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);

    wp_enqueue_script('jquery');
    wp_enqueue_script('webshop-webshop', get_template_directory_uri() . '/assets/js/webshop.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'webshop_scripts');

function webshop_admin_scripts()
{
    wp_enqueue_style('webshop-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), _S_VERSION, 'all');
}
add_action('admin_enqueue_scripts', 'webshop_admin_scripts');

function webshop_per_page($query)
{
    $per_page = filter_input(INPUT_GET, 'posts_per_page', FILTER_SANITIZE_NUMBER_INT);
    if ($query->is_main_query() && !is_admin() && is_post_type_archive('product'))
        $query->set('posts_per_page', $per_page);
}
add_action('pre_get_posts', 'webshop_per_page');

function webshop_set_queries()
{
    if (is_page('blog')) {
        $common_vars = [
            'posts_per_page' => 3,
            'post_type' => 'post',
            'order' => 'DESC',
            'paged' => get_query_var('paged') > 1 ? get_query_var('paged') : 1,
        ];
        $GLOBALS['common_vars'] = $common_vars;
    }
}
add_action('get_header', 'webshop_set_queries');
