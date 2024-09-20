<?php global $post; ?>

<li class="blog-list__item blog-item">
    <div class="blog-item__view">
        <div class="blog-item__image">
            <a href="<?= esc_url(get_permalink()) ?>" class="ibg" style="background-image: url('<?= wp_get_attachment_url(get_post_thumbnail_id()) ?>');">
                <?php the_post_thumbnail('full') ?>
            </a>
        </div>
        <div class="blog-item__links">
            <a href="<?= esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" class="blog-item__link">
                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/admin.svg" alt="">
                <?= get_the_author_meta('display_name') ?>
            </a>
            <a href="<?= esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')))  ?>" class="blog-item__link">
                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/calendar.svg" alt="">
                <?= get_the_date() ?>
            </a>
            <a href="<?= esc_url(get_category_link(get_the_category()[0]->cat_ID)) ?>" class="blog-item__link">
                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/img/tag.svg" alt="">
                <?= get_the_category()[0]->name ?>
            </a>
        </div>
    </div>
    <div class="blog-item__content">
        <h2 class="blog-item__heading">
            <a href="<?= esc_url(get_permalink()) ?>">
                <?= get_the_title() ?>
            </a>
        </h2>
        <div class="blog-item__text">
            <p><?= get_the_excerpt() ?></p>
        </div>
        <div class="blog-item__button-wrapper">
            <a href="<?= esc_url(get_permalink()) ?>" class="blog-item__button">
                <?= esc_html('Read more') ?>
            </a>
        </div>
    </div>
</li>