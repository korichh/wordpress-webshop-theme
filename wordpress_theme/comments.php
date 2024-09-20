<?php if (post_password_required()) return ?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php $webshop_comment_count = get_comments_number();
            printf(
                esc_html(_n('%1$s comment on %2$s', '%1$s comments on %2$s', $webshop_comment_count, 'webshop')),
                number_format_i18n($webshop_comment_count),
                '<span>' . wp_kses_post(get_the_title()) . '</span>'
            ) ?>
        </h2>

        <?= get_the_comments_navigation() ?>

        <ol class="comment-list">
            <?php wp_list_comments([
                'style' => 'ol',
            ]) ?>
        </ol>

        <?php the_comments_navigation();
        if (!comments_open()) : ?>
            <p class="no-comments"><?= esc_html('Comments are closed.') ?></p>
    <?php endif;
    endif;
    comment_form() ?>
</div>