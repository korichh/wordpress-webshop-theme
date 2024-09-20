<?php
/* Template Name: Checkout */
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
    <section class="billing">
        <div class="billing-wrapper">
            <div class="container">
                <?php
                while (have_posts()) :
                    the_post();

                    the_content();
                endwhile;
                ?>
                <!-- <div class="billing-inner">
                    <form action="#" method="post" class="billing-form">
                        <div class="billing-form__details billing-details">
                            <h3 class="billing-details__title">
                                Billing details
                            </h3>
                            <div class="row">
                                <div class="block">
                                    <label for="name">First Name</label>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div class="block">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" id="lastname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="company_name">Company Name (Optional)</label>
                                    <input type="text" name="company_name" id="company_name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="country">Country/Region</label>
                                    <select name="country" id="country">
                                        <option value="sri_lanka">Sri Lanka</option>
                                        <option value="another_one">Another One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="street_address">Street address</label>
                                    <input type="text" name="street_address" id="street_address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="town">Town/City</label>
                                    <input type="text" name="town" id="town">
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="province">Province</label>
                                    <select name="province" id="province">
                                        <option value="western_province">Western Province</option>
                                        <option value="another_one">Another One</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="zip_code">ZIP code</label>
                                    <input type="text" name="zip_code" id="zip_code">
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <label for="email">Email address</label>
                                    <input type="text" name="email" id="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">
                                    <input type="text" placeholder="Additional information" name="additional" id="additional">
                                </div>
                            </div>
                        </div>
                        <div class="billing-form__product billing-product">
                            <div class="billing-product__table billing-table">
                                <div class="billing-table__name row">
                                    <div>Product</div>
                                    <div>Subtotal</div>
                                </div>
                                <ul class="billing-table__list">

                                </ul>
                                <div class="billing-table__total row">
                                    <div>Total</div>
                                    <div><span class="total">Rs. 494,000.00</span></div>
                                </div>
                            </div>
                            <div class="billing-product__info">
                                <p>
                                    Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <b>privacy policy</b>.
                                </p>
                            </div>
                            <div class="billing-product__submit">
                                <button type="submit">
                                    Place order
                                </button>
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
