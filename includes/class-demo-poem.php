<?php
/**
 * Demo poem class.
 *
 * @link       https://nataliesmith.dev
 * @since      1.0.0
 * @package    Poetwp\Includes
 */

/**
 * Represents a demo poem with a predefined title, status, and type.
 *
 * The `Demo_Poem` class provides static methods to retrieve the content and custom fields for a demo poem.
 */
class Demo_Poem {
	/**
	 * The title of the demo poem.
	 *
	 * @var string
	 */
	public static $post_title = 'Demo Poem: Windswept';

	/**
	 * The status of the demo poem.
	 *
	 * @var string
	 */
	public static $post_status = 'draft';

	/**
	 * The post type of the demo poem.
	 *
	 * @var string
	 */
	public static $post_type = 'poem';

	/**
	 * Get the content of the demo poem.
	 *
	 * @return string The content of the demo poem.
	 */
	public static function get_content() {
		return '
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
        <!-- /wp:verse -->s
        ';
	}
	/**
	 * Get custom fields for the demo poem.
	 *
	 * @return array An array of custom fields for the demo poem.
	 */
	public static function get_custom_fields() {
		return array(
			'poem_date'  => '2024-08-25',
			'poem_notes' => '<p>The poem Windswept invites readers to find balance and harmony in the natural world, recognizing both the wild, untamed forces and the steady, grounding elements that coexist.</p><p>By combining unusual and regular alignment, the poem visually and thematically represents this duality, encouraging a deeper appreciation for the beauty and complexity of nature.</p>',
		);
	}
}
