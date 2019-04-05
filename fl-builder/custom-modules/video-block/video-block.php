<?php
/**
 * Ava Beaver Builder module
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Module class.
 */
class Ava_Video_Block extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Video Block', 'ava' ),
				'description'     => '',
				'category'        => AVA_MODULES_CATEGORY,
				'partial_refresh' => true,
			)
		);

	}

	/**
	 * @method enqueue_scripts
	 */
	public function enqueue_scripts() {

		if ( $this->settings && ! empty( $this->settings->video ) ) {
			$this->add_js( 'lity', get_theme_file_uri( '/fl-builder/assets/js/lity.js' ), array(), '', true );
		}

	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Video_Block', array(
		'general' => array(
			'title'    => esc_html__( 'Video Block', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title' => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Headline', 'ava' ),
							'default' => esc_html__( 'Video Content Block', 'ava' ),
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--video_block__title',
							),
						),

						'cta'   => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Call to Action Text', 'ava' ),
							'default' => esc_html__( 'Watch the Film', 'ava' ),
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--video_block__link',
							),
						),

						'video' => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Video Embed URL', 'ava' ),
							'default' => 'https://vimeo.com/124057504',
						),

						'image' => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Background Image', 'ava' ),
							'show_remove' => true,
						),
					),
				),
			),
		),

		'style'   => array(
			'title'    => esc_html__( 'Style', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'height'        => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Size', 'ava' ),
							'default' => 'standard',
							'options' => array(
								'standard'   => esc_html__( 'Standard', 'ava' ),
								'fullscreen' => esc_html__( 'Fullscreen', 'ava' ),
							),
						),

						'header_color'  => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Header Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--video_block__title',
								'property' => 'color',
							),
						),

						'cta_color'     => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Call to Action Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--video_block__link',
								'property' => 'color',
							),
						),

						'scrim_color'   => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--video_block__scrim',
								'property' => 'background-color',
							),
						),

						'scrim_opacity' => array(
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

	)
);
