<?php
/* Template Name: Home */
get_header(); ?>

<main id="primary" class="main">
    <?php $hero_slides = CFS()->get('hero_slider', 16) ?>
    <?php if (count($hero_slides) > 0) : ?>
        <section class="hero">
            <div class="hero-wrapper">
                <div class="hero-swiper swiper">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < count($hero_slides); $i++) : ?>
                            <div class="swiper-slide slide">
                                <div class="slide-wrapper">
                                    <div class="slide-bg ibg">
                                        <?= wp_get_attachment_image($hero_slides[$i]['slider_image'], 'full'); ?>
                                    </div>
                                    <div class="container">
                                        <div class="slide-inner">
                                            <h2 class="slide-title">
                                                <?= $hero_slides[$i]['slider_heading'] ?>
                                            </h2>
                                            <div class="slide-button-wrapper">
                                                <a href="<?= esc_url(get_permalink($hero_slides[$i]['slider_button_url'][0])) ?>" class="slide-button">
                                                    <?= $hero_slides[$i]['slider_button_text'] ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php $offer_blocks = CFS()->get('offer_blocks', 16) ?>
    <?php if (count($offer_blocks) > 0) : ?>
        <section class="offer">
            <div class="offer-wrapper">
                <div class="container">
                    <div class="offer-inner">
                        <ul class="offer-inner__list offer-list">
                            <?php for ($i = 0; $i < count($offer_blocks); $i++) : ?>
                                <li class="offer-list__item offer-item">
                                    <div class="offer-item__wrapper">
                                        <div class="offer-item__image">
                                            <?= wp_get_attachment_image($offer_blocks[$i]['block_image'], 'full'); ?>
                                        </div>
                                        <h3 class="offer-item__heading">
                                            <?= $offer_blocks[$i]['block_heading'] ?>
                                        </h3>
                                        <div class="offer-item__button-wrapper">
                                            <a href="<?= esc_url(get_permalink($offer_blocks[$i]['block_button_url'][0])) ?>" class="offer-item__button">
                                                <?= $offer_blocks[$i]['block_button_text'] ?>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (CFS()->get('picks_title')) : ?>
        <section class="picks">
            <div class="picks-wrapper">
                <div class="container">
                    <div class="picks-inner">
                        <h2 class="picks-inner__title">
                            <?= CFS()->get('picks_title') ?>
                        </h2>
                        <div class="picks-inner__text">
                            <p><?= CFS()->get('picks_text') ?></p>
                        </div>
                        <?php $picks_query = new WP_Query([
                            'posts_per_page' => 4,
                            'post_type' => 'product',
                            'order' => 'DESC',
                            'meta_key' => 'total_sales',
                            'orderby' => ['meta_value_num' => 'DESC', 'ID' => 'DESC'],
                        ]);
                        if ($picks_query->have_posts()) : ?>
                            <ul class="picks-inner__list picks-list">
                                <?php while ($picks_query->have_posts()) :
                                    $picks_query->the_post(); ?>
                                    <li class="picks-list__item picks-item">
                                        <?php woocommerce_template_loop_product_link_open() ?>
                                        <div class="picks-item__wrapper">
                                            <div class="picks-item__image">
                                                <?php woocommerce_show_product_loop_sale_flash(); ?>
                                                <?= wp_get_attachment_image($product->get_image_id(), 'full') ?>
                                            </div>
                                            <h4 class="picks-item__heading">
                                                <?= $product->get_name() ?>
                                            </h4>
                                            <div class="picks-item__text">
                                                <?= woocommerce_template_loop_price() ?>
                                            </div>
                                        </div>
                                        <?php woocommerce_template_loop_product_link_close() ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif;
                        wp_reset_postdata(); ?>
                        <div class="picks-inner__button-wrapper">
                            <a href="<?= esc_url(get_permalink(CFS()->get('picks_button_url')[0])) ?>" class="picks-inner__button">
                                <?= CFS()->get('picks_button_text') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (CFS()->get('arrivals_title')) : ?>
        <section class="arrivals">
            <div class="arrivals-wrapper">
                <div class="arrivals-inner">
                    <div class="arrivals-inner__image">
                        <?= wp_get_attachment_image(CFS()->get('arrivals_image'), 'full'); ?>
                    </div>
                    <div class="arrivals-inner__content">
                        <h4 class="arrivals-inner__title">
                            <?= CFS()->get('arrivals_title') ?>
                        </h4>
                        <h2 class="arrivals-inner__heading">
                            <?= CFS()->get('arrivals_heading') ?>
                        </h2>
                        <div class="arrivals-inner__button-wrapper">
                            <a href="<?= esc_url(get_permalink(CFS()->get('arrivals_button_url')[0])) ?>" class="arrivals-inner__button">
                                <?= CFS()->get('arrivals_button_text') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (CFS()->get('blogs_title')) : ?>
        <section class="blogs">
            <div class="blogs-wrapper">
                <div class="container">
                    <div class="blogs-inner">
                        <h2 class="blogs-inner__title">
                            <?= CFS()->get('blogs_title') ?>
                        </h2>
                        <div class="blogs-inner__text">
                            <p><?= CFS()->get('blogs_text') ?></p>
                        </div>
                        <?php $blog_query = new WP_Query([
                            'posts_per_page' => 3,
                            'post_type' => 'post',
                            'order' => 'DESC',
                        ]);
                        if ($blog_query->have_posts()) : ?>
                            <ul class="blogs-inner__list blogs-list">
                                <?php while ($blog_query->have_posts()) :
                                    $blog_query->the_post(); ?>
                                    <li class="blogs-list__item blogs-item">
                                        <div class="blogs-item__image">
                                            <a href="<?= esc_url(get_permalink()) ?>" class="ibg">
                                                <?php the_post_thumbnail('full') ?>
                                            </a>
                                        </div>
                                        <h4 class="blogs-item__heading">
                                            <a href="<?= esc_url(get_permalink()) ?>">
                                                <?= get_the_title() ?>
                                            </a>
                                        </h4>
                                        <div class="blogs-item__button-wrapper">
                                            <a href="<?= esc_url(get_permalink()) ?>" class="blogs-item__button">
                                                <?= esc_html('Read more') ?>
                                            </a>
                                        </div>
                                        <div class="blogs-item__description">
                                            <span>
                                                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/time.svg" alt="">
                                                <?= webshop_reading_time(get_the_ID()) ?>
                                            </span>
                                            <span>
                                                <a href="<?= esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')))  ?>">
                                                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/date.svg" alt="">
                                                    <?= get_the_date() ?>
                                                </a>
                                            </span>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif;
                        wp_reset_postdata(); ?>
                        <div class="blogs-inner__button-wrapper">
                            <a href="<?= esc_url(get_permalink(CFS()->get('blogs_button_url')[0])) ?>" class="blogs-inner__button">
                                <?= CFS()->get('blogs_button_text') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (CFS()->get('instagram_title')) : ?>
        <section class="inst">
            <div class="inst-wrapper">
                <div class="inst-bg ibg">
                    <?= wp_get_attachment_image(CFS()->get('instagram_bg'), 'full'); ?>
                </div>
                <div class="container">
                    <div class="inst-inner">
                        <h2 class="inst-inner__title">
                            <?= CFS()->get('instagram_title') ?>
                        </h2>
                        <div class="inst-inner__text">
                            <p><?= CFS()->get('instagram_text') ?></p>
                        </div>
                        <div class="inst-inner__button-wrapper">
                            <a href="<?= esc_url(CFS()->get('instagram_button')['url']) ?>" target="<?= CFS()->get('instagram_button')['target']; ?>" class="inst-inner__button">
                                <?= CFS()->get('instagram_button')['text'] ?>
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
