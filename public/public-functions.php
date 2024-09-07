<?php
/**
 * The public-specific functionality of the plugin.
 *
 * @link       https://nataliesmith.dev
 * @since      1.0.0
 * @package    Poetwp\Public
 */

/**
 * Enqueue public styles for the plugin.
 *
 * @return void
 */
function poetwp_enqueue_public_styles() {
	wp_enqueue_style( 'poetwp-public-styles', POETWP_URL . 'public/css/poetwp-public.css', array(), '1.0.0', 'all' );
}

// Add action to enqueue public styles.
add_action( 'wp_enqueue_scripts', 'poetwp_enqueue_public_styles' );
