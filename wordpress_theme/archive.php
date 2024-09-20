<?php get_header(); ?>

<main id="primary" class="main">
    <section class="archive">
        <?php
        if (have_posts()) :
        ?>
            <header class="section-header">
                <?php
                the_archive_title('<h1 class="section-title">', '</h1>');
                the_archive_description('<div class="section-description">', '</div>');
                ?>
            </header>
        <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());
            endwhile;
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </section>
</main>

<?php
get_sidebar();
get_footer();
