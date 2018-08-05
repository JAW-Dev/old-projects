<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Pagination
 *
 * @package     DFW
 * @subpackage  DFW/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.16
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Pagination' ) ) {
	class Pagination {

		/**
		 * The arguments
		 * 
		 * @var array
		 */
		public $args;

		/**
		 * Initialize the class
		 *
		 * @since 0.0.16
		 * @param array $args the class arguments
		 */
		public function __construct( $args = array() ) {
			$this->args = $args;
			$this->arguments();
			if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
				return;
			}
			add_filter( 'previous_posts_link_attributes', array( $this, 'previous_posts_link_filter' ) );
			add_filter( 'next_posts_link_attributes', array( $this, 'next_posts_link_filter' ) );
			add_action( 'wp_footer', array( $this, 'load_public_js' ) );
		} // end __construct

		/**
		 * The class arguments
		 *
		 * @global $paged the paged number
		 * 
		 * @since 0.0.16
     * @access private
     * @return void
		 */
		private function arguments() {
			global $paged;
			$defaults = array(
				'pagi_type'          => dfw_get_meta( DFW_PL_PREFIX . '_pagi_pagi_type', 'default' ),
				'wrapper_tag'        => dfw_get_meta( DFW_PL_PREFIX . '_pagi_wrapper_tag', 'nav' ),
				'wrapper_id'         => dfw_get_meta( DFW_PL_PREFIX . '_pagi_wrapper_id' ),
				'wrapper_class'      => dfw_get_meta( DFW_PL_PREFIX . '_pagi_wrapper_class' ),
				'wrapper_attr'       => dfw_get_meta( DFW_PL_PREFIX . '_pagi_wrapper_attr', 'role="navigation"' ),
				'prelabel'           => dfw_get_meta( DFW_PL_PREFIX . '_pagi_prev_text' ),
				'prev_text'          => dfw_get_meta( DFW_PL_PREFIX . '_pagi_prev_text' ),
				'nextlabel'          => dfw_get_meta( DFW_PL_PREFIX . '_pagi_next_text' ),
				'next_text'          => dfw_get_meta( DFW_PL_PREFIX . '_pagi_next_text' ),
				'sep'                => dfw_get_meta( DFW_PL_PREFIX . '_pagi_sep' ),
				'next_wrapper_tag'   => dfw_get_meta( DFW_PL_PREFIX . '_pagi_next_wrapper_tag', 'div' ),
				'next_wrapper_id'    => dfw_get_meta( DFW_PL_PREFIX . '_pagi_next_wrapper_id' ),
				'next_wrapper_class' => dfw_get_meta( DFW_PL_PREFIX . '_pagi_next_wrapper_class' ),
				'next_wrapper_attr'  => dfw_get_meta( DFW_PL_PREFIX . '_pagi_next_wrapper_attr' ),
				'prev_wrapper_tag'   => dfw_get_meta( DFW_PL_PREFIX . '_pagi_prev_wrapper_tag', 'div' ),
				'prev_wrapper_id'    => dfw_get_meta( DFW_PL_PREFIX . '_pagi_prev_wrapper_id' ),
				'prev_wrapper_class' => dfw_get_meta( DFW_PL_PREFIX . '_pagi_prev_wrapper_class' ),
				'prev_wrapper_attr'  => dfw_get_meta( DFW_PL_PREFIX . '_pagi_prev_wrapper_attr' ),
				'show_all'           => dfw_get_meta( DFW_PL_PREFIX . '_pagi_show_all', 0 ),
				'end_size'           => dfw_get_meta( DFW_PL_PREFIX . '_pagi_end_size', 1 ),
				'mid_size'           => dfw_get_meta( DFW_PL_PREFIX . '_pagi_mid_size', 1 ),
				'prev_next'          => dfw_get_meta( DFW_PL_PREFIX . '_pagi_prev_next', 1 ),
				'type'               => dfw_get_meta( DFW_PL_PREFIX . '_pagi_type', 'list' ),
				'add_args'           => dfw_get_meta( DFW_PL_PREFIX . '_pagi_add_args', false ),
				'add_fragment'       => dfw_get_meta( DFW_PL_PREFIX . '_pagi_add_fragment', false ),
				'before_page_number' => dfw_get_meta( DFW_PL_PREFIX . '_pagi_before_page_number', false ),
				'after_page_number'  => dfw_get_meta( DFW_PL_PREFIX . '_pagi_after_page_number', false ),
				'base'               => dfw_get_meta( DFW_PL_PREFIX . '_pagi_base', false ),
				'base'               => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'             => '?paged=%#%',
				'total'              => $GLOBALS['wp_query']->max_num_pages,
				'current'            => max( 1, get_query_var( 'paged' ) ),
			);
	    $this->args = array_merge( $defaults, $this->args );
		} // end arguments

		/**
		 * Display the pagination
		 *
		 * @since 0.0.16
     * @access private
     * @return string the html output for the pagination
		 */
		public function pagination() {
			ob_start();
			echo '<' . $this->args['wrapper_tag'] . dfw_attribute( 'id', $this->args['wrapper_id'] ) . dfw_attribute( 'class', $this->args['wrapper_class'] . ' dfw_pagi_type__' . $this->args['pagi_type'] ) . dfw_attribute( '', $this->args['wrapper_attr'] ) . '>';
				switch( $this->args['pagi_type'] ) {
					case 'split':
						echo '<' . $this->args['prev_wrapper_tag'] . dfw_attribute( 'id', $this->args['prev_wrapper_id'] ) . dfw_attribute( 'class', $this->args['prev_wrapper_class'] ) . dfw_attribute( '', $this->args['prev_wrapper_attr'] ) . '>';
						previous_posts_link( esc_html__( $this->args['prelabel'] ) );
						echo '</' . $this->args['prev_wrapper_tag'] . '>';
						echo '<' . $this->args['next_wrapper_tag'] . dfw_attribute( 'id', $this->args['next_wrapper_id'] ) . dfw_attribute( 'class', $this->args['next_wrapper_class'] ) . dfw_attribute( '', $this->args['next_wrapper_attr'] ) . '>';
						next_posts_link( esc_html__( $this->args['nextlabel'] ) );
						echo '</' . $this->args['next_wrapper_tag'] . '>';
					break;
					case 'numbered':
						echo paginate_links( $this->args );
					break;
					case 'default':
						posts_nav_link( ' ' . esc_html__( $this->args['sep'] ) . ' ', esc_html__( $this->args['prelabel'] ), esc_html__( $this->args['nextlabel'] ) );
		      default:
		      break;
				}
			echo '</' . $this->args['wrapper_tag'] . '>';
			$output = ob_get_clean();
			$output = apply_filters( DFW_PL_PREFIX . '_pagination', $output, $this->args );
      return $output;
		} // end pagination

		/**
		 * Filter for previous_posts_link
		 *
		 * @since 0.0.16
     * @return string the filterd content
		 */
		public function previous_posts_link_filter() {
			$aria_prev = ( !empty( $this->args['prelabel'] ) ? 'aria-label="' . $this->args['prelabel'] . '"' : "" );
			$attr = $aria_prev;
			return $attr;
		} // end previous_posts_link_filter

		/**
		 * Filter for next_posts_link
		 *
		 * @since 0.0.16
     * @return string the filterd content
		 */
		public function next_posts_link_filter() {
			$aria_next = ( !empty( $this->args['nextlabel'] ) ? 'aria-label="' . $this->args['nextlabel'] . '"' : "" );
			$attr = $aria_next;
			return $attr;
		} // end next_posts_link_filter

		/**
		 * Load required JavaScript
		 *
		 * @since 0.0.16
     * @return void
		 */
		public function load_public_js() {
			wp_register_script( 'dfw-pagi.js', DFW_PL_PLUGIN_URL . 'includes/js/lib/pagination.js',  array( 'jquery' ), DFW_PL_VERSION, true );
	    wp_enqueue_script( 'dfw-pagi.js' );
		} // end load_public_js
	}
} // end Pagination