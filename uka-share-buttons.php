<?php
/**
 * Plugin Name:       Uka Share Buttons
 * Plugin URI:        https://ukathemes.com/
 * Description:       Adds Share Buttons for posts and pages.
 * Version:           1.0.0
 * Author:            UkaThemes
 * Author URI:        https://ukathemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       uka-share-buttons
 * Domain Path:       /languages
 *
 * @since             1.0.0
 * @package           Uka_Share_Buttons
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'UKA_SHARE_BUTTONS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-uka-share-buttons-activator.php.
 */
function activate_uka_share_buttons() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-uka-share-buttons-activator.php';
	Uka_Share_Buttons_Activator::activate();

}
register_activation_hook( __FILE__, 'activate_uka_share_buttons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-uka-share-buttons.php';

/**
 * Create link for settings page.
 *
 * @since    1.0.0
 */
function uka_share_buttons_settings_link( $settings ) {

	$settings[] = '<a href="'. get_admin_url( null, 'options-general.php?page=share-buttons' ) .'">' . esc_html__( 'Settings', 'uka-share-buttons' ) . '</a>';
	return $settings;

}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'uka_share_buttons_settings_link' );

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_uka_share_buttons() {

	$plugin = new Uka_Share_Buttons();
	$plugin->run();

}
run_uka_share_buttons();
