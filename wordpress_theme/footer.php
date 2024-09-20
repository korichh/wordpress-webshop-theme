<footer class="footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-inner__bar">
                    <div class="footer-inner__address">
                        <?php if (get_theme_mod('custom_logo')) : ?>
                            <a href="<?= esc_url(home_url('/')) ?>">
                                <img src="<?= esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="webshop logo">
                            </a>
                        <?php else : ?>
                            <a href="<?= esc_url(home_url('/')) ?>" class="header-inner__logo">
                                <h2><?= get_bloginfo('name') ?></h2>
                            </a>
                        <?php endif; ?>
                        <p><?= CFS()->get('address', 16) ?></p>
                    </div>
                    <div class="footer-inner__columns">
                        <div class="footer-inner__column footer-column">
                            <h4 class="footer-column__heading">
                                <?= esc_html('Links') ?>
                            </h4>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'header_menu',
                                'menu_class'     => 'footer-column__list footer-list',
                                'container'      => '',
                            ));
                            ?>
                        </div>
                        <div class="footer-inner__column footer-column">
                            <h4 class="footer-column__heading">
                                <?= esc_html('Help') ?>
                            </h4>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'help_menu',
                                'menu_class'     => 'footer-column__list footer-list',
                                'container'      => '',
                            ));
                            ?>
                        </div>
                        <div class="footer-inner__column footer-column">
                            <h4 class="footer-column__heading">
                                <?= esc_html('Newsletter') ?>
                            </h4>
                            <form class="footer-column__form footer-form" action="#" method="post">
                                <div class="footer-form__row">
                                    <input type="email" name="email" placeholder="Enter Your Email Address" id="footer-form__email">
                                    <input type="submit" value="SUBSCRIBE">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer-inner__copyright">
                    <p><?= CFS()->get('copyright', 16) ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer() ?>
</body>

</html>