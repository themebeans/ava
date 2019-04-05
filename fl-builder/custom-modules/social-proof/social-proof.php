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
class Ava_Social_Proof extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Social Proof', 'ava' ),
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
	'Ava_Social_Proof', array(
		'first' => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'gallery_items' => array(
							'type'    => 'multiple-photos',
							'label'   => esc_html__( 'Upload Gallery', 'ava' ),
							'help'    => esc_html__( 'Recommended image size is 160x120', 'ava' ),
							'default' => '',
						),
					),
				),
			),
		),
	)
);
