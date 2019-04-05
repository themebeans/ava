<?php
/**
 * The template for displaying the footer
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

	/*
	 * Don't show the #site-header on the error 404 page template.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/is_404
	 */
if ( ! is_404() ) : ?>

		</div>

	</div>

	<?php
	// Retrieve the footer.
	do_action( 'ava_do_footer' );

endif;
?>

	</div>

	<?php

	/*
	 * @hooked ava_search
	 * @hooked ava_flyout
	 */
	do_action( 'ava_after_page' );

	wp_footer();
	?>

	</body>

</html>
