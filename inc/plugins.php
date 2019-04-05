<?php
/**
 * TGMPA Required Plugins.
 *
 * Register the required plugins for this theme.
 *
 * @package   Ava
 * @link      https://themebeans.com/themes/ava
 */

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function ava_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$args = array(

		array(
			'name'     => esc_html__( 'WooCommerce', 'ava' ),
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Portfolio', 'ava' ),
			'slug'     => 'portfolio-post-type',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Team', 'ava' ),
			'slug'     => 'bean-team',
			'source'   => get_parent_theme_file_path( '/inc/plugins/bean-team.zip' ),
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Contact Form 7', 'ava' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'MailChimp', 'ava' ),
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Multiple Post Thumbnails', 'ava' ),
			'slug'     => 'multiple-post-thumbnails',
			'required' => false,
		),
	);

	$plugins = apply_filters( 'themebeans_recommended_plugins', $args );

	/*
	 * Let's check if Beaver Builder Pro is enabled. If so, we don't need
	 * to show the plugin install notice for Beaver Builder lite.
	 */
	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( ! is_plugin_active( 'bb-plugin/fl-builder.php' ) ) {
		$beaver_builder_pro = array(
			array(
				'name'     => esc_html__( 'Beaver Builder', 'ava' ),
				'slug'     => 'beaver-builder-lite-version',
				'required' => false,
			),
		);
	} else {
		$beaver_builder_pro = array();
	}

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'ava',                // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                     // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                 // Show admin notices or not.
		'dismissable'  => true,                 // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                     // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( array_merge( $plugins, $beaver_builder_pro ), $config );
}
add_action( 'tgmpa_register', 'ava_register_required_plugins' );
