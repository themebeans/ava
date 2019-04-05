( function( $ ) {
    "use strict";

    var body = $("body");

    function parallax_gallery() {
        $(".fullscreen-parallax-item").each(function() {
            var n = $(this);
            if( body.hasClass('admin-bar') ) {
                n.css({ "height": $(window).height() - 32 + 'px' });
            } else {
                n.css({ "height": $(window).height() + 'px' });
            }
        });
    }

    $(document).ready(function() {
        parallax_gallery();
    });

     $(window).resize(function(){
        parallax_gallery();
    });   

} )( jQuery );