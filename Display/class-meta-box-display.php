<?php
/**
 * Defines the display for the meta box.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */

namespace McFarlin\TRP\Display;
use McFarlin\TRP\Utility\Post_Messenger;

/**
 * Defines the display for the meta box that will render the content in the
 * context of its meta box.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */
class Meta_Box_Display {

	/**
	 * A reference to the class that will display the contents in the meta box.
	 *
	 * @access private
	 * @var    Post_Messenger
	 */
	private $messenger;

	/**
	 * Instantiates the object by setting a property equal to that of the class
	 * responsible for rendering the messages from the post query.
	 *
	 * @param string $plugin_dir A reference to the root of the plugin's directory.
	 */
	public function __construct( $plugin_dir ) {
		$this->messenger = new Post_Messenger( $plugin_dir );
	}

	/**
	 * If there are posts to display, renders them in the metabox. Otherwise, displays
	 * a note that there are no posts to display.
	 */
	public function display() {
		$this->messenger->get_message();
	}
}
