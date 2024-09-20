<?php get_header(); ?>

<main id="primary" class="main">
    <section class="search">
        <?php
        if (have_posts()) :
        ?>
            <header class="section-header">
                <h1 class="section-title">
                    <?php
                    printf(esc_html__('Search Results for: %s', 'webshop'), '<span>' . get_search_query() . '</span>');
                    ?>
                </h1>
            </header>
        <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'search');
            endwhile;
            the_posts_navigation();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </section>
</main>

<?php
get_sidebar();
get_footer();
