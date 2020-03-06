<?php
/**
 * Fired during plugin activation.
 *
 * @since      1.0.0
 *
 * @package    Uka_Share_Buttons
 * @subpackage Uka_Share_Buttons/includes
 */

class Uka_Share_Buttons_Activator {

	/**
	 * Compare WordPress version and set up the default option values.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		// Compare WordPress version
		global $wp_version;
		
		if ( version_compare( $wp_version, '4.7', '<' ) ) {
			wp_die( sprintf( esc_html__( 'This plugin requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'uka-share-buttons' ), $wp_version ) );
		}

		// Set default plugin parameters
		$default_options = array(
			'services-settings' => array(
				'facebook'  => 'on',
				'twitter'   => 'on',
				'reddit'    => 'off',
				'linkedin'  => 'off',
				'pinterest' => 'off',
				'telegram'  => 'on',
				'vk'        => 'off',
			),
			'share-text' => esc_html__( 'Share:', 'uka-share-buttons' ),
		);

		add_option( 'uka_share_buttons_options', $default_options );

	}

}
