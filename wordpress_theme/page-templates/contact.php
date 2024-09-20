<?php
/* Template Name: Contact */
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
    <?php if (CFS()->get('content_title')) : ?>
        <section class="contact">
            <div class="contact-wrapper">
                <div class="container">
                    <div class="contact-inner">
                        <div class="contact-content">
                            <h2 class="contact-content__title">
                                <?= CFS()->get('content_title') ?>
                            </h2>
                            <div class="contact-content__text">
                                <?= CFS()->get('content_text') ?>
                            </div>
                        </div>
                        <div class="contact-block">
                            <?php $info_blocks = CFS()->get('info_blocks') ?>
                            <?php if (count($info_blocks) > 0) : ?>
                                <div class="contact-block__info contact-info">
                                    <ul class="contact-info__list">
                                        <?php for ($i = 0; $i < count($info_blocks); $i++) : ?>
                                            <li class="contact-info__item contact-item">
                                                <div class="contact-item__image">
                                                    <?= wp_get_attachment_image($info_blocks[$i]['block_image'], 'full'); ?>
                                                </div>
                                                <div class="contact-item__content">
                                                    <h4 class="contact-item__heading">
                                                        <?= $info_blocks[$i]['block_title'] ?>
                                                    </h4>
                                                    <div class="contact-item__text">
                                                        <?= $info_blocks[$i]['block_text'] ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="#" method="post" class="contact-block__form contact-form">
                                <div class="row">
                                    <div class="block">
                                        <label for="name">Your name</label>
                                        <input type="text" name="name" id="name">
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
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="block">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="block">
                                        <button type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif ?>
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
