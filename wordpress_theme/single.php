<?php get_header(); ?>

<main class="main">
    <?php while (have_posts()) : the_post() ?>
        <section class="post-header">
            <div class="post-header__wrapper">
                <div class="container">
                    <div class="post-header__inner">
                        <h1 class="post-header__title">
                            <?= get_the_title() ?>
                        </h1>
                        <div class="post-header__breadcrumbs">
                            <?php woocommerce_breadcrumb() ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="main-wrapper">
                <div class="main-content">
                    <section class="post">
                        <div class="post-wrapper">
                            <div class="post-inner">
                                <div class="post-item">
                                    <div class="post-item__view">
                                        <div class="post-item__image ibg">
                                            <?php the_post_thumbnail('full') ?>
                                        </div>
                                        <div class="post-item__links">
                                            <a href="<?= esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" class="post-item__link">
                                                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/admin.svg" alt="">
                                                <?= get_the_author_meta('display_name') ?>
                                            </a>
                                            <a href="<?= esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')))  ?>" class="post-item__link">
                                                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/calendar.svg" alt="">
                                                <?= get_the_date() ?>
                                            </a>
                                            <a href="<?= esc_url(get_category_link(get_the_category()[0]->cat_ID)) ?>" class="post-item__link">
                                                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/tag.svg" alt="">
                                                <?= get_the_category()[0]->name ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-item__content">
                                        <?= apply_filters('the_content', get_the_content()) ?>
                                    </div>
                                </div>
                                <?= get_the_post_navigation([
                                    'class' => 'post-navigation',
                                    'prev_text' => '<span class="subtitle">' . esc_html('Previous:') . '</span> <span class="title">%title</span>',
                                    'next_text' => '<span class="subtitle">' . esc_html('Next:') . '</span> <span class="title">%title</span>'
                                ]) ?>
                            </div>
                        </div>
                    </section>
                </div>
                <?php get_sidebar(); ?>
            </div>
            <?php comments_template() ?>
        </div>
    <?php endwhile ?>
</main>

<?php
get_footer();
