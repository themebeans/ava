<?php if ( 'yes' === $settings->load_animation ) : ?>

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

				var ethanReveal = {
					delay      : 200,
					viewFactor : 0.15,
					duration   : 1000,
					opacity    : 0,
					scale      : 1,
					distance   : '1000px',
					easing     : 'cubic-bezier(.19,1,.22,1)',
				};

				sr.reveal( '.portfolio--ethan .project', ethanReveal );

		});

} )( jQuery );

<?php endif; ?>
