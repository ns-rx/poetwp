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
 * Description:       WordPress plugin to display poems on your website.
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

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'POETWP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-poetwp-activator.php
 */
function activate_poetwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-poetwp-activator.php';
	Poetwp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-poetwp-deactivator.php
 */
function deactivate_poetwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-poetwp-deactivator.php';
	Poetwp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_poetwp' );
register_deactivation_hook( __FILE__, 'deactivate_poetwp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-poetwp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_poetwp() {

	$plugin = new Poetwp();
	$plugin->run();

}
run_poetwp();
