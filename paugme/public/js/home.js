+jQuery(function ($) {
    var lights = [];

    function turnLightOn() {
        lights.push(
            setTimeout( function turnLightOnHelper() {
                $('.home__circuit_light .fa').addClass('on');
            }, 1000 /* one second */ )
        );
    }

    function turnLightOff() {
        for ( var i = 0; i < lights.length; i++ ) {
            clearTimeout( lights[i] );
        }

        $('.home__circuit_light .fa').removeClass('on');
    }

    $(window).scroll( function lightUpTheBulb(e) {
        var scroll = $(window).scrollTop();
        var triggerScroll = scroll + window.outerHeight * .8;
        var offset = $('.home__circuit_light').offset().top;

        if ( triggerScroll >= offset ) {
            turnLightOn();
        } else {
            turnLightOff();
        }
    }).scroll(); // Run once
});

