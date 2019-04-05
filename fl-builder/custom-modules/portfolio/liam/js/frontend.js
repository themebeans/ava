( function( $ ) {
    "use strict";

    var body = $("body");

    function liam() {
        $(".portfolio--liam__parallax_item").each(function() {
            var n = $(this);
            if( body.hasClass('admin-bar') ) {
                n.css({ "height": $(window).height() - 32 + 'px' });
            } else {
                n.css({ "height": $(window).height() + 'px' });
            }
        });
    }

    $(document).ready(function() {
        liam();
    });

     $(window).resize(function(){
        liam();
    });   

} )( jQuery );