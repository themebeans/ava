<?php
/**
 * Ava Beaver Builder module
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

class Ava_Portfolio_Carson extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Carson', 'ava' ),
				'description'     => '',
				'category'        => AVA_MODULES_PORTFOLIO_CATEGORY,
				'partial_refresh' => true,
			)
		);
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Portfolio_Carson', array(
		'first'         => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'media_source'      => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Media Source', 'ava' ),
							'help'    => esc_html__( 'Pull images from the WordPress media library or from your portfolio post type.', 'ava' ),
							'default' => 'portfolio',
							'options' => array(
								'media'     => esc_html__( 'Media Library', 'ava' ),
								'portfolio' => esc_html__( 'Portfolio Posts', 'ava' ),
							),
							'toggle'  => array(
								'media' => array(
									'fields' => array( 'media' ),
								),
							),
						),

						'media'             => array(
							'type'    => 'multiple-photos',
							'label'   => esc_html__( 'Photos', 'ava' ),
							'default' => '',
						),

						'hover_style'       => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Hover Style', 'ava' ),
							'default' => 'project__hover--scaled',
							'options' => ava_bb_hover_styles(),
							'toggle'  => array(
								'project__hover--scaled'  => array(
									'fields' => array( 'overlay_color', 'overlay_textcolor', 'overlay_opacity' ),
								),
								'project__hover--opacity' => array(
									'fields' => array( 'overlay_color', 'overlay_textcolor', 'overlay_opacity' ),
								),
							),
						),

						'overlay_color'     => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Background', 'ava' ),
							'default'    => '000000',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.project__overlay',
								'property' => 'background-color',
							),
						),

						'overlay_textcolor' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Text', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.project__overlay .entry-title',
								'property' => 'color',
							),
						),

						'overlay_opacity'   => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Overlay Opacity', 'ava' ),
							'default'     => '80',
							'maxlength'   => '3',
							'size'        => '4',
							'description' => '%',
						),
					),
				),
			),
		),


		'loop_settings' => array(
			'title'    => esc_html__( 'Loop Settings', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'slug'   => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Filter Category', 'ava' ),
							'help'    => esc_html__( 'Filter the posts to only display from a specific category.', 'ava' ),
							'default' => '',
						),

						'number' => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Number of Posts', 'ava' ),
							'default' => '6',
						),
					),
				),
			),
		),
	)
);
