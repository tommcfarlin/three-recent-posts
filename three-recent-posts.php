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
 * Version:     1.0.0
 * Author:      Tom McFarlin
 * Author URI:  https://tommcfarlin.com
 * Text Domain: three-recent-posts
 * License:     GPL
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace McFarlin\TRP;
use McFarlin\TRP\Display\Meta_Box;

// Import the autoloader.
include_once 'Includes/autoload.php';

add_action( 'add_meta_boxes', __NAMESPACE__ . '\\trp_start' );
/**
 * Starts the plugin.
 */
function trp_start() {

	$meta_box = new Meta_Box( dirname( __FILE__ ) );
	$meta_box->init();
}
