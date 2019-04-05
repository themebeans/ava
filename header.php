<?php
/**
 * The header for our theme.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>
	<?php do_action( 'ava_before_page' ); ?>
	<div id="page" class="site" itemscope itemprop="mainContentOfPage">

		<?php

		/*
		 * Don't show the site header on the error 404 page.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/is_404
		 */
		if ( ! is_404() ) :

			// Retrieve the header.
			do_action( 'ava_do_header' );
			?>

			<div id="content" class="site-content">

				<div class="site-content__inner">

		<?php
		endif;
