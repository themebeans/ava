( function( $ ) {
    "use strict";

    var
    body = $('body'),
    active  = ("js--active");

    function gavin() {

        $('.project__navigation .project__navigation_link:first').addClass( active );

        $('.portfolio--gavin .project:first').addClass( active );

        $(".project__navigation .project__navigation_link").each(function(){
            $( this ).hover(function(){

                $(".project__navigation").find("a").removeClass( active );
                $(".portfolio--gavin").find("article").removeClass( active );

                var urlId = $(this).data( 'id' );
                $(this).addClass(active);

                var msg = document.getElementById('post-' + urlId + '');

                $( msg ).addClass( active );

            });

        });

    }

    function gavin_fullscreen() {
        $(".portfolio--fullscreen").each(function() {

            var n = $(this);

            if( body.hasClass('admin-bar') ) {

                var header = $('body:not(.site-header--absolute):not(.site-header--fixed) #masthead').outerHeight() + 5;

                n.css({ "height": $(window).height() - header - 37 + 'px' });

            } else {

                var header2 = $('body:not(.site-header--absolute):not(.site-header--fixed) #masthead').outerHeight() + 10;

                n.css({ "height": $(window).height() - header2 + 'px' });
            }

        });
    }

    $(document).ready(function() {
        gavin();
        gavin_fullscreen();
    });

    $(window).resize(function(){
        gavin_fullscreen();
    });

} )( jQuery );