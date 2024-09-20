<?php
/* Template Name: Cart */
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
    <section class="cart">
        <div class="cart-wrapper">
            <div class="container">
                <?php
                while (have_posts()) :
                    the_post();

                    the_content();
                endwhile;
                ?>
                <!-- <div class="cart-inner">
                    <div class="cart-table-wrapper">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-bill">
                        <h3 class="cart-bill__title">
                            Cart Totals
                        </h3>
                        <div class="cart-bill__container">
                            <div class="cart-bill__subtotal">
                                Subtotal
                                <span class="subtotal">Rs. 250,000.00</span>
                            </div>
                            <div class="cart-bill__total">
                                Total
                                <span class="total">Rs. 250,000.00</span>
                            </div>
                        </div>
                        <div class="cart-bill__button-wrapper">
                            <a href="checkout.html" class="cart-bill__button">
                                Check Out
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <?php $charge_list = CFS()->get('charge_list', 16) ?>
    <?php if (count($charge_list) > 0) : ?>
        <section class="charge">
            <div class="charge-wrapper">
                <div class="container">
                    <div class="charge-inner">
                        <ul class="charge-inner__list charge-list">
                            <?php for ($i = 0; $i < count($charge_list); $i++) : ?>
                                <li class="charge-list__item charge-item">
                                    <h3 class="charge-item__heading">
                                        <?= $charge_list[$i]['charge_heading'] ?>
                                    </h3>
                                    <div class="charge-item__text">
                                        <?= $charge_list[$i]['charge_text'] ?>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
