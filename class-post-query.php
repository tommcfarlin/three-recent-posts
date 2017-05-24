<?php
/**
 * Queries the database for three most recent posts.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */

/**
 * Queries the database for three most recent posts. Returns the query to the
 * caller so that it can be interrogates for posts or not.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */
class Post_Query {

	/**
	 * A reference to the WP_Query this class wraps.
	 *
	 * @access private
	 * @var    WP_Query
	 */
	private $query;

	/**
	 * Instantiates the class by preparing instance data and executing the
	 * query so the display can render the contents.
	 */
	public function __construct() {

		$this->query = null;
		$this->get_posts();
	}

	/**
	 * Executes the query for returning the post recent posts ordered by date.
	 *
	 * @access private
	 */
	private function get_posts() {

		$args = array(
			'post_type'   => 'post',
			'post_status' => 'publish',
			'orderby'     => 'date',
			'order'       => 'desc',
		);
		$this->query = new WP_Query( $args );

		return $this->query;
	}

	/**
	 * A helper function to determine if the query has any posts.
	 */
	public function has_posts() {
		return ! $this->query->have_posts();
	}

	/**
	 * A helper function for retrieving the next post in the list of
	 * posts
	 */
	public function the_post() {
		return $this->query->the_post();
	}
}
