( function( $ ) {
    "use strict";

    $(document).ready(function() {
        
        var 
        body    = $('body');
        
        window.sr = ScrollReveal();

        // Add class to <html> if ScrollReveal is supported
        if (sr.isSupported()) {
            body.addClass('sr');
        }

        var liamReveal = {
          delay      : 500,
          viewFactor : 0,
          reset      : true,
          duration   : 1250,
          opacity    : 0,
          easing     : 'cubic-bezier(.19,1,.22,1)',
        };

        sr.reveal( '.portfolio--liam .project__overlay', liamReveal );

    });

} )( jQuery );