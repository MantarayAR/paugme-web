+jQuery(function ($) {
    /**
     * Display Delete Modal
     */
    $('[data-action=showDeleteModal]').click(function (e) {
        e.preventDefault();

        $('[data-modal=deleteModal]').show();
    });
    $('[data-modal=deleteModal]').hide();

    +function showDeleteButton() {
        if (window.postId) {
            $('[data-show=showDeleteButton]').show();
        } else {
            $('[data-show=showDeleteButton]').hide();
        }
    }();
});