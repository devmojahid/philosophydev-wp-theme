<?php

require_once get_theme_file_path('/liv/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'philosophydev_register_required_plugins' );

function philosophydev_register_required_plugins() {
	
	$plugins = array(
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => false,
		),
		array(
			'name'      => 'WP Google Maps',
			'slug'      => 'wp-google-maps',
			'required'  => false,
		),	
		array(
			'name'      => 'Contact Form',
			'slug'      => 'contact-form-7',
			'required'  => false,
		)

	);


	$config = array(
		'id'           => 'philosophydev',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	
	);

	tgmpa( $plugins, $config );
}
