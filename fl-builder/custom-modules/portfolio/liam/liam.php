<?php
/**
 * Ava Beaver Builder module
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */
class Ava_Portfolio_Liam extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Liam', 'ava' ),
				'description'     => '',
				'category'        => AVA_MODULES_PORTFOLIO_CATEGORY,
				'partial_refresh' => false,
			)
		);

	}

	/**
	 * @method enqueue_scripts
	 */
	public function enqueue_scripts() {
		$this->add_js( 'parallax', get_theme_file_uri( '/fl-builder/assets/js/parallax.js' ), array( 'jquery' ), '', true );
		$this->add_js( 'scrollreveal', get_theme_file_uri( '/fl-builder/assets/js/scrollreveal.js' ), array( 'jquery' ), '@@pkg.version', true );
	}

}



/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Portfolio_Liam', array(
		'first'         => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(
						'display_title'   => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Display Title', 'ava' ),
							'default' => 'off',
							'options' => array(
								'on'  => esc_html__( 'Yes', 'ava' ),
								'off' => esc_html__( 'No', 'ava' ),
							),
						),
						'alignment'       => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Title Alignment', 'ava' ),
							'default' => 'align__center',
							'options' => array(
								'align__left'   => esc_html__( 'Left', 'ava' ),
								'align__center' => esc_html__( 'Center', 'ava' ),
								'align__right'  => esc_html__( 'Right', 'ava' ),
							),
						),
						'overlay_color'   => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Background', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.project__background',
								'property' => 'background-color',
							),
						),
						'textcolor'       => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Text Color', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.portfolio--liam .project__overlay h2',
										'property' => 'color',
									),
								),
							),
						),
						'overlay_opacity' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Overlay Opacity', 'ava' ),
							'default'     => '0.0',
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
