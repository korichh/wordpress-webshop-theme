<?php get_header(); ?>

<main id="primary" class="main">
    <section class="error-404 not-found">
        <header class="section-header">
            <h1 class="section-title"><?= esc_html__('Oops! That page can&rsquo;t be found.', 'webshop'); ?></h1>
        </header>

        <div class="section-content">
            <p><?= esc_html__('It looks like nothing was found at this location.', 'webshop'); ?></p>
        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();
