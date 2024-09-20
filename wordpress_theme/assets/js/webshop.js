jQuery(function (o) {
    o(".woocommerce-ordering").on("change", "select.posts_per_page", function () {
        o(this).closest("form").trigger("submit")
    })
});
