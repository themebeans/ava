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
class Ava_Content_Blocks extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Content Blocks', 'ava' ),
				'description'     => '',
				'category'        => AVA_MODULES_CATEGORY,
				'partial_refresh' => true,
			)
		);

	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Content_Blocks', array(

		'content_1' => array(
			'title'    => esc_html__( 'Block #1', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title_1'       => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Title', 'ava' ),
							'default' => '',
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--content-blocks__1 .bb--content-blocks__title',
							),
						),

						'position_1'    => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Title Position', 'ava' ),
							'default' => 'bottom_left',
							'options' => array(
								'top_left'     => esc_html__( 'Top Left', 'ava' ),
								'top_right'    => esc_html__( 'Top Right', 'ava' ),
								'bottom_left'  => esc_html__( 'Bottom Left', 'ava' ),
								'bottom_right' => esc_html__( 'Bottom Right', 'ava' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),

						'url_1'         => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Link', 'ava' ),
							'default' => '',
						),

						'image_1'       => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Background Image', 'ava' ),
							'default'     => '',
							'show_remove' => true,
						),

						'title_color_1' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Title Color', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--content-blocks__1 .bb--content-blocks__title',
								'property' => 'color',
							),
						),

					),
				),
			),
		),

		'content_2' => array(
			'title'    => esc_html__( 'Block #2', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title_2'       => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Title', 'ava' ),
							'default' => '',
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--content-blocks__2 .bb--content-blocks__title',
							),
						),

						'position_2'    => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Title Position', 'ava' ),
							'default' => 'top_left',
							'options' => array(
								'top_left'     => esc_html__( 'Top Left', 'ava' ),
								'top_right'    => esc_html__( 'Top Right', 'ava' ),
								'bottom_left'  => esc_html__( 'Bottom Left', 'ava' ),
								'bottom_right' => esc_html__( 'Bottom Right', 'ava' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),

						'url_2'         => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Link', 'ava' ),
							'default' => '',
						),

						'image_2'       => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Background Image', 'ava' ),
							'default'     => '',
							'show_remove' => true,
						),

						'title_color_2' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Title Color', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--content-blocks__2 .bb--content-blocks__title',
								'property' => 'color',
							),
						),

					),
				),
			),
		),

		'content_3' => array(
			'title'    => esc_html__( 'Block #3', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title_3'       => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Title', 'ava' ),
							'default' => '',
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--content-blocks__3 .bb--content-blocks__title',
							),
						),

						'position_3'    => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Title Position', 'ava' ),
							'default' => 'bottom_left',
							'options' => array(
								'top_left'     => esc_html__( 'Top Left', 'ava' ),
								'top_right'    => esc_html__( 'Top Right', 'ava' ),
								'bottom_left'  => esc_html__( 'Bottom Left', 'ava' ),
								'bottom_right' => esc_html__( 'Bottom Right', 'ava' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),

						'url_3'         => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Link', 'ava' ),
							'default' => '',
						),

						'image_3'       => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Background Image', 'ava' ),
							'default'     => '',
							'show_remove' => true,
						),

						'title_color_3' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Title Color', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--content-blocks__3 .bb--content-blocks__title',
								'property' => 'color',
							),
						),

					),
				),
			),
		),

		'content_4' => array(
			'title'    => esc_html__( 'Block #4', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title_4'       => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Title', 'ava' ),
							'default' => '',
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--content-blocks__4 .bb--content-blocks__title',
							),
						),

						'position_4'    => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Title Position', 'ava' ),
							'default' => 'top_left',
							'options' => array(
								'top_left'     => esc_html__( 'Top Left', 'ava' ),
								'top_right'    => esc_html__( 'Top Right', 'ava' ),
								'bottom_left'  => esc_html__( 'Bottom Left', 'ava' ),
								'bottom_right' => esc_html__( 'Bottom Right', 'ava' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),

						'url_4'         => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Link', 'ava' ),
							'default' => '',
						),

						'image_4'       => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Background Image', 'ava' ),
							'default'     => '',
							'show_remove' => true,
						),

						'title_color_4' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Title Color', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--content-blocks__4 .bb--content-blocks__title',
								'property' => 'color',
							),
						),

					),
				),
			),
		),

	)
);
