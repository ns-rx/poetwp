<?php
/**
 * Demo poem.
 *
 * @link       https://nataliesmith.dev
 * @since      1.0.0
 * @package    Poetwp\Includes
 */

/**
 * Create a demo poem post with Gutenberg blocks and custom fields.
 *
 * @return void
 */
function poetwp_create_demo_poem() {
	// Check if the demo poem already exists.
	$existing_poem = new WP_Query(
		array(
			'post_type'      => 'poem',
			'post_status'    => 'any',
			'title'          => 'Demo Poem',
			'posts_per_page' => 1,
		)
	);

	if ( $existing_poem->have_posts() ) {
		return;
	}
	// Prepare the poem content with Gutenberg blocks.
	$poem_content = '
	<!-- wp:verse {"className":"is-style-no-padding","backgroundColor":"base-3"} -->
	<pre class="wp-block-verse is-style-no-padding has-base-3-background-color has-background">          The wind sweeps  <br>across the open plain,  <br>        bending the grass  <br>                      in a silent refrain,  <br>               where every blade  <br>          dances to a song  <br>                    older than time.</pre>
	<!-- /wp:verse -->

	<!-- wp:paragraph -->
	<p>Underneath the sky’s vast dome,  <br>where clouds gather and disperse,  <br>I find a home in the rhythm of the earth,  <br>in the heartbeat of the land.</p>
	<!-- /wp:paragraph -->

	<!-- wp:verse {"className":"is-style-no-padding","backgroundColor":"base-3"} -->
	<pre class="wp-block-verse is-style-no-padding has-base-3-background-color has-background">          Trees stand tall,  <br>                    their roots deep,  <br>          whispering secrets  <br>               they vow to keep.  <br>     Leaves flutter  <br>              in a gentle sigh,  <br>     as the day bows  <br>          to the evening sky.</pre>
	<!-- /wp:verse -->

	<!-- wp:paragraph -->
	<p>In the hush of twilight, the world grows still,  <br>cradled by the hills and the promise of night.  <br>Stars awaken, one by one,  <br>stitching the sky with threads of light.</p>
	<!-- /wp:paragraph -->

	<!-- wp:verse {"className":"is-style-no-padding","backgroundColor":"base-3"} -->
	<pre class="wp-block-verse is-style-no-padding has-base-3-background-color has-background">          In nature’s embrace,  <br>               I find my place,  <br>      between the wild wind’s soft caress  <br>               and the steady pulse  <br>                         of the earth’s quiet grace.</pre>
	<!-- /wp:verse -->
	';

	// Set up the poem post data.
	$poem_data = array(
		'post_title'   => 'Demo Poem: Windswept',
		'post_content' => $poem_content,
		'post_status'  => 'draft',
		'post_type'    => 'poem',
	);

	// Insert the poem post into the database.
	$poem_id = wp_insert_post( $poem_data );

	// Add custom fields to the poem post.
	if ( $poem_id ) {
		update_post_meta( $poem_id, 'poem_date', '2024-08-25' );
		update_post_meta( $poem_id, 'poem_notes', '<p>The poem Windswept invites readers to find balance and harmony in the natural world, recognizing both the wild, untamed forces and the steady, grounding elements that coexist.</p><p>By combining unusual and regular alignment, the poem visually and thematically represents this duality, encouraging a deeper appreciation for the beauty and complexity of nature.</p>' );
	}
}
