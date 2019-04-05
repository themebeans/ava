<?php
/**
 * The template for displaying the footer.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if (
is_active_sidebar( 'footer-col-1' ) ||
is_active_sidebar( 'footer-col-2' ) ||
is_active_sidebar( 'footer-col-3' ) ||
is_active_sidebar( 'footer-col-4' ) ||
is_customize_preview() ) : ?>

	<footer id="site-footer" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">

		<div class="site-footer__inner footer-5">

			<div class="site-footer__widgets">

				<?php do_action( 'ava_before_footer_widgets' ); ?>

				<div class="site-footer__left">

					<?php if ( is_active_sidebar( 'footer-col-1' ) || is_customize_preview() ) : ?>
						<div class="site-footer__left-col col-1">
							<?php do_action( 'ava_before_first_footer_col' ); ?>
							<?php dynamic_sidebar( 'footer-col-1' ); ?>
							<?php do_action( 'ava_after_first_footer_col' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-col-2' ) || is_customize_preview() ) : ?>
						<div class="site-footer__left-col col-2">
							<?php do_action( 'ava_before_second_footer_col' ); ?>
							<?php dynamic_sidebar( 'footer-col-2' ); ?>
							<?php do_action( 'ava_after_second_footer_col' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-col-3' ) || is_customize_preview() ) : ?>
						<div class="site-footer__left-col col-3">
							<?php do_action( 'ava_before_third_footer_col' ); ?>
							<?php dynamic_sidebar( 'footer-col-3' ); ?>
							<?php do_action( 'ava_after_third_footer_col' ); ?>
						</div>
					<?php endif; ?>

				</div>

				<div class="site-footer__right">
					<?php if ( is_active_sidebar( 'footer-col-4' ) || is_customize_preview() ) : ?>
						<div class="site-footer__right-col col-4">
							<?php do_action( 'ava_before_fourth_footer_col' ); ?>
							<?php dynamic_sidebar( 'footer-col-4' ); ?>
							<?php do_action( 'ava_after_fourth_footer_col' ); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>

			<?php do_action( 'ava_after_footer_widgets' ); ?>

		</div>

	</footer>

<?php
endif;
