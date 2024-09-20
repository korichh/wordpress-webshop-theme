<?php get_header(); ?>

<main id="primary" class="main">
    <section class="page">
        <?php
        while (have_posts()) :
            the_post();

            the_content();

            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile;
        ?>
    </section>
</main>

<?php
get_sidebar();
get_footer();
