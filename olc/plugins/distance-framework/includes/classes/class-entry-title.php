<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Entry Title
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Entry_Title' ) ) {
  class Entry_Title {

    /**
     * Arguments
     *
     * @since  0.0.1
     * @var    array $args the arguments
     */
    protected $args;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $args = array() ) {
      $this->args = $args;
      $this->defualts();
    } // end __construct

    /**
     * The class arguments
     * 
     * @since      0.0.1
     * @access     private
     * @return     void
     */
    private function defualts() {
      $defaults = array(
        'header_tag'    => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_header_tag', 'header' ),
        'header_id'     => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_header_id' ),
        'header_class'  => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_header_class' ),
        'header_attr'   => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_header_attr' ),
        'heading_tag'   => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_heading_tag', 'h1' ),
        'heading_id'    => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_heading_id' ),
        'heading_class' => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_heading_class' ),
        'heading_attr'  => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_heading_attr' ),
        'has_link'      => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_has_link' ),
        'link_id'       => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_link_id' ),
        'link_class'    => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_link_class' ),
        'link_attr'     => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_link_attr' ),
        'link_url'      => dfw_get_meta( DFW_PL_PREFIX . '_entry_title_link_url', get_the_permalink() ),
      );
      $this->args = array_merge( $defaults, $this->args );
    } // end defualts

    /**
     * Title
     *
     * @since      0.0.1
     * @return     string $string
     */
    public function title() {
      $string = '';
      $string .= '<' . $this->args['header_tag'] . dfw_attribute( 'id', $this->args['header_id'] ) . dfw_attribute( 'class', $this->args['header_class'] ) . dfw_attribute( '', $this->args['header_attr'] ) . '>';
      $string .= '<' . $this->args['heading_tag'] . dfw_attribute( 'id', $this->args['heading_id'] ) . dfw_attribute( 'class', $this->args['heading_class'] ) . dfw_attribute( '', $this->args['heading_attr'] ) . '>';
      if( $this->args['has_link'] == 1 ) {
        $string .= '<a href="' . $this->args['link_url'] . '"' . dfw_attribute( 'id', $this->args['link_id'] ) . dfw_attribute( 'class', $this->args['link_class'] ) . dfw_attribute( '', $this->args['link_attr'] ) . '>' . get_the_title() . '</a>';
      } else {
        $string .= get_the_title();
      }
      $string .= '</' . $this->args['heading_tag'] . '>';
      $string .= '</' . $this->args['header_tag'] . '>';
      $string = apply_filters( 'dfw_entry_title', $string );
      return $string;
    } // end title

  }
} // end Entry_Title