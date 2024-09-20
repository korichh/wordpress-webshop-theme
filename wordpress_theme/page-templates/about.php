<?php
/* Template Name: About */
get_header(); ?>

<main class="main">
    <?php if (CFS()->get('banner_title')) : ?>
        <section class="banner">
            <div class="banner-wrapper">
                <div class="banner-bg ibg">
                    <?= wp_get_attachment_image(CFS()->get('banner_bg'), 'full'); ?>
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
                            <?= CFS()->get('banner_title') ?>
                        </h1>
                        <div class="banner-inner__breadcrumbs banner-breadcrumbs">
                            <?php woocommerce_breadcrumb() ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif ?>
    <?php if (CFS()->get('content_text')) : ?>
        <section class="about">
            <div class="about-wrapper">
                <div class="container">
                    <div class="about-inner">
                        <div class="about-inner__content about-content">
                            <?= CFS()->get('content_text') ?>
                        </div>
                        <?php $info_blocks = CFS()->get('info_blocks', 32) ?>
                        <?php if (count($info_blocks) > 0) : ?>
                            <div class="about-inner__address about-address">
                                <ul class="about-address__list">
                                    <?php for ($i = 0; $i < count($info_blocks); $i++) : ?>
                                        <li class="about-address__item about-item">
                                            <div class="about-item__image">
                                                <?= wp_get_attachment_image($info_blocks[$i]['block_image'], 'full'); ?>
                                            </div>
                                            <div class="about-item__content">
                                                <h4 class="about-item__heading">
                                                    <?= $info_blocks[$i]['block_title'] ?>
                                                </h4>
                                                <div class="about-item__text">
                                                    <?= $info_blocks[$i]['block_text'] ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (CFS()->get('arrivals_title', 16)) : ?>
        <section class="arrivals">
            <div class="arrivals-wrapper">
                <div class="arrivals-inner">
                    <div class="arrivals-inner__image">
                        <?= wp_get_attachment_image(CFS()->get('arrivals_image', 16), 'full'); ?>
                    </div>
                    <div class="arrivals-inner__content">
                        <h4 class="arrivals-inner__title">
                            <?= CFS()->get('arrivals_title', 16) ?>
                        </h4>
                        <h2 class="arrivals-inner__heading">
                            <?= CFS()->get('arrivals_heading', 16) ?>
                        </h2>
                        <div class="arrivals-inner__button-wrapper">
                            <a href="<?= esc_url(get_permalink(CFS()->get('arrivals_button_url', 16)[0])) ?>" class="arrivals-inner__button">
                                <?= CFS()->get('arrivals_button_text', 16) ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
