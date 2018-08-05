<?php
/**
 * Archive Title
 *
 * @package     FCWP
 * @subpackage  FCWP/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Archive_Title' ) ) {
	class FCWP_Archive_Title {

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
			$this->arguments();
		}

		/**
		 * The class arguments
		 *
		 * @global $paged the paged number
		 * 
		 * @since 0.0.1
         * @access private
         * @return void
		 */
		private function arguments() {
			$defaults = array(
				'heading'         => 'h1',
				'heading_id'      => 'section-heading-' . get_the_ID(),
				'heading_class'   => 'entry__title',
				'heading_attr'    => '',
				'category_text'   => 'Category: ',
				'tag_text'        => 'Tag: ',
				'author_text'     => 'Author: ',
				'year_text'       => 'Year: ',
				'month_text'      => 'Month: ',
				'day_text'        => 'Day: ',
				'archives_text'   => 'Archives: ',
				'year_format'     => 'Y',
				'month_format'    => 'F Y',
				'day_format'      => 'F j, Y'
			);
	        $this->args = array_merge( $defaults, $this->args );
		} // end arguments

		/**
		 * Display the archive title
		 *
		 * @since 0.0.1
         * @access public
         * @return string the html output for the published time
		 */
		public function title() {
			$heading       = ( !empty( $this->args['heading'] )       ? $this->args['heading']                          : "" );
			$heading_id    = ( !empty( $this->args['heading_id'] )    ? ' id="' . $this->args['heading_id'] . '"'       : "" );
			$heading_class = ( !empty( $this->args['heading_class'] ) ? ' class="' . $this->args['heading_class'] . '"' : "" );
			$heading_attr  = ( !empty( $this->args['heading_attr'] )  ? $this->args['heading_attr']                     : "" );
			$category_text = ( !empty( $this->args['category_text'] ) ? $this->args['category_text']                    : "" );
			$tag_text      = ( !empty( $this->args['tag_text'] )      ? $this->args['tag_text']                         : "" );
			$author_text   = ( !empty( $this->args['author_text'] )   ? $this->args['author_text']                      : "" );
			$year_text     = ( !empty( $this->args['year_text'] )     ? $this->args['year_text']                        : "" );
			$month_text    = ( !empty( $this->args['month_text'] )    ? $this->args['month_text']                       : "" );
			$day_text      = ( !empty( $this->args['day_text'] )      ? $this->args['day_text']                         : "" );
			$archives_text = ( !empty( $this->args['archives_text'] ) ? $this->args['archives_text']                    : "" );
			$year_format   = ( !empty( $this->args['year_format'] )   ? $this->args['year_format']                      : "" );
			$month_format  = ( !empty( $this->args['month_format'] )  ? $this->args['month_format']                     : "" );
			$day_format    = ( !empty( $this->args['day_format'] )    ? $this->args['day_format']                       : "" );
			$string            = '';
			$string = '<' . $heading . $heading_id . $heading_class . $heading_attr . '>';
				if ( is_category() ) {
					$string .= sprintf( esc_html__( $category_text . '%s', FCWP_PL_TEXTDOMAIN ), single_cat_title( '', false ) );
				} elseif ( is_tag() ) {
					$string .= sprintf( esc_html__( $tag_text . '%s', FCWP_PL_TEXTDOMAIN ), single_tag_title( '', false ) );
				} elseif ( is_author() ) {
					$string .= sprintf( esc_html__( $author_text . '%s', FCWP_PL_TEXTDOMAIN ), '<span class="vcard">' . get_the_author() . '</span>' );
				} elseif ( is_year() ) {
					$string .= sprintf( esc_html__( $year_text . '%s', FCWP_PL_TEXTDOMAIN ), get_the_date( esc_html__( $year_format, FCWP_PL_TEXTDOMAIN ) ) );
				} elseif ( is_month() ) {
					$string .= sprintf( esc_html__( $month_text . '%s', FCWP_PL_TEXTDOMAIN ), get_the_date( esc_html__( $month_format, FCWP_PL_TEXTDOMAIN ) ) );
				} elseif ( is_day() ) {
					$string .= sprintf( esc_html__( $day_text . '%s', FCWP_PL_TEXTDOMAIN ), get_the_date( esc_html__( $day_format, FCWP_PL_TEXTDOMAIN ) ) );
				} elseif ( is_post_type_archive() ) {
					$string .= sprintf( esc_html__( $archives_text . '%s', FCWP_PL_TEXTDOMAIN ), post_type_archive_title( '', false ) );
				} elseif ( is_tax() ) {
					$tax = get_taxonomy( get_queried_object()->taxonomy );
					$string .= sprintf( esc_html__( '%1$s: %2$s', FCWP_PL_TEXTDOMAIN ), $tax->labels->singular_name, single_term_title( '', false ) );
				} else {
					$string .= esc_html__( $archives_text , FCWP_PL_TEXTDOMAIN );
				}
				/**
				 * Filter the archive title.
				 *
				 * @param string $title Archive title to be displayed.
				 */
				$string .= '</' . $heading  . '>';
				return $string;
		} // end title
	}
} // end FCWP_Archive_Title

/**
 * Archive Title
 *
 * @package    0.0.1
 * @return     void
 */
if( !function_exists( 'fcwp_archive_title') ) {
  function fcwp_archive_title( $args = array() ) {
    $fcwp_archive_title = new FCWP_Archive_Title( $args );
    echo $fcwp_archive_title->title();
  }
} // end fcwp_archive_title