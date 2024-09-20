<form role="search" method="get" action="<?= home_url('/') ?>" class="sidebar-search__form">
    <div class="row">
        <div class="block">
            <span class="screen-reader-text" hidden><?= esc_html('Search for: ') ?></span>
            <input type="text" value="<?= get_search_query() ?>" name="s">
        </div>
    </div>
</form>