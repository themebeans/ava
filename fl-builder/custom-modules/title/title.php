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
class Ava_Title extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Title', 'ava' ),
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
	'Ava_Title', array(
		'general' => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title' => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Title', 'ava' ),
							'default' => '',
							'preview' => array(
								'type'     => 'text',
								'selector' => '.bb--video_block__title',
							),
						),

						'color' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--video_block__title',
								'property' => 'color',
							),
						),
					),
				),
			),
		),
	)
);
