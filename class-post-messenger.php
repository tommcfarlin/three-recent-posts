<?php
/**
 * Display content for the meta box when requested.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */

/**
 * Retrieves information from the class responsible for querying the database and
 * renders it in the context of our meta box when called via the Meta Box Display.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */
class Post_Messenger {

	/**
	 * A reference to the query resonsible for retrieving post information from
	 * the database.
	 *
	 * @access private
	 * @var    WP_Query
	 */
	private $query;

	/**
	 * A reference to the message that's displayed in the view of the
	 * meta box.
	 *
	 * @access private
	 */
	private $message;

	/**
	 * Instantiates the class by setting a reference to the query.
	 */
	public function __construct() {
		$this->query = new Post_Query();
	}

	/**
	 * Retrieves the content to be displayed in the meta box.
	 */
	public function get_message() {

		$this->get_description();

		if ( $this->query->has_posts() ) {
			$this->get_post_message();
		} else {
			$this->get_no_posts_message();
		}
	}

	/**
	 * Displays the description of the content of the meta box.
	 *
	 * @access private
	 */
	private function get_post_message() {
		include_once 'post-list.php';
	}

	/**
	 * Displays the description of the content of the meta box.
	 *
	 * @access private
	 */
	private function get_description() {
		include_once 'message-description.php';
	}

	/**
	 * Displays a message of there are no recent posts.
	 *
	 * @access private
	 */
	private function get_no_posts_message() {
		include_once 'no-post-list.php';
	}
}
