<?php
/**
 * Post Wrapper Shortcode
 *
 * A shortcode to wrap post content with in the editor
 * to add a div classes and/or IDs for post specific styling.
 *
 * @package    Bene_Shortcodes
 * @subpackage Bene_Shortcodes/Classes
 * @author     Fulcrum Creatives <jason@fulcrumcreatives.com>
 * @copyright  Copyright (c) 2017, Fulcrum Creatives
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since      1.0.0
 */
namespace Bene_Shortcodes\Includes\Classes;

if ( ! class_exists( 'Shortcode_Post_Wrapper' ) ) {

	/**
	 * Post Wrapper Shortcode
	 *
	 * @author Fulcrum Creatives
	 * @since  1.0.0
	 */
	class Shortcode_Post_Wrapper {

		/**
		 * Initialize the class
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			$this->hooks();
		}

		/**
		 * Hooks.
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function hooks() {
			add_shortcode( 'post_wrapper', array( $this, 'shortcode' ) );
		}

		/**
		 * Shortcode.
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @param mixed  $atts The attributes for the shortcode.
		 * @param string $content The content wrapped by the shortcode.
		 *
		 * @return string The wrapper element with the content.
		 */
		public function shortcode( $atts, $content = null ) {
			$atts_array = array(
				'tag'     => 'div',
				'classes' => '',
				'id'      => '',
			);
			$a          = shortcode_atts( $atts_array, $atts );
			$tag        = $a['tag'];
			$classes    = ( $a['classes'] ) ? ' class="' . $a['classes'] . '"' : '';
			$id         = ( $a['id'] ) ? ' id="' . $a['id'] . '"' : '';
			$output     = "<{$tag}{$classes}{$id}>{$content}</{$tag}>";

			return $output;
		}
	}
}
