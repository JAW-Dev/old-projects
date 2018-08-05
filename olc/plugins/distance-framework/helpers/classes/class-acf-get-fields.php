<?php
namespace Distance_Framework\Helpers\Classes; 
/**
 * ACF Get Fields
 *
 * Retund the value of ACF field with the get_option() fallback
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'ACF_Get_Field' ) ) {
  class ACF_Get_Field {

    /**
     * option
     *
     * @since  0.0.1
     * @var    boolean $option If is an option.
     */
    public $option;

    /**
     * Post ID
     *
     * @since  0.0.1
     * @var    int $post_id The post ID.
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
     * Retuns the value of a Advanced Custom Fields field value.
     * If ACF isn't activates it defauls to get_option()
     *
     * @since      0.0.1
     * @param      string $field The field ID.
     * @param      bool $option If is and option.
     * @param      string $default The default value.
     * @param      int $post_id The post ID.
     * @param      bool $single Whether to return a single value.
     * @uses       wp-includes/post.php: get_post_meta()
     * @uses       wp-includes/post.php: get_option()
     * @uses       wp-content/plugins/advanced-custom-fields-pro/api/api-template.php: get_field() 
     * @return     string $result The option value.
     */
    public function get_field( $field, $option = false, $default = '', $post_id = '', $single = true ) {
      $this->post_id = $post_id;
      $result        = '';
      if( $field ) {
        if( $option == true ) {
          if( function_exists( 'get_field') ) {
            $result = ( get_field( $field, 'options' ) ? get_field( $field, 'options' ) : $default );
          } else {
            $result = get_option( 'options_' . $field, $default );
          }
        } else {
          if( function_exists( 'get_field') ) {
            $result = ( get_field( $field ) ? get_field( $field, $this->get_id(), $single ) : $default );
          } else {
            $result = ( get_post_meta( $this->get_id(), $field, $single ) ? get_post_meta( $this->get_id(), $field, $single ) : $default );
          }
        }
      }
      return $result;
    } // end get_field

    /**
     * Get Sub Field
     *
     * Retuns the value of a Advanced Custom Fields sub field value.
     * If ACF isn't activates it defauls to get_option()
     *
     * @since      0.0.1
     * @param      string $parent The parent field for the repeater
     * @param      string $field The field ID.
     * @param      bool $option If is and option.
     * @param      string $default The default value.
     * @param      int $post_id The post ID.
     * @param      bool $single Whether to return a single value.
     * @uses       wp-includes/post.php: get_post_meta()
     * @uses       wp-includes/post.php: get_option()
     * @uses       wp-content/plugins/advanced-custom-fields-pro/api/api-template.php: get_sub_field() 
     * @return     string $result The option value.
     */
    public function get_sub_field( $parent, $field, $option = false, $default = '', $post_id = '', $single = false ) {
      $this->post_id = $post_id;
      $result        = '';
      $parent        = get_post_meta( $this->get_id(), $parent, $single );
      if( $field ) {
        if( $option == true ) {
          if( function_exists( 'get_sub_field') ) {
            $result = ( get_sub_field( $field ) ? get_sub_field( $field ) : $default );
          } else {
            $result = get_option( 'options_' . $field, $default );
          }
        } else {
          if( function_exists( 'get_sub_field') ) {
            $result = ( get_sub_field( $field ) ? get_sub_field( $field ) : $default );
          } else {
            $result = ( get_post_meta( $this->get_id(), $field, $single ) ? get_post_meta( $this->get_id(), $field, $single ) : $default );
          }
        }
      }
      return $result;
    } // end get_sub_field

    /**
     * Get ID
     *
     * @since      0.0.1
     * @uses       wp-includes/post-template.php: get_the_id
     * @global     obj $post The post object
     * @return     int $id The post ID.
     */
    private function get_id() {
      global $post;
      if( isset( $post->ID ) && !$this->post_id ) {
          return $post->ID;
      }
      return get_the_id();
    } // end get_id
  }
} // end ACF_Get_Field