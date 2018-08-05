<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Archive Title
 *
 * @package     DFW
 * @subpackage  DFW/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Archive_Title' ) ) {
	class Archive_Title {

		/**
     * Arguments
     *
     * @since  0.0.1
     * @var    array $args the arguments
     */
    public $args;

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct( $args = array() ) {
			$this->args = $args;
			$this->defaults();
		}

		/**
		 * The class defaults
		 * 
		 * @since 0.0.1
     * @access private
     * @return void
		 */
		private function defaults() {
			$defaults = array(
				'header_tag'     => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_header_tag', 'header' ),
				'header_id'      => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_header_id'),
				'header_class'   => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_header_class'),
				'header_attr'    => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_header_attr'),
				'heading_tag'    => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_heading_tag', 'h1' ),
				'heading_id'     => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_heading_id' ),
				'heading_class'  => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_heading_class' ),
				'heading_attr'   => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_heading_attr' ),
				'archives_title' => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_archives_title' ),
				'category_title' => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_category_title' ),
				'tag_title'      => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_tag_title' ),
				'author_title'   => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_author_title' ),
				'author_display' => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_author_display' ),
				'author_custom'  => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_author_custom' ),
				'year_title'     => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_year_title' ),
				'year_format'    => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_year_format', 'Y' ),
				'month_title'    => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_month_title' ),
				'month_format'   => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_month_format', 'F Y' ),
				'day_title'      => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_day_title' ),
				'day_format'     => dfw_get_meta( DFW_PL_PREFIX . '_archive_title_day_format', 'F j, Y' ),
			);
	    $this->args = array_merge( $defaults, $this->args );
		} // end defaults

		/**
		 * Display the archive title
		 *
		 * @since 0.0.1
     * @return string the html output for the published time
		 */
		public function title() {
			$post_classes   = implode( ' ',  get_post_class( $this->args['header_class'] ) );
			$string         = '';
			$author_display = '';
			switch( $this->args['author_display'] ) {
				case 'display_name' :
					$author_display = get_the_author_meta( 'display_name' );
				break;
				case 'nicename' :
					$author_display = get_the_author_meta( 'user_nicename' );
				break;
				case 'first_last' :
					$author_display = get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' );
				break;
				case 'custom' :
					$author_display = $this->args['author_custom'];
				break;
				case 'username' :
				default :
					$author_display = get_the_author();
				break;
			}
			$string = '<' . $this->args['header_tag'] . dfw_attribute( 'id', $this->args['header_id'] ) . dfw_attribute( 'class', $post_classes ) . dfw_attribute( '', $this->args['header_attr'] ) . '>' . 
									'<' . $this->args['heading_tag'] . dfw_attribute( 'id', $this->args['heading_id'] ) . dfw_attribute( 'class', $this->args['heading_class'] ) . dfw_attribute( '', $this->args['heading_attr'] ) . '>';
				if ( is_category() ) {
					$string .= sprintf( esc_html__( $this->args['category_title'] . ' ' . '%s' , 'dfw' ), single_cat_title( '', false ) );
				} elseif ( is_tag() ) {
					$string .= sprintf( esc_html__( $this->args['tag_title'] . ' ' . '%s', 'dfw' ), single_tag_title( '', false ) );
				} elseif ( is_author() ) {
					$string .= sprintf( esc_html__( $this->args['author_title'] . ' ' . '%s', 'dfw' ), esc_attr( $author_display )  );
				} elseif ( is_year() ) {
					$string .= sprintf( esc_html__( $this->args['year_title'] . ' ' . '%s', 'dfw' ), get_the_date( esc_html__( $this->args['year_format'], 'dfw' ) ) );
				} elseif ( is_month() ) {
					$string .= sprintf( esc_html__( $this->args['month_title'] . ' ' . '%s', 'dfw' ), get_the_date( esc_html__( $this->args['month_format'], 'dfw' ) ) );
				} elseif ( is_day() ) {
					$string .= sprintf( esc_html__( $this->args['day_title'] . ' ' . '%s', 'dfw' ), get_the_date( esc_html__( $this->args['day_format'], 'dfw' ) ) );
				} elseif ( is_post_type_archive() ) {
					$string .= sprintf( esc_html__( $this->args['archives_title'] . ' ' . '%s', 'dfw' ), post_type_archive_title( '', false ) );
				} elseif ( is_tax() ) {
					$tax = get_taxonomy( get_queried_object()->taxonomy );
					$string .= sprintf( esc_html__( '%1$s: %2$s', 'dfw' ), $tax->labels->singular_name, single_term_title( '', false ) );
				} else {
					$string .= esc_html__( $this->args['archives_title'] . ' ' , 'dfw' );
				}
			$string .= '</' . $this->args['heading_tag']  . '>' . '</' . $this->args['header_tag'] . '>';
			$string = apply_filters( DFW_PL_PREFIX . '_archive_title', $string, $this->args );
			return $string;
		} // end title
	}
} // end Archive_Title