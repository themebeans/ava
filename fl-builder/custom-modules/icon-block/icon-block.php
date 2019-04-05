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
class Ava_Icon_Block extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Icon Block', 'ava' ),
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
	'Ava_Icon_Block', array(
		'first' => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'title'      => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Title', 'ava' ),
							'default' => '',
						),

						'content'    => array(
							'type'  => 'textarea',
							'label' => esc_html__( 'Description', 'ava' ),
						),

						'image'      => array(
							'type'        => 'photo',
							'label'       => esc_html__( 'Icon', 'ava' ),
							'default'     => '',
							'show_remove' => true,
						),

						'button'     => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Button Text', 'ava' ),
							'default' => '',
						),

						'button_url' => array(
							'type'    => 'link',
							'label'   => esc_html__( 'Button Link', 'ava' ),
							'default' => '',
						),

						'alignment'  => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Alignment', 'ava' ),
							'default' => 'align__center',
							'options' => array(
								'align__left'   => esc_html__( 'Left Aligned', 'ava' ),
								'align__right'  => esc_html__( 'Right Aligned', 'ava' ),
								'align__center' => esc_html__( 'Center Aligned', 'ava' ),
							),
						),

					),
				),
			),
		),
	)
);
