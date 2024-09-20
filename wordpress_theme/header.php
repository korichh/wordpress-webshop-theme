<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="page">
        <header class="header">
            <style>
                #wpadminbar {
                    position: absolute !important;
                }

                html {
                    margin: 0 !important;
                }
            </style>
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__logo">
                        <?php if (get_theme_mod('custom_logo')) : ?>
                            <a href="<?= esc_url(home_url('/')) ?>">
                                <img src="<?= esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="webshop logo">
                            </a>
                        <?php else : ?>
                            <a href="<?= esc_url(home_url('/')) ?>" class="header-inner__logo">
                                <h2><?= get_bloginfo('name') ?></h2>
                            </a>
                        <?php endif; ?>
                    </div>
                    <nav class="header-inner__nav header-nav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header_menu',
                            'menu_class'     => 'menu menu-pages',
                            'container'      => '',
                        ));
                        ?>
                    </nav>
                    <div class="header-inner__nav header-nav">
                        <ul class="menu menu-icons">
                            <li class="menu-item">
                                <a href="#profile">
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/account.svg" alt="">
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#search">
                                    <img src="<?= get_template_directory_uri() ?>/assets/img/search.svg" alt="">
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#favorite">
                                    <div class="wish menu-item-count"></div>
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/favorite.svg" alt="">
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#cart">
                                    <div class="count menu-item-count"></div>
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/cart.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <nav class="header-inner__nav mobile-nav">
                        <ul class="menu menu-icons">
                            <li class="menu-item">
                                <a href="#menu">
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/menu.svg" alt="">
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#profile">
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/account.svg" alt="">
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#search">
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/search.svg" alt="">
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#favorite">
                                    <div class="wish menu-item-count"></div>
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/favorite.svg" alt="">
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#cart">
                                    <div class="count menu-item-count"></div>
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/cart.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="header-inner__toolbar toolbar">
                        <div class="toolbar-wrapper">
                            <div class="toolbar-inner">
                                <button class="toolbar-close">
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/close-toolbar.svg" alt="">
                                </button>
                                <div class="toolbar-section" data-id="#menu">
                                    <h2 class="toolbar-section__heading">
                                        <?= esc_html('Menu') ?>
                                    </h2>
                                    <div class="toolbar-section__inner">
                                        <nav class="toolbar-section__nav">
                                            <?php
                                            wp_nav_menu(array(
                                                'theme_location' => 'header_menu',
                                                'menu_class'     => 'menu menu-pages',
                                                'container'      => '',
                                            ));
                                            ?>
                                        </nav>
                                    </div>
                                </div>
                                <div class="toolbar-section" data-id="#profile">
                                    <h2 class="toolbar-section__heading">
                                        <?= esc_html('Profile') ?>
                                    </h2>
                                    <div class="toolbar-section__inner">
                                        <div class="toolbar-section__profile toolbar-profile">
                                            <div class="toolbar-profile__button-wrapper">
                                                <a href="<?= esc_url(get_permalink(10)) ?>" class="toolbar-profile__button">
                                                    Go to profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="toolbar-section" data-id="#search">
                                    <h2 class="toolbar-section__heading">
                                        <?= esc_html('Search') ?>
                                    </h2>
                                </div>
                                <div class="toolbar-section" data-id="#favorite">
                                    <h2 class="toolbar-section__heading">
                                        <?= esc_html('Wishlist') ?>
                                    </h2>
                                    <div class="toolbar-section__inner">
                                        <div class="toolbar-section__wishlist toolbar-wishlist">
                                            <ul class="toolbar-wishlist__list">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="toolbar-section" data-id="#cart">
                                    <h2 class="toolbar-section__heading">
                                        <?= esc_html('Shopping Cart') ?>
                                    </h2>
                                    <div class="toolbar-section__inner">
                                        <div class="toolbar-section__cart toolbar-cart">
                                            <ul class="toolbar-cart__list">
                                            </ul>
                                            <div class="toolbar-cart__bottom">
                                                <div class="toolbar-cart__total">
                                                    <span><?= esc_html('Total') ?></span>
                                                    <span class="total"><?= esc_html('Rs. 0') ?></span>
                                                </div>
                                                <?php $cart_buttons = CFS()->get('cart_buttons', 16) ?>
                                                <?php if (count($cart_buttons) > 0) : ?>
                                                    <div class="toolbar-cart__buttons">
                                                        <?php for ($i = 0; $i < count($cart_buttons); $i++) : ?>
                                                            <div class="toolbar-cart__button-wrapper">
                                                                <a href="<?= esc_url(get_permalink($cart_buttons[$i]['button_url'][0])) ?>" class="toolbar-cart__button">
                                                                    <?= $cart_buttons[$i]['button_text'] ?>
                                                                </a>
                                                            </div>
                                                        <?php endfor; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>