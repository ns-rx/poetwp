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
 * Deletes demo from the database when the plugin is uninstalled.
 */
$args = array(
	'post_type'      => 'poem',
	'post_status'    => 'any',
	'title'          => 'Demo Poem: Windswept',
	'posts_per_page' => 1,
);

$demo_poem = get_posts( $args );

if ( ! empty( $demo_poem ) ) {
	wp_delete_post( $demo_poem[0]->ID, true );
}
