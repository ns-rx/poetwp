<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nataliesmith.dev
 * @since      1.0.0
 * @package    Poetwp
 * @subpackage Poetwp/admin
 */

/**
 * Add custom meta boxes to the poem post type
 */
function poetwp_add_meta_boxes() {
	add_meta_box( 'poem_details', 'Poem Details', 'poetwp_poem_details_callback', 'poem', 'normal', 'default' );
}
// Hook the meta box function to the 'add_meta_boxes' action.
add_action( 'add_meta_boxes', 'poetwp_add_meta_boxes' );

/**
 * Callback function to display the contents of the meta box
 *
 * @param WP_Post $post The current post object.
 */
function poetwp_poem_details_callback( $post ) {
	// Add a nonce field for security.
	wp_nonce_field( 'poetwp_save_poem_details', 'poetwp_poem_details_nonce' );

	// Retrieve existing meta data.
	$date  = get_post_meta( $post->ID, 'poem_date', true );
	$notes = get_post_meta( $post->ID, 'poem_notes', true );

	// Output the form fields.
	echo '<label for="poem_date">Date: </label>';
	// echo '<input type="text" id="poem_date" name="poem_date" value="' . esc_attr( $date ) . '" size="25" /><br>';
	echo '<input type="text" id="poem_date" name="poem_date" class="poetwp-datepicker" value="' . esc_attr( $date ) . '" size="25" /><br>';
	echo '<label for="poem_notes">Notes: </label>';
	echo '<textarea id="poem_notes" name="poem_notes" rows="3" cols="50">' . esc_textarea( $notes ) . '</textarea>';
}

/**
 * Save the meta box data
 *
 * @param int $post_id The ID of the post being saved.
 */
function poetwp_save_poem_details( $post_id ) {
	// Check if our nonce is set and verify it.
	if ( ! isset( $_POST['poetwp_poem_details_nonce'] ) || ! wp_verify_nonce( $_POST['poetwp_poem_details_nonce'], 'poetwp_save_poem_details' ) ) {
		return;
	}

	// Check if this is an autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Sanitize and save the meta data.
	if ( isset( $_POST['poem_date'] ) ) {
		update_post_meta( $post_id, 'poem_date', sanitize_text_field( $_POST['poem_date'] ) );
	}
	if ( isset( $_POST['poem_notes'] ) ) {
		update_post_meta( $post_id, 'poem_notes', sanitize_textarea_field( $_POST['poem_notes'] ) );
	}
}
// Hook the save function to the 'save_post_poem' action.
add_action( 'save_post_poem', 'poetwp_save_poem_details' );

/**
 * Enqueue scripts and styles for the datepicker.
 *
 * @return void
 */
function poetwp_enqueue_datepicker() {
	// Enqueue jQuery UI Datepicker script and styles.
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_style( 'jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1' );
}

// Add action to enqueue datepicker scripts and styles.
add_action( 'admin_enqueue_scripts', 'poetwp_enqueue_datepicker' );

/**
 * Initialize the datepicker on the poem date field.
 *
 * @return void
 */
function poetwp_initialize_datepicker() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#poem_date').datepicker({
			dateFormat: 'd MM yy',
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
	<?php
}

// Add action to initialize datepicker in the admin footer.
add_action( 'admin_footer', 'poetwp_initialize_datepicker' );
