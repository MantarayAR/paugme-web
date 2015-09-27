/**
 * Admin Modals
 *
 * Display Delete Modal
 */
+jQuery(function ($) {
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

/**
 * Data Tables
 *
 * Setup datatables for any tables in the admin panel
 */
+jQuery(function ($) {
    $('[data-type=dataTable]').DataTable();
});
