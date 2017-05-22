<?php
/**
 * Three Recent Posts
 *
 * @package     TRP
 * @author      Tom McFarlin
 * @copyright   2017 Tom McFarlin
 * @license     MIT
 *
 * @wordpress-plugin
 * Plugin Name: Three Recent Posts
 * Plugin URI:  https://tommcfarlin.com/three-recent-posts/
 * Description: Displays the three mot recent posts in your post editor screen.
 * Version:     0.1.0
 * Author:      Tom McFarlin
 * Author URI:  https://tommcfarlin.com
 * Text Domain: three-recent-posts
 * License:     MIT
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

add_action( 'add_meta_boxes', 'three_recent_posts_meta_box' );
/**
 * Registers the Meta Box with WordPress. Defines the ID, title, display function,
 * and the post type on which it will live.
 */
function three_recent_posts_meta_box() {

	add_meta_box(
		'three-recent-posts',			// Meta Box ID.
		'Three Recent Posts',	 		// Meta Box Title.
		'three_recent_posts_display',	// Function for rendering the meta box.
		'post',							// Post type on which this meta box will live.
		'side'							// Where the meta box will be displayed.
	);
}

/**
 * If there are posts to display, renders them in the metabox. Otherwise, displays
 * a note that there are no posts to display.
 */
function three_recent_posts_display() {

	$query = _three_recent_posts_get();

	if ( $query->have_posts() ) {
		_three_recent_posts_show_posts( $query );
	} else {
		_three_recent_posts_no_posts();
	}

}

/**
 * Defines a query for retrieving the three most recent posts and orders them by
 * descing date (with the most recent being first).
 *
 * @return WP_Query $query The query for retrieving the three most recent posts.
 */
function _three_recent_posts_get() {

	$args = array(
		'post_type'   => 'post',
		'post_status' => 'publish',
		'orderby'     => 'date',
		'order'       => 'desc',
	);
	$query = new WP_Query( $args );

	return $query;
}

/**
 * Creates the content for the meta box if there are posts to display. Creates a notice
 * that up to three posts will be displayed, then links to each of the three most recent
 * post.
 *
 * @param WP_Query $query The query that contains results to render in the display.
 */
function _three_recent_posts_show_posts( $query ) {

	// There may not always be three posts, so display a message explaining.
	$html = '<p>';
		$html .= '<span class="description">';
			$html .= 'Displays up to the three most recent posts.';
		$html .= '</span>';
	$html .= '</p>';

	// Create an ordered lists of the most recent posts.
	$html .= '<ol>';
	while ( $query->have_posts() ) {
		$query->the_post();

		$html .= '<li>';
			$html .= '<a href="' . get_the_permalink() . '">';
				$html .= get_the_title();
			$html .= '</a>';
		$html .= '</li>';
	}
	$html .= '</ol>';

	echo ( $html );
}

/**
 * Displays a message in the meta box if there are no recent posts.
 */
function _three_recent_posts_no_posts() {

	$html .= '<span class="description">';
		$html .= 'There are no recent posts.';
	$html .= '</span>';

	echo $html;
}
