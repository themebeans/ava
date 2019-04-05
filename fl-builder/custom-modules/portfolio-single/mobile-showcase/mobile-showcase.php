<?php
/**
 * Ava Beaver Builder module
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */
class Ava_Mobile_Showcase extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'        => esc_html__( 'Mobile Showcase', 'ava' ),
				'description' => '',
				'category'    => AVA_MODULES_PORTFOLIO_SINGLE_CATEGORY,
			)
		);
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Mobile_Showcase', array(
		'first' => array(
			'title'    => esc_html__( 'Gallery Images', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'gallery_items' => array(
							'type'    => 'multiple-photos',
							'label'   => esc_html__( 'Upload Gallery', 'ava' ),
							'default' => '',
						),
					),
				),
			),
		),
	)
);
