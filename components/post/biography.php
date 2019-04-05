<?php
/**
 * The file is for displaying the author information.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

if ( ! is_singular( 'post' ) ) {
	return;
}

$author_bio = get_theme_mod( 'singlepost_bio', ava_defaults( 'singlepost_bio' ) );

if ( $author_bio || is_customize_preview() ) :

	/**
	 * Only display if there's an author description.
	 */
	if ( get_the_author_meta( 'user_description' ) || is_customize_preview() ) :

		/**
		 * Only display if the option is selected in the Customizer.
		 */
		$visibility = ( false === $author_bio ) ? ' hidden ' : ''; ?>

		<div class="author-info<?php echo esc_attr( $visibility ); ?>">

			<a class="author-avatar" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php
				/**
				 * Filter the author bio avatar size.
				 *
				 * @param int $size The avatar height and width size in pixels.
				 */
				$author_bio_avatar_size = apply_filters( 'ava_author_bio_avatar_size', 220 );

				echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				?>
			</a>

			<h5 class="author-name">
				<span class="screen-reader-text"><?php echo esc_html_x( 'View all posts by', 'Used before post author name.', 'ava' ); ?></span>
				<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
			</h5>

			<p class="author-description">
				<?php the_author_meta( 'user_description' ); ?>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php esc_html( get_the_author_meta( 'display_name' ) ); ?>
				</a>
			</p>

		</div>

	<?php
	endif;

endif;
