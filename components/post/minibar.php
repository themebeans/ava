<?php
/**
 * The file is for displaying the post minibar on singular posts.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

$prev_post = get_previous_post();

if ( ! empty( $prev_post ) ) : ?>

	<div id="site-minibar" class="site-minibar">

		<div class="site-minibar__inner">

			<div class="site-minibar__progress"></div>

			<div class="site-minibar__left">

				<div class="social-wrapper">

					<div class="svg__wrapper svg__facebook-share">
						<a class="pulse-active" target="_blank" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[url]=<?php the_permalink(); ?>&amp;&amp;p[images][0]=','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">
							<?php echo ava_get_svg( array( 'icon' => 'facebook-share' ) ); ?>
						</a>
					</div>

					<div class="svg__wrapper svg__twitter-share">
						<a class="pulse-active" href="http://twitter.com/share?text=&#34;<?php the_title(); ?>&#34;&url=<?php get_the_permalink(); ?>" target="_blank">
							<?php echo ava_get_svg( array( 'icon' => 'twitter-share' ) ); ?>
						</a>
					</div>

				</div>

				<?php echo ava_get_post_like_link( get_the_ID() ); ?>

			</div>

			<div class="site-minibar__right">

				<?php if ( get_the_post_thumbnail( $prev_post->ID ) ) { ?>

					<div class="post-thumbnail">
						<?php echo get_the_post_thumbnail( $prev_post->ID, 'ava-post-mini-image' ); ?>
					</div>

				<?php } ?>

				<div class="site-minibar__right-content">
					<div class="site-label"><?php echo apply_filters( 'ava_next_story', esc_html__( 'Next Story', 'ava' ) ); ?></div>
					<?php printf( '<h5 class="entry-title minibar-title">%1$s</h5>', esc_html( $prev_post->post_title ) ); ?>
					<?php printf( '<a href="%1$s" rel="bookmark"></a>', esc_url( get_permalink( $prev_post->ID ) ) ); ?>
				</div>
			</div>

		</div>

	</div>

<?php endif; ?>
