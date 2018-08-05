<?php
namespace Distance_Framework\Includes\Classes;
/**
 * List Terms
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'List_Terms' ) ) {
  class List_Terms {

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
    } // end __construct

    /**
     * The class defaults
     * 
     * @since 0.0.1
     * @access private
     * @return void
     */
    private function defaults() {
      $defaults = array(
        'wrapper'       => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_wrapper', 'div' ),
        'wrapper_id'    => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_wrapper_id' ),
        'wrapper_class' => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_wrapper_class' ),
        'wrapper_attr'  => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_wrapper_attr' ),
        'text'          => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_text', 'Listed In:'),
        'tax_type'      => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_tax_type', 'all' ),
        'tax_list'      => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_tax_list' ),
        'term_class'    => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_term_class' ),
        'term_attr'     => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_term_attr' ),
        'has_link'      => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_has_link', '1' ),
        'link_class'    => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_link_class' ),
        'link_attr'     => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_link_attr' ),
        'list_style'    => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_list_style' ),
        'list_delimer'  => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_list_delimer' ),
        'list_con'      => dfw_get_meta( DFW_PL_PREFIX . '_list_terms_list_con', 'and' ),
      );
      $this->args = array_merge( $defaults, $this->args );
    } // end defaults

    /**
     * List Terms
     *
     * @since      0.0.1
     * @return     $string
     */
    public function list_terms() {
      if( $this->args['tax_type'] == 'custom' ) {
        $taxonomies = explode( ' ', $this->args['tax_list'] );
      } else {
        $taxonomies = get_post_taxonomies( get_the_ID() );
      }
      $post_terms  = wp_get_post_terms( get_the_ID(), $taxonomies, array("fields" => "all"));
      $terms       = dfw_obj_to_array( $post_terms );
      $terms_array = array(); 
      $string      = '';
      $string .= '<' . $this->args['wrapper'] . dfw_attribute( 'id', $this->args['wrapper_id'] ) . dfw_attribute( 'class', $this->args['wrapper_class'] ) . dfw_attribute( '', $this->args['wrapper_attr'] ) . '/>';
      foreach( $terms as $term ) {
        $term_id   = $term['term_id'];
        $term_name = $term['name'];
        $tax       = $term['taxonomy'];
        $link      = get_term_link( $term_id, $tax );
        if( $this->args['has_link'] == 1 ) {
          $terms_array[] = '<span ' . dfw_attribute( 'id', 'term__id-' . $term['term_id'] ) . dfw_attribute( 'class', $this->args['term_class'] ) . dfw_attribute( '', $this->args['term_attr'] ) . '"><a href="' . $link . '"' . dfw_attribute( 'id', 'term__link-id-' . $term['term_id'] ) . dfw_attribute( 'class', $this->args['link_class'] ) . dfw_attribute( '', $this->args['link_attr'] ) . '">' . $term['name'] . '</a></span>';
        } else {
          $terms_array[] = '<span ' . dfw_attribute( 'id', 'term__id-' . $term['term_id'] ) . dfw_attribute( 'class', $this->args['term_class'] ) . dfw_attribute( '', $this->args['term_attr'] ) . '">' . $term['name'] . '</span>';
        }
      }
      if( $this->args['list_style'] == 'human' ) {
        $string .= $this->args['text'] . ' ' . dfw_human_list( $terms_array, $this->args['list_con'] ,$this->args['list_delimer'] );
      } else {
        $string .= $this->args['text'] . ' ' . implode( $this->args['list_delimer'] . ' ', $terms_array );
      }
      $string .= '<' . $this->args['wrapper'] . '/>'; 
      return $string;
    } // end list_terms
  }
} // end List_Terms
