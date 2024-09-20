<?php
/* Template Name: Account */
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
    <section class="auth">
        <div class="auth-wrapper">
            <div class="container">
                <?php
                while (have_posts()) :
                    the_post();

                    the_content();
                endwhile;
                ?>
                <!-- <div class="auth-inner">
                    <form action="#" method="post" class="auth-inner__form auth-form">
                        <h3 class="auth-form__title">
                            Log In
                        </h3>
                        <div class="row">
                            <div class="block">
                                <label for="login">Username or email address</label>
                                <input type="text" id="login" name="login">
                            </div>
                        </div>
                        <div class="row">
                            <div class="block">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="block block-row">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block block-row">
                                <button type="submit">Log In</button>
                                <a href="#">Lost Your Password</a>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="post" class="auth-inner__form auth-form">
                        <h3 class="auth-form__title">
                            Register
                        </h3>
                        <div class="row">
                            <div class="block">
                                <label for="register">Email address</label>
                                <input type="text" id="register" name="register">
                            </div>
                        </div>
                        <div class="row">
                            <div class="block">
                                <p>A link to set a new password will be sent to your email address.</p>
                                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <b>privacy policy</b>.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block">
                                <button type="submit">Register</button>
                            </div>
                        </div>
                    </form>
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
