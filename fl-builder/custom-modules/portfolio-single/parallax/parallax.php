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
class Ava_Parallax extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Parallax Gallery', 'ava' ),
				'description'     => '',
				'category'        => AVA_MODULES_PORTFOLIO_SINGLE_CATEGORY,
				'partial_refresh' => true,
			)
		);

		$this->add_js( 'parallax', get_theme_file_uri( '/fl-builder/assets/js/parallax.js' ), array(), '', true );

	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Parallax', array(
		'first' => array(
			'title'    => esc_html__( 'General', 'ava' ),
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

