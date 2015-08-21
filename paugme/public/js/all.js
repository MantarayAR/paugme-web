var headroomEl = document.querySelector("header");
var headroom  = new Headroom(headroomEl, {
    offset: 50
});
headroom.init();

/**
 *  Mobile Menu
 */
+function ($) {
    var OPEN   = 'open';
    var CLOSED = 'closed';

    var mobileMenuState = CLOSED;

    var mobileMenuSelector       = '[data-is="mobile-menu"]';
    var mobileMenuButtonSelector = '[data-for="mobile-menu"]';

    function isOpen() {
        return mobileMenuState === OPEN;
    }

    function open() {
        $(mobileMenuSelector).addClass( 'active' );
        mobileMenuState = OPEN;
    }

    function close() {
        $(mobileMenuSelector).removeClass( 'active' );
        mobileMenuState = CLOSED;
    }

    $(mobileMenuButtonSelector).click(function (e) {
        e.stopPropagation();
        if ( isOpen() ) {
            close();
        } else {
            open();
        }
    });
    $(document).click(function ( e ) {
        if ( isOpen() ) {
            if ( $(e.target).closest(mobileMenuSelector).length === 0) {
                close();
            }
        }
    });

}(jQuery);