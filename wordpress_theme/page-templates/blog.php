<?php
/* Template Name: Blog */
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
    <div class="container">
        <div class="main-wrapper">
            <div class="main-content">
                <?php
                $blog_query = new WP_Query($GLOBALS['common_vars']);
                $GLOBALS['wp_query'] = $blog_query;
                if ($blog_query->have_posts()) : ?>
                    <section class="blog">
                        <div class="blog-wrapper">
                            <div class="blog-inner">
                                <ul class="blog-inner__list blog-list items-list">
                                    <?php while ($blog_query->have_posts()) :
                                        $blog_query->the_post();
                                        get_template_part('post-templates/single', 'blog');
                                    endwhile; ?>
                                </ul>
                                <div class="blog-inner__pagination blog-pagination">
                                    <div class="blog-pagination__list page-pagination">
                                        <?= webshop_paginate($blog_query->max_num_pages, $GLOBALS['common_vars']['paged']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
            <?php get_sidebar() ?>
        </div>
        <div class="blog-inner__pagination blog-pagination big">
            <div class="blog-pagination__list page-pagination">
                <?= webshop_paginate($blog_query->max_num_pages, $GLOBALS['common_vars']['paged']) ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
