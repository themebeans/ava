<?php
/**
 * Beaver Builder Hero module
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Module class.
 */
class Ava_Hero extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Hero Area', 'ava' ),
				'description'     => '',
				'category'        => AVA_MODULES_CATEGORY,
				'partial_refresh' => true,
			)
		);

	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue_scripts() {

		if ( $this->settings && 'yes' === $this->settings->parallax && ! empty( $this->settings->bg_image ) ) {
			$this->add_js( 'parallax', get_theme_file_uri( '/fl-builder/assets/js/parallax.js' ), array( 'jquery' ), '@@pkg.version', true );
		}

	}

	/**
	 * Render background.
	 *
	 * @param string $layout Selected layout option.
	 */
	public function render_background( $layout ) {

		// Background image.
		if ( 'image' === $this->settings->bg_layout && ! empty( $this->settings->bg_image ) ) {

			if ( 'no' === $this->settings->parallax ) {
				echo '<div class="bb--hero__image" style="background-image: url(' . esc_url( $this->settings->bg_image_src ) . ');"></div>';
			}
		}

		// Background video.
		if ( 'video' === $this->settings->bg_layout ) {

			$poster = ( ! empty( $this->settings->bg_video_poster_src ) ) ? $this->settings->bg_video_poster_src : null;

			echo '<video playsinline autoplay muted loop class="bb--hero__video">';

			if ( ! empty( $this->settings->bg_video_url ) ) {
				echo '<source src="' . esc_url( $this->settings->bg_video_url ) . '" type="video/mp4">';
			}

			if ( ! empty( $this->settings->bg_video_mp4 ) ) {
				echo '<source src="' . esc_url( $this->settings->bg_video_mp4 ) . '" type="video/mp4">';
			}

			if ( ! empty( $this->settings->bg_video_webm ) ) {
				echo '<source src="' . esc_url( $this->settings->bg_video_webm ) . '" type="video/webm">';
			}

			echo '</video>';

			if ( ! empty( $this->settings->bg_video_poster_src ) ) {
				echo '<div class="bb--hero__image with-video" style="background-image: url(' . esc_url( $poster ) . ');"></div>';
			}
		}

	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Hero', array(

		'general'    => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title'         => array(
							'type'    => 'textarea',
							'label'   => esc_html__( 'Headline', 'ava' ),
							'default' => esc_html__( 'Enter The Page Title', 'ava' ),
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--hero__title',
							),
						),

						'content'       => array(
							'type'    => 'textarea',
							'label'   => esc_html__( 'Paragraph', 'ava' ),
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--hero__content',
							),
						),

						'button'        => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Button', 'ava' ),
							'default' => esc_html__( 'Shop The Collection', 'ava' ),
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--hero__btn',
							),
						),

						'button_url'    => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Button Link', 'ava' ),
							'default' => 'https://themebeans.com',
							'preview' => array(
								'type' => 'none',
							),
						),

						'button_target' => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Button Target', 'ava' ),
							'default' => '_self',
							'options' => array(
								'_self'  => esc_html__( 'Same Window', 'ava' ),
								'_blank' => esc_html__( 'New Window', 'ava' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
					),
				),
			),
		),

		'background' => array(
			'title'    => esc_html__( 'Background', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'bg_layout'       => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Type', 'ava' ),
							'default' => 'none',
							'help'    => esc_html__( 'This setting is for the entire background of your hero area.', 'ava' ),
							'options' => array(
								'image' => esc_html__( 'Image', 'ava' ),
								'video' => esc_html__( 'Video', 'ava' ),
								'color' => esc_html__( 'Color', 'ava' ),
								'none'  => _x( 'None', 'Background type.', 'ava' ),
							),
							'toggle'  => array(
								'image' => array(
									'fields' => array( 'bg_image', 'parallax', 'scrim_color', 'scrim_opacity' ),
								),
								'color' => array(
									'fields' => array( 'bg_color' ),
								),
								'video' => array(
									'fields' => array( 'bg_video_url', 'bg_video_mp4', 'bg_video_webm', 'bg_video_poster', 'scrim_color', 'scrim_opacity' ),
								),
								'none'  => array(),
							),
						),

						'bg_image'        => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Background Image', 'ava' ),
							'default'     => '',
							'show_remove' => true,
						),

						'parallax'        => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Parallax', 'ava' ),
							'default' => '_self',
							'options' => array(
								'yes' => esc_html__( 'Yes', 'ava' ),
								'no'  => esc_html__( 'No', 'ava' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),

						'bg_video_url'    => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Video (URL)', 'ava' ),
							'help'    => esc_html__( 'A direct video source link. Only use this if you do not plan on using the MP4 and WebM options.', 'ava' ),
							'default' => '',
							'preview' => array(
								'type' => 'none',
							),
						),

						'bg_video_mp4'    => array(
							'type'    => 'video',
							'label'   => esc_html__( 'Video (MP4)', 'ava' ),
							'help'    => esc_html__( 'A video in the MP4 format. Most modern browsers support this format.', 'ava' ),
							'preview' => array(
								'type' => 'none',
							),
						),

						'bg_video_webm'   => array(
							'type'    => 'video',
							'label'   => esc_html__( 'Video (WebM)', 'ava' ),
							'help'    => esc_html__( 'A video in the WebM format to use as fallback. This format is required to support browsers such as FireFox and Opera.', 'ava' ),
							'preview' => array(
								'type' => 'none',
							),
						),

						'bg_video_poster' => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Poster', 'ava' ),
							'help'        => esc_html__( 'A fallback image that is viewed on mobile devices and browsers that do not support video backgrounds.', 'ava' ),
							'show_remove' => true,
							'preview'     => array(
								'type' => 'none',
							),
						),

						'bg_color'        => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Background Color', 'ava' ),
							'help'       => esc_html__( 'Customize the background color of the hero element.', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--hero',
								'property' => 'background-color',
							),
						),

						'scrim_color'     => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--hero__scrim',
								'property' => 'background-color',
							),
						),

						'scrim_opacity'   => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Overlay Opacity', 'ava' ),
							'default'     => '15',
							'maxlength'   => '3',
							'size'        => '4',
							'description' => '%',
						),
					),
				),
			),
		),

		'style'      => array(
			'title'    => esc_html__( 'Style', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'height'                => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Size', 'ava' ),
							'default' => 'standard',
							'options' => array(
								'standard'   => esc_html__( 'Standard', 'ava' ),
								'tall'       => esc_html__( 'Tall', 'ava' ),
								'fullscreen' => esc_html__( 'Fullscreen', 'ava' ),
							),
						),

						'header_color'          => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Header Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--hero__title',
								'property' => 'color',
							),
						),

						'content_color'         => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Content Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--hero__content',
								'property' => 'color',
							),
						),

						'button_bg_color'       => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Button Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--hero__btn.btn.btn--large',
								'property' => 'background-color',
							),
						),

						'button_bg_hover_color' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Button Hover Color', 'ava' ),
							'show_reset' => true,
						),

						'button_text_color'     => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Button Text Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--hero__btn.btn.btn--large',
								'property' => 'color',
							),
						),
					),
				),
			),
		),


	)
);
