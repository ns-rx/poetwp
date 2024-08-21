<?php
/**
 * Post type functions.
 *
 * @link       https://nataliesmith.dev
 * @since      1.0.0
 * @package    Poetwp
 * @subpackage Poetwp/includes
 */

/**
 * Register the custom post type
 */
function poetwp_register_post_type() {
	register_post_type(
		'poem',
		array(
			'labels'       => array(
				'name'          => __( 'Poems' ),
				'singular_name' => __( 'Poem' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
			'menu_icon'    => 'dashicons-format-aside',
			'rewrite'      => array(
				'slug' => 'poems',
			),
			'show_in_rest' => true,
		)
	);
}
// Hook the registration function to the 'init' action.
add_action( 'init', 'poetwp_register_post_type' );
