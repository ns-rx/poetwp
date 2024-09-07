<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://nataliesmith.dev
 * @since      1.0.0
 * @package    Poetwp
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Deletes all poems from the database when the plugin is uninstalled.
 */
$args = array(
	'post_type'      => 'poem',
	'posts_per_page' => -1,
	'post_status'    => 'any',
);

$poems = get_posts( $args );

foreach ( $poems as $poem ) {
	wp_delete_post( $poem->ID, true );
}
