<?php
/**
 * Demo poem.
 *
 * @link       https://nataliesmith.dev
 * @since      1.0.0
 * @package    Poetwp\Includes
 */

/**
 * Includes the Demo Poem class file.
 */
require_once POETWP_DIR . 'includes/class-demo-poem.php';

/**
 * Create a demo poem post with Gutenberg blocks and custom fields.
 *
 * @return void
 */
function poetwp_create_demo_poem() {
	// Check if the demo poem already exists.
	$existing_poem = new WP_Query(
		array(
			'post_type'      => Demo_Poem::$post_type,
			'post_status'    => 'any',
			'title'          => Demo_Poem::$post_title,
			'posts_per_page' => 1,
		)
	);

	if ( $existing_poem->have_posts() ) {
		return;
	}

	// Set up the poem post data.
	$poem_data = array(
		'post_title'   => Demo_Poem::$post_title,
		'post_content' => Demo_Poem::get_content(),
		'post_status'  => Demo_Poem::$post_status,
		'post_type'    => Demo_Poem::$post_type,
	);

	// Insert the poem post into the database.
	$poem_id = wp_insert_post( $poem_data );

	// Add custom fields to the poem post.
	if ( $poem_id ) {
		$custom_fields = Demo_Poem::get_custom_fields();
		foreach ( $custom_fields as $key => $value ) {
			update_post_meta( $poem_id, $key, $value );
		}
	}
}
