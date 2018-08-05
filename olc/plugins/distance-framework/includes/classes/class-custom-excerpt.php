<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Custom Excerpt
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Custom_Excerpt' ) ) {
  class Custom_Excerpt {

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
        'preserve'       => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_preserve', 'true' ),
        'tag'            => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_tag'),
        'content'        => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_content', get_the_content() ),
        'type'           => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_type', 'word' ),
        'length'         => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_length', '30' ),
        'has_ellipsis'   => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_has_ellipsis' ),
        'ellipsis'       => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_ellipsis' ),
        'ellipsis_link'  => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_ellipsis_link' ),
        'ellipsis_id'    => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_ellipsis_id' ),
        'ellipsis_class' => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_ellipsis_class' ),
        'ellipsis_attr'  => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_ellipsis_attr' ),
        'has_link'       => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_has_link' ),
        'link_text'      => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_link_text' ),
        'link_id'        => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_link_id'  ),
        'link_class'     => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_link_class' ),
        'link_attr'      => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_link_attr' ),
        'link_url'       => dfw_get_meta( DFW_PL_PREFIX . '_custom_excerpt_link_url', get_the_permalink() ),
      );
      $this->args = array_merge( $defaults, $this->args );
    } // end defaults

    /**
     * Excerpt
     *
     * @since      1.2.12
     * @return     string $string the excerpt
     */
    public function excerpt() {
      $string = trim( preg_replace( '~<(pre|table|img|figure).*</\1>~ms', '', $this->args['content'] ) );
      $string = strip_shortcodes( $string );
      if( $this->args['type'] == 'word' ) {
        if( str_word_count( $string, 0 ) > $this->args['length'] ) {
          $words = str_word_count ($string, 2 );
          $pos = array_keys( $words );
          if( has_excerpt( get_the_ID() ) ) {
            $string = get_the_excerpt();
          } else {
            $string = substr($string, 0, $pos[$this->args['length']] );
          }
        }
      } else {
        if( has_excerpt( get_the_ID() ) ) {
            $string = get_the_excerpt();
          } else {
            $string = substr( $string, 0, $this->args['length'] );
          }
      }
      if( !empty( $this->args['tag'] ) ) {
        $open_tag = '<' . $this->args['tag'] . '>';
        $close_tag = '</' . $this->args['tag'] . '>';
      } else {
        $open_tag = '';
        $close_tag = '';
      }
      if( $this->args['has_ellipsis'] == 1 && $this->args['ellipsis_link'] != 1 ) {
        $string = $string . '<span ' . dfw_attribute( 'id', $this->args['ellipsis_id'] ) . dfw_attribute( 'class', $this->args['ellipsis_class'] ) . dfw_attribute( '', $this->args['ellipsis_attr'] ) . '">' . $this->args['ellipsis'] . '</span>' ;
      } elseif( $this->args['has_ellipsis'] == 1 && $this->args['ellipsis_link'] == 1 ) {
        $string = $string . ' <a href="' . $this->args['link_url'] . '"' . dfw_attribute( 'id', $this->args['ellipsis_id'] ) . dfw_attribute( 'class', $this->args['ellipsis_class'] ) . dfw_attribute( '', $this->args['ellipsis_attr'] ) . '>' .  $this->args['ellipsis'] . '</a>';
      }
      if( $this->args['preserve'] == 1 ) {
        $string =  wpautop( $string );
      } else {
        $string =  $open_tag . $string . $close_tag;
      }
      if( $this->args['has_link'] == 1 ) {
        $string = $string . '<a href="' . $this->args['link_url'] . '"' . dfw_attribute( 'id', $this->args['link_id'] ) . dfw_attribute( 'class', $this->args['link_class'] ) . dfw_attribute( '', $this->args['link_attr'] ) . '>' .  __( $this->args['link_text'], 'dfw' ) . "</a>";
      } 
      $string = apply_filters( DFW_PL_PREFIX . '_custom_excerpt', $string, $this->args );
      return $string;
    } // end excerpt
  }
} // end Custom_Excerpt