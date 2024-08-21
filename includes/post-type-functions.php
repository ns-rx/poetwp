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

/**
 * Hide the default title for poem post type.
 *
 * @param string $title The post title.
 * @param int    $id    The post ID.
 * @return string       Empty string for poems, original title for other post types.
 */
function poetwp_hide_default_title( $title, $id = null ) {
	// Only hide title for 'poem' post type on single post pages and in the main loop.
	if ( is_singular( 'poem' ) && in_the_loop() && get_post_type( $id ) === 'poem' ) {
		return '';
	}
	return $title;
}

// Add filter to hide the default title for poems.
add_filter( 'the_title', 'poetwp_hide_default_title', 10, 2 );

/**
 * Inject custom fields and title before the poem content.
 *
 * @param string $content The post content.
 * @return string         The modified content with custom fields and title prepended.
 */
function poetwp_inject_custom_fields_and_title( $content ) {
	// Only modify content for the 'poem' post type on single post pages.
	if ( ! is_singular( 'poem' ) ) {
		return $content;
	}

	$id    = get_the_ID();
	$title = get_post_field( 'post_title', $id );
	$date  = get_post_meta( $id, 'poem_date', true );
	$notes = get_post_meta( $id, 'poem_notes', true );

	// Prepare the custom fields and title HTML.
	$custom_content  = '<div class="poem-custom-fields">';
	$custom_content .= '<p><strong>' . esc_html__( 'Date:', 'poetwp' ) . '</strong> ' . esc_html( $date ) . '</p>';
	$custom_content .= '<div>' . wp_kses_post( $notes ) . '</div>';
	$custom_content .= '</div>';
	$custom_content .= '<h1 class="entry-title">' . esc_html( $title ) . '</h1>';

	// Prepend the custom fields and title to the content.
	return $custom_content . $content;
}

// Add filter to inject custom fields and title before the content.
add_filter( 'the_content', 'poetwp_inject_custom_fields_and_title' );
