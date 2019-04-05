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
class Ava_WC_Products extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'WooCommerce Products', 'ava' ),
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
	'Ava_WC_Products', array(
		'general' => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'title'  => esc_html__( 'Section Title', 'ava' ),
					'fields' => array(
						'slug'        => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Product Category Slug', 'ava' ),
							'default' => '',
						),

						'grid_type'   => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Grid Type', 'ava' ),
							'default' => 'gallery',
							'options' => array(
								'gallery' => esc_html__( 'Gallery', 'ava' ),
								'columns' => esc_html__( 'Columns', 'ava' ),
							),
							'toggle'  => array(
								'gallery' => array(
									'fields' => array( 'number' ),
								),
								'columns' => array(
									'fields' => array( 'number_cols' ),
								),
							),
						),

						'number'      => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Number of Posts', 'ava' ),
							'default' => '6',
							'options' => array(
								'3'  => esc_html__( '3', 'ava' ),
								'6'  => esc_html__( '6', 'ava' ),
								'10' => esc_html__( '10', 'ava' ),
							),
						),

						'number_cols' => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Number of Posts', 'ava' ),
							'default' => '12',
							'options' => array(
								'6'  => esc_html__( '6', 'ava' ),
								'9'  => esc_html__( '9', 'ava' ),
								'12' => esc_html__( '12', 'ava' ),
							),
						),
					),
				),
			),
		),
	)
);
