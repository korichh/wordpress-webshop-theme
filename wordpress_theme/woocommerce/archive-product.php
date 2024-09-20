<?php if (!defined('ABSPATH')) exit;
get_header(); ?>

<main class="main">
    <?php if (CFS()->get('banner_title', 7)) : ?>
        <section class="banner">
            <div class="banner-wrapper">
                <div class="banner-bg ibg">
                    <?= wp_get_attachment_image(CFS()->get('banner_bg', 7), 'full'); ?>
                </div>
                <div class="container">
                    <div class="banner-inner">
                        <div class="banner-inner__logo">
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
                        <h1 class="banner-inner__title">
                            <?php woocommerce_page_title(); ?>
                        </h1>
                        <div class="banner-inner__breadcrumbs banner-breadcrumbs">
                            <?php woocommerce_breadcrumb() ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif ?>
    <section class="products">
        <div class="products-wrapper">
            <div class="products-inner">
                <div class="products-inner__tab products-tab">
                    <div class="products-tab__toolbar products-toolbar">
                        <div class="products-toolbar__wrapper">
                            <div class="products-toolbar__inner">
                                <button class="products-toolbar__close">
                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/close.svg" alt="">
                                </button>
                                <h2 class="products-toolbar__heading">
                                    <?= esc_html__('Filter', 'webshop') ?>
                                </h2>
                                <div class="products-toolbar__filter">
                                    <?= kap_get_shop_filters() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="products-tab__tools products-tools">
                            <div class="products-tools__inner">
                                <div class="products-tools__left">
                                    <div class="products-tools__filter">
                                        <button>
                                            <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/filter.svg" alt="">
                                            <?= esc_html__('Filter', 'webshop') ?>
                                        </button>
                                    </div>
                                    <div class="products-tools__grid">
                                        <button class="grid">
                                            <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/grid.svg" alt="">
                                        </button>
                                        <button class="list">
                                            <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/list.svg" alt="">
                                        </button>
                                    </div>
                                    <div class="products-tools__count">
                                        <?php woocommerce_result_count() ?>
                                    </div>
                                </div>
                                <?php woocommerce_catalog_ordering() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <?php
                    if (woocommerce_product_loop()) :
                        woocommerce_output_all_notices();
                        woocommerce_product_loop_start();
                        if (wc_get_loop_prop('total')) {
                            while (have_posts()) {
                                the_post();
                                wc_get_template_part('content', 'product');
                            }
                        }
                        woocommerce_product_loop_end();
                    else :
                        wc_get_template('loop/no-products-found.php');
                    endif;
                    ?>
                    <div class="products-inner__pagination products-pagination">
                        <ul class="products-pagination__list">
                            <?php woocommerce_pagination() ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $charge_list = CFS()->get('charge_list', 16) ?>
    <?php if (count($charge_list) > 0) : ?>
        <section class="charge">
            <div class="charge-wrapper">
                <div class="container">
                    <div class="charge-inner">
                        <ul class="charge-inner__list charge-list">
                            <?php for ($i = 0; $i < count($charge_list); $i++) : ?>
                                <li class="charge-list__item charge-item">
                                    <h3 class="charge-item__heading">
                                        <?= $charge_list[$i]['charge_heading'] ?>
                                    </h3>
                                    <div class="charge-item__text">
                                        <?= $charge_list[$i]['charge_text'] ?>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer('shop');
