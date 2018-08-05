<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Remote JS
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.13
 */

if( !class_exists( 'Remote_JS' ) ) {
  class Remote_JS {

    /**
     * Initialize the class
     *
     * @since 0.0.13
     */
    public function __construct() {
      add_action( 'wp_enqueue_scripts', array( $this, 'js' ) );
    } // end __construct

    /**
     * JS
     *
     * @since      0.0.13
     * @return     void
     */
    public function js() {
      $counter = 1;
      if( have_rows( 'dfw_general_remote_js', 'option' ) ) {
        while( have_rows( 'dfw_general_remote_js', 'option' ) ) {
          the_row();
          $dfw_general_remote_js_handle  = dfw_get_sub_field( 'dfw_general_remote_js', 'dfw_general_remote_js_handle' );
          $dfw_general_remote_js_url     = dfw_get_sub_field( 'dfw_general_remote_js', 'dfw_general_remote_js_url' );
          $dfw_general_remote_js_depend  = dfw_get_sub_field( 'dfw_general_remote_js', 'dfw_general_remote_js_depend' );
          $dfw_general_remote_js_version = dfw_get_sub_field( 'dfw_general_remote_js', 'dfw_general_remote_js_version' );
          $dfw_general_remote_js_footer  = dfw_get_sub_field( 'dfw_general_remote_js', 'dfw_general_remote_js_footer' );
          $handle                        = ( $dfw_general_remote_js_handle ) ? esc_attr( $dfw_general_remote_js_handle ) : 'remote-' . $counter;
          $url                           = esc_url( $dfw_general_remote_js_url );
          $depends                       = dfw_string_to_array( ', ', esc_attr( $dfw_general_remote_js_depend ) );
          $version                       = ( $dfw_general_remote_js_version ) ? esc_attr( $dfw_general_remote_js_version ) : DFW_PL_VERSION;
          $in_footer                     = $dfw_general_remote_js_footer;
          wp_register_script( $handle, $url, $depends , $version, $in_footer );
          wp_enqueue_script( $handle );
          $counter++;
        }
      } 
    } // end js
  }
} // end Remote_JS