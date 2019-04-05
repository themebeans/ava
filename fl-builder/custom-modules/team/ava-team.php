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
class Ava_Team extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Team Members', 'ava' ),
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
	'Ava_Team', array(
		'general' => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'grid_size'     => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Grid Size', 'ava' ),
							'default' => 'small',
							'options' => array(
								'small'  => esc_html__( 'Small', 'ava' ),
								'medium' => esc_html__( 'Medium', 'ava' ),
								'large'  => esc_html__( 'Large', 'ava' ),
							),
						),

						'overlay_color' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--team__overlay',
								'property' => 'background-color',
							),
						),

						'color'         => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Text Color', 'ava' ),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bb--team__overlay .entry-title',
								'property' => 'color',
							),
						),
					),
				),
			),
		),
	)
);
