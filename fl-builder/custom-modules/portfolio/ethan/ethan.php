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
class Ava_Portfolio_Ethan extends FLBuilderModule {
	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {

		parent::__construct(
			array(
				'name'            => esc_html__( 'Ethan', 'ava' ),
				'description'     => '',
				'category'        => AVA_MODULES_PORTFOLIO_CATEGORY,
				'partial_refresh' => true,
			)
		);

	}

	/**
	 * Enqueue module scripts.
	 */
	public function enqueue_scripts() {

		if ( 'yes' === $this->settings && $this->settings->load_animation ) {
			$this->add_js( 'scrollreveal', get_theme_file_uri( '/fl-builder/assets/js/scrollreveal.js' ), array( 'jquery' ), '@@pkg.version', true );
		}

	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Ava_Portfolio_Ethan', array(
		'first'         => array(
			'title'    => esc_html__( 'General', 'ava' ),
			'sections' => array(
				'general' => array(
					'fields' => array(

						'media_source'      => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Media Source', 'ava' ),
							'help'    => esc_html__( 'Pull images from the WordPress media library or from your portfolio post type.', 'ava' ),
							'default' => 'portfolio',
							'options' => array(
								'media'     => esc_html__( 'Media Library', 'ava' ),
								'portfolio' => esc_html__( 'Portfolio Posts', 'ava' ),
							),
							'toggle'  => array(
								'media' => array(
									'fields' => array( 'media' ),
								),
							),
						),

						'media'             => array(
							'type'    => 'multiple-photos',
							'label'   => esc_html__( 'Photos', 'ava' ),
							'default' => '',
						),

						'alignment'         => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Alignment', 'ava' ),
							'default' => 'align__center',
							'options' => array(
								'align__left'   => esc_html__( 'Left', 'ava' ),
								'align__center' => esc_html__( 'Center', 'ava' ),
								'align__right'  => esc_html__( 'Right', 'ava' ),
							),
						),

						'hover_style'       => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Hover Style', 'ava' ),
							'default' => 'project__hover--pressed',
							'options' => ava_bb_hover_styles(),
							'toggle'  => array(
								'project__hover--scaled'  => array(
									'fields' => array( 'overlay_color', 'overlay_textcolor', 'overlay_opacity' ),
								),
								'project__hover--opacity' => array(
									'fields' => array( 'overlay_color', 'overlay_textcolor', 'overlay_opacity' ),
								),
							),
						),

						'overlay_color'     => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Background', 'ava' ),
							'default'    => '000000',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.project__overlay',
								'property' => 'background-color',
							),
						),

						'overlay_textcolor' => array(
							'type'       => 'color',
							'label'      => esc_html__( 'Overlay Text', 'ava' ),
							'default'    => 'ffffff',
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.project__overlay .entry-title',
								'property' => 'color',
							),
						),

						'overlay_opacity'   => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Overlay Opacity', 'ava' ),
							'default'     => '80',
							'maxlength'   => '3',
							'size'        => '4',
							'description' => '%',
						),

						'load_animation'    => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Loading Animation', 'ava' ),
							'default' => 'no',
							'options' => array(
								'yes' => esc_html__( 'Yes', 'ava' ),
								'no'  => esc_html__( 'No', 'ava' ),
							),
						),

						'lightbox'          => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Lightbox', 'ava' ),
							'default' => 'on',
							'options' => array(
								'on'  => esc_html__( 'Yes', 'ava' ),
								'off' => esc_html__( 'No', 'ava' ),
							),
							'toggle'  => array(
								'on' => array(
									'fields' => array( 'lightbox_style' ),
								),
							),
						),

						'lightbox_style'    => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Lightbox Style', 'ava' ),
							'default' => 'pswp--light',
							'options' => array(
								'pswp--light' => esc_html__( 'Light', 'ava' ),
								'pswp--dark'  => esc_html__( 'Dark', 'ava' ),
							),
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
							'help'    => esc_html__( 'If you are using the portfolio post type as your media source, filter the posts to only display from a specific category.', 'ava' ),
							'default' => '',
						),

						'number' => array(
							'type'    => 'text',
							'label'   => esc_html__( 'Number of Posts', 'ava' ),
							'help'    => esc_html__( 'If you are using the portfolio post type as your media source, enter the number of posts to display.', 'ava' ),
							'default' => '6',
						),
					),
				),
			),
		),

	)
);
