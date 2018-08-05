<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Display Post Author
 *
 * @package     FCWP
 * @subpackage  FCWP/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */
if( !class_exists( 'Display_Author' ) ) {
	class Display_Author {

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
     * @since      0.0.1
     * @param      array $args the class arguments
     */
    public function __construct( $args = array() ) {
      $this->args = $args;
      $this->defaults();
    } // end __construct

    /**
     * The class arguments
     * 
     * @since      0.0.1
     * @access     private
     * @return     void
     */
    private function defaults() {
      $defaults = array(
        'wrapper'        => dfw_get_meta( DFW_PL_PREFIX . '_display_author_wrapper', 'span' ),
        'wrapper_id'     => dfw_get_meta( DFW_PL_PREFIX . '_display_author_wrapper_id' ),
        'wrapper_class'  => dfw_get_meta( DFW_PL_PREFIX . '_display_author_wrapper_class' ),
        'wrapper_attr'   => dfw_get_meta( DFW_PL_PREFIX . '_display_author_wrapper_attr' ),
        'author_text'    => dfw_get_meta( DFW_PL_PREFIX . '_display_author_author_text' ),
        'author_display' => dfw_get_meta( DFW_PL_PREFIX . '_display_author_author_display' ),
        'author_custom'  => dfw_get_meta( DFW_PL_PREFIX . '_display_author_author_custom' ),
        'has_link'       => dfw_get_meta( DFW_PL_PREFIX . '_display_author_has_link' ),
        'link_id'        => dfw_get_meta( DFW_PL_PREFIX . '_display_author_link_id' ),
        'link_class'     => dfw_get_meta( DFW_PL_PREFIX . '_display_author_link_class' ),
        'link_attr'      => dfw_get_meta( DFW_PL_PREFIX . '_display_author_link_attr' ),
      );
      $this->args = array_merge( $defaults, $this->args );
    } // end defaults

    /**
     * Display the published time
     *
     * @since     0.0.1
     * @uses      esc_html() wp-includes/formatting.php
     * @uses      get_the_author() wp-includes/author-template.php
     * @uses      get_the_author_meta() wp-includes/author-template.php
     * @return    string $string the outputed HTML
     */
    public function display() {
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
      $string .= '<' . $this->args['wrapper'] . dfw_attribute( 'id', $this->args['wrapper_id'] ) . dfw_attribute( 'class', $this->args['wrapper_class'] ) . dfw_attribute( '', $this->args['wrapper_attr'] ) . '>';
      if( $this->args['has_link'] != true ) {
        $string .= esc_html__( $this->args['author_text'], 'dfw' ) . ' ' . esc_attr( $author_display );
      } else {
        $string .= esc_html__( $this->args['author_text'], 'dfw' ) . ' ' . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"' . dfw_attribute( 'id', $this->args['link_id'] ) . dfw_attribute( 'class', $this->args['link_class'] ) . dfw_attribute( '', $this->args['link_attr'] ) . '>' . esc_attr( $author_display ) . '</a>';
      }
      $string .= '</' . $this->args['wrapper'] . '>';
      $string = apply_filters( DFW_PL_PREFIX . '_display_author', $string, $this->args );
      return $string;
    } // end display
	}
} // end Display_Author