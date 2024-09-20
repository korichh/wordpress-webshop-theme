<aside class="main-sidebar blog-sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-search">
            <?= get_search_form() ?>
        </div>
        <div class="sidebar-categories">
            <h3 class="sidebar-categories__title sidebar-title">
                <?= esc_html('Categories') ?>
            </h3>
            <ul class="sidebar-categories__list">
                <?php
                $categories = get_categories();
                foreach ($categories as $category) : ?>
                    <li class="sidebar-categories__list-item sidebar-categories__item">
                        <a href="<?= get_category_link($category->term_id) ?>">
                            <h4 class="sidebar-categories__item-name">
                                <?= $category->name ?>
                            </h4>
                            <div class="sidebar-categories__item-count">
                                <?= $category->category_count ?>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="sidebar-recent">
            <h3 class="sidebar-recent__title sidebar-title">
                <?= esc_html('Recent Posts') ?>
            </h3>
            <ul class="sidebar-recent__list">
                <?php
                $recent_query = new WP_Query([
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'posts_per_page' => 5
                ]);
                if ($recent_query->have_posts()) : ?>
                    <?php while ($recent_query->have_posts()) :
                        $recent_query->the_post(); ?>
                        <li class="sidebar-recent__list-item sidebar-recent__item">
                            <div class="sidebar-recent__item-image">
                                <a href="<?= esc_url(get_permalink()) ?>" class="ibg">
                                    <?php the_post_thumbnail('thumbnail') ?>
                                </a>
                            </div>
                            <div class="sidebar-recent__item-content">
                                <h4 class="sidebar-recent__item-heading">
                                    <a href="<?= esc_url(get_permalink()) ?>">
                                        <?= get_the_title() ?>
                                    </a>
                                </h4>
                                <div class="sidebar-recent__item-date">
                                    <a href="<?= esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')))  ?>">
                                        <?= get_the_date() ?>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</aside>