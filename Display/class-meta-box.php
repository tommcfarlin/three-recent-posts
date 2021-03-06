<?php
/**
 * Registers the Meta Box with WordPress.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */

 namespace McFarlin\TRP\Display;
 use McFarlin\TRP\Display\Meta_Box_Display;

/**
 * Registers the Meta Box with WordPress. Defines the ID, title, display function,
 * and the post type on which it will live.
 *
 * @author Tom McFarlin
 * @since  0.2.0
 */
class Meta_Box {

	/**
	 * A reference to the class that will display the contents in the meta box.
	 *
	 * @access private
	 * @var    Meta_Box_Display
	 */
	private $meta_box_display;

	/**
	 * Instantiates the class by setting its property equal to a reference to its display.
	 *
	 * @param string $plugin_dir A reference to the root of the plugin's directory.
	 */
	public function __construct( $plugin_dir ) {
		$this->meta_box_display = new Meta_Box_Display( $plugin_dir );
	}

	/**
	 * The function responsible for hooking into the WordPress API.
	 */
	public function init() {

		add_meta_box(
			'three-recent-posts',
			'Three Recent Posts',
			array( $this->meta_box_display, 'display' ),
			'post',
			'side'
		);
	}
}
