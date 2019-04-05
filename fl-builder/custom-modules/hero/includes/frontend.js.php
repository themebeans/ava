<?php
/**
 * Beaver Builder module, front-end javascript
 *
 * You have access to two variables in this file:
 * $id: The module's id.
 * $settings: The module's settings.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( 'fullscreen' === $settings->height ) : ?>

	( function( $ ) {
		"use strict";

		var
		body = $("body");

		function hero_fullscreen() {

			$(".fl-node-<?php echo esc_attr( $id ); ?> .bb--hero").each(function() {
				var n = $(this);
				if( body.hasClass('admin-bar') ) {
					n.css({ "height": $(window).height() - 32 + 'px' });
				} else {
					n.css({ "height": $(window).height() + 'px' });
				}
			});
		}

		$(document).ready(function() {
			hero_fullscreen();
		});

		$(window).resize(function(){
			hero_fullscreen();
		});

	} )( jQuery );

<?php
endif;
