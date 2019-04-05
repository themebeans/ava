<?php if ( 'fullscreen' === $settings->height ) : ?>

( function( $ ) {
	"use strict";

	var
	body = $("body");

	function videoblock_fullscreen() {

		$(".fl-node-<?php echo esc_attr( $id ); ?> .bb--video_block").each(function() {
			var n = $(this);
			if( body.hasClass('admin-bar') ) {
				n.css({ "height": $(window).height() - 32 + 'px' });
			} else {
				n.css({ "height": $(window).height() + 'px' });
			}
		});
	}

	$(document).ready(function() {
		videoblock_fullscreen();
	});

	$(window).resize(function(){
		videoblock_fullscreen();
	});

} )( jQuery );

<?php endif; ?>
