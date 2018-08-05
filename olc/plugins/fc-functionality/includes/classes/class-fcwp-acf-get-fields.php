<?php
/**
 * ACF Get Fields
 *
 * @package    FCPW
 * @subpackage FCPW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'FCWP_ACF_Get_Field' ) ) {
  class FCWP_ACF_Get_Field {

    /**
     * option
     *
     * @since  0.0.1
     * @var    boolean $option if is an option
     */
    public $option;

    /**
     * Post ID
     *
     * @since  0.0.1
     * @var    int $post_id the post ID
     */
    public $post_id;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {
    } // end __construct

    /**
     * Get Field
     *
     * @since      0.0.1
     * @return     [type] [description]
     */
    public function get_field( $field, $option = false, $default = '', $post_id = '', $single = true ) {
      $this->type    = $option;
      $this->post_id = $post_id;
      $result        = '';
      $get_meta      = ( get_post_meta( $this->get_id(), $field, $single ) ? get_post_meta( $this->get_id(), $field, $single ) : $default );
      $get_option    = get_option( 'options_' . $field, $default );
      if( function_exists( 'get_field') ) {
        $get_field        = ( get_field( $field ) ? get_field( $field, $this->get_id(), $single ) : $default );
        $get_field_option = ( get_field( $field, 'options' ) ? get_field( $field, 'options' ) : $default );
      }
      if( $field ) {
        if( $option == true ) {
          if( function_exists( 'get_field') ) {
            $result = $get_field_option ;
          } else {
            $result = $get_option;
          }
        } else {
          if( function_exists( 'get_field') ) {
            $result = $get_field;
          } else {
            $result = $get_meta;
          }
        }
      }
      return $result;
    } // end get_field

    /**
     * Get Sub Field
     *
     * @since      0.0.1
     * @return     [type] [description]
     */
    public function get_sub_field( $parent, $field, $option = false, $default = '', $post_id = '', $single = false ) {
      $this->type    = $option;
      $this->post_id = $post_id;
      $result        = '';
      $parent        = get_post_meta( $this->get_id(), $parent, $single );
      $get_meta      = ( get_post_meta( $this->get_id(), $field, $single ) ? get_post_meta( $this->get_id(), $field, $single ) : $default );
      $get_option    = get_option( 'options_' . $field, $default );
      if( function_exists( 'get_sub_field') ) {
        $get_field = ( get_sub_field( $field ) ? get_sub_field( $field ) : $default );
      }
      if( $field ) {
        if( $option == true ) {
          if( function_exists( 'get_sub_field') ) {
            $result = $get_field;
          } else {
            $result = $get_option;
          }
        } else {
          if( function_exists( 'get_sub_field') ) {
            $result = $get_field;
          } else {
            $result = $get_meta;
          }
        }
      }
      return $result;
    } // end get_sub_field

    /**
     * Get ID
     *
     * @since      0.0.1
     * @return     int $id the post ID
     */
    private function get_id() {
      global $post;
      if( isset( $post->ID ) && !$this->post_id ) {
          return $post->ID;
      }
      return get_the_id();
    } // end get_id

  }
} // end FCWP_ACF_Get_Field

/**
 * Get Field
 *
 * @package    0.0.1
 * @return     void
 */
if( ! function_exists( 'fcwp_get_field') ) {
  function fcwp_get_field( $field, $option = false, $default = '', $post_id = '', $single = true ) {
    $fcwp_get_field = new FCWP_ACF_Get_Field();
    return $fcwp_get_field->get_field( $field, $option, $default, $post_id, $single );
  }
} // end fcwp_get_field

/**
 * Get Sub Field
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'fcwp_get_sub_field') ) {
  function fcwp_get_sub_field( $parent, $field, $option = false, $default = '', $post_id = '', $single = true ) {
    $fcwp_get_sub_field = new FCWP_ACF_Get_Field();
    return $fcwp_get_sub_field->get_sub_field( $parent, $field, $option = false, $default = '', $post_id = '', $single = true );
  }
} // end fcwp_get_sub_field