<?php
/**
 * Beaver Builder Global Settings
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Filter the default Beaver Builder global settings, and add our own.
 *
 * @param array $form The form.
 * @param array $id The id of the form.
 */
function ava_bb_register_global_settings_form( $form, $id ) {

	if ( 'global' === $id ) {
		$form = array(
			'title' => esc_html__( 'Global Settings', 'ava' ),
			'tabs'  => array(
				'general' => array(
					'title'       => esc_html__( 'General', 'ava' ),
					'description' => esc_html__( '<strong>Note</strong>: These settings apply to all posts and pages.', 'ava' ),
					'sections'    => array(
						'page_heading' => array(
							'title'  => esc_html__( 'Default Page Heading', 'ava' ),
							'fields' => array(
								'show_default_heading'     => array(
									'type'    => 'select',
									'label'   => _x( 'Show', 'General settings form field label. Intended meaning: "Show page heading?"', 'ava' ),
									'default' => '0',
									'options' => array(
										'0' => esc_html__( 'No', 'ava' ),
										'1' => esc_html__( 'Yes', 'ava' ),
									),
									'toggle'  => array(
										'0' => array(
											'fields' => array(
												'default_heading_selector',
											),
										),
									),
									'help'    => esc_html__( 'Choosing no will hide the default theme heading for the "Page" post type. You will also b e required to enter some basic CSS for this to work if you choose no.', 'ava' ),
								),
								'default_heading_selector' => array(
									'type'    => 'text',
									'label'   => esc_html__( 'CSS Selector', 'ava' ),
									'default' => '.fl-post-header',
									'help'    => esc_html__( 'Enter a CSS selector for the default page heading to hide it.', 'ava' ),
								),
							),
						),
						'rows'         => array(
							'title'  => __( 'Rows', 'fl-builder' ),
							'fields' => array(
								'row_margins'       => array(
									'type'       => 'unit',
									'label'      => __( 'Margins', 'fl-builder' ),
									'default'    => '0',
									'sanitize'   => 'absint',
									'responsive' => array(
										'placeholder' => array(
											'default'    => '0',
											'medium'     => '',
											'responsive' => '',
										),
									),
									'units'      => array(
										'px',
										'%',
									),
								),
								'row_padding'       => array(
									'type'       => 'unit',
									'label'      => __( 'Padding', 'fl-builder' ),
									'default'    => '20',
									'sanitize'   => 'absint',
									'responsive' => array(
										'placeholder' => array(
											'default'    => '0',
											'medium'     => '',
											'responsive' => '',
										),
									),
									'units'      => array(
										'px',
										'em',
										'%',
									),
								),
								'row_width'         => array(
									'type'      => 'unit',
									'label'     => __( 'Max Width', 'fl-builder' ),
									'default'   => '1100',
									'maxlength' => '4',
									'size'      => '5',
									'sanitize'  => 'absint',
									'help'      => __( 'All rows will default to this width. You can override this and make a row full width in the settings for each row.', 'fl-builder' ),
									'units'     => array(
										'px',
										'vw',
										'%',
									),
								),
								'row_width_default' => array(
									'type'    => 'select',
									'label'   => __( 'Default Row Width', 'fl-builder' ),
									'default' => 'full',
									'options' => array(
										'fixed' => __( 'Fixed', 'fl-builder' ),
										'full'  => __( 'Full Width', 'fl-builder' ),
									),
									'toggle'  => array(
										'full' => array(
											'fields' => array( 'row_content_width_default' ),
										),
									),
								),
								'row_content_width_default' => array(
									'type'    => 'select',
									'label'   => __( 'Default Row Content Width', 'fl-builder' ),
									'default' => 'full',
									'options' => array(
										'fixed' => __( 'Fixed', 'fl-builder' ),
										'full'  => __( 'Full Width', 'fl-builder' ),
									),
								),
							),
						),
						'columns'      => array(
							'title'  => __( 'Columns', 'fl-builder' ),
							'fields' => array(
								'column_margins' => array(
									'type'       => 'unit',
									'label'      => __( 'Margins', 'fl-builder' ),
									'default'    => '',
									'sanitize'   => 'absint',
									'responsive' => array(
										'placeholder' => array(
											'default'    => '0',
											'medium'     => '',
											'responsive' => '',
										),
									),
									'units'      => array(
										'px',
										'%',
									),
								),
								'column_padding' => array(
									'type'       => 'unit',
									'label'      => __( 'Padding', 'fl-builder' ),
									'default'    => '',
									'sanitize'   => 'absint',
									'responsive' => array(
										'placeholder' => array(
											'default'    => '0',
											'medium'     => '',
											'responsive' => '',
										),
									),
									'units'      => array(
										'px',
										'em',
										'%',
									),
								),
							),
						),
						'modules'      => array(
							'title'  => __( 'Modules', 'fl-builder' ),
							'fields' => array(
								'module_margins' => array(
									'type'       => 'unit',
									'label'      => __( 'Margins', 'ava' ),
									'default'    => '20',
									'sanitize'   => 'absint',
									'responsive' => array(
										'placeholder' => array(
											'default'    => '0',
											'medium'     => '',
											'responsive' => '',
										),
									),
									'units'      => array(
										'px',
										'%',
									),
								),
							),
						),
						'responsive'   => array(
							'title'  => esc_html__( 'Responsive Layout', 'ava' ),
							'fields' => array(
								'responsive_enabled'    => array(
									'type'    => 'select',
									'label'   => _x( 'Enabled', 'General settings form field label. Intended meaning: "Responsive layout enabled?"', 'ava' ),
									'default' => '1',
									'options' => array(
										'0' => esc_html__( 'No', 'ava' ),
										'1' => esc_html__( 'Yes', 'ava' ),
									),
									'toggle'  => array(
										'1' => array(
											'fields' => array(
												'auto_spacing',
												'responsive_breakpoint',
												'medium_breakpoint',
											),
										),
									),
								),
								'auto_spacing'          => array(
									'type'    => 'select',
									'label'   => _x( 'Enable Auto Spacing', 'General settings form field label. Intended meaning: "Enable auto spacing for responsive layouts?"', 'ava' ),
									'default' => '1',
									'options' => array(
										'0' => esc_html__( 'No', 'ava' ),
										'1' => esc_html__( 'Yes', 'ava' ),
									),
									'help'    => esc_html__( 'When auto spacing is enabled, the builder will automatically adjust the margins and padding i n your layout once the small device breakpoint is reached. Most users will want to leave this enabled.', 'ava' ),
								),
								'medium_breakpoint'     => array(
									'type'        => 'text',
									'label'       => __( 'Medium Device Breakpoint', 'fl-builder' ),
									'default'     => '992',
									'maxlength'   => '4',
									'size'        => '5',
									'description' => 'px',
									'sanitize'    => 'absint',
									'help'        => __( 'The browser width at which the layout will adjust for medium devices such as tablets.', 'fl-builder' ),
								),
								'responsive_breakpoint' => array(
									'type'        => 'text',
									'label'       => __( 'Small Device Breakpoint', 'fl-builder' ),
									'default'     => '768',
									'maxlength'   => '4',
									'size'        => '5',
									'description' => 'px',
									'sanitize'    => 'absint',
									'help'        => __( 'The browser width at which the layout will adjust for small devices such as phones.', 'fl-builder' ),
								),
							),
						),
					),
				),
				'css'     => array(
					'title'    => __( 'CSS', 'fl-builder' ),
					'sections' => array(
						'css' => array(
							'title'  => '',
							'fields' => array(
								'css' => array(
									'type'    => 'code',
									'label'   => '',
									'editor'  => 'css',
									'rows'    => '19',
									'preview' => array(
										'type' => 'none',
									),
								),
							),
						),
					),
				),
				'js'      => array(
					'title'    => __( 'JavaScript', 'fl-builder' ),
					'sections' => array(
						'js' => array(
							'title'  => '',
							'fields' => array(
								'js' => array(
									'type'    => 'code',
									'label'   => '',
									'editor'  => 'javascript',
									'rows'    => '19',
									'preview' => array(
										'type' => 'none',
									),
								),
							),
						),
					),
				),
			),
		);
	}

	return $form;
}
// add_filter( 'fl_builder_register_settings_form', 'ava_bb_register_global_settings_form', 10, 2 );
