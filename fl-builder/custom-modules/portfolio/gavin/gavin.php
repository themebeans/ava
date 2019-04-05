<?php
/**
 * Beaver Builder module
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Module class.
 */
class Ava_Portfolio_Gavin extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Gavin', 'ava' ),
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
	'Ava_Portfolio_Gavin', array(
		'first'         => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'alignment'        => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Alignment', 'ava' ),
							'default' => 'align__center',
							'options' => array(
								'align__left'   => esc_html__( 'Left', 'ava' ),
								'align__center' => esc_html__( 'Center', 'ava' ),
								'align__right'  => esc_html__( 'Right', 'ava' ),
							),
						),

						'textcolor'        => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Text Color', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.project__navigation_link',
										'property' => 'color',
									),
									array(
										'selector' => '.project__navigation_link:before',
										'property' => 'background-color',
									),
								),
							),
						),

						'textcolor_active' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Active Color', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.project__navigation_link:hover',
										'property' => 'color',
									),
									array(
										'selector' => '.project__navigation_link.js--active',
										'property' => 'color',
									),
									array(
										'selector' => '.project__navigation_link.js--active:hover',
										'property' => 'color',
									),
									array(
										'selector' => '.project__navigation_link:before',
										'property' => 'background-color',
									),
								),
							),
						),

						'scrim_color'      => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Color', 'ava' ),
							'default'    => '000000',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.portfolio--gavin__scrim',
								'property' => 'background-color',
							),
						),

						'scrim_opacity'    => array(
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
