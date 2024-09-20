<?php if (!defined('ABSPATH')) exit;
get_header(); ?>

<main class="main">
    <?php while (have_posts()) :
        the_post();

        wc_get_template_part('content', 'single-product');
    endwhile; ?>
    <?php woocommerce_output_related_products(); ?>
</main>

<?php get_footer();
