<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nataliesmith.dev
 * @since             1.0.0
 * @package           Poetwp
 *
 * @wordpress-plugin
 * Plugin Name:       PoetWP
 * Plugin URI:        https://nataliesmith.dev
 * Description:       Easily add poems to your WordPress site.
 * Version:           1.0.0
 * Author:            Natalie Smith
 * Author URI:        https://nataliesmith.dev/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       poetwp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the file that defines the custom post type functions.
require_once plugin_dir_path( __FILE__ ) . 'includes/post-type-functions.php';

// Include the file that creates demo poem.
require_once plugin_dir_path( __FILE__ ) . 'includes/demo-poem.php';

// Include the file that defines the admin functions.
require_once plugin_dir_path( __FILE__ ) . 'admin/admin-functions.php';

// Include the file that defines the public functions.
require_once plugin_dir_path( __FILE__ ) . 'public/public-functions.php';

// Register activation hook.
register_activation_hook( __FILE__, 'poetwp_activate' );

/**
 * Activation function for the plugin
 */
function poetwp_activate() {

	// Register the custom post type.
	poetwp_register_post_type();

	// Flush rewrite rules to ensure custom post type is properly registered.
	flush_rewrite_rules();

	// Create demo poem.
	poetwp_create_demo_poem();
}
