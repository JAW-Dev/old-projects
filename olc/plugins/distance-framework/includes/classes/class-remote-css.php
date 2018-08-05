<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Remote CSS
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.13
 */

if( !class_exists( 'Remote_CSS' ) ) {
  class Remote_CSS {

    /**
     * Initialize the class
     *
     * @since 0.0.13
     */
    public function __construct() {
      add_action( 'wp_enqueue_scripts', array( $this, 'css' ) );
    } // end __construct

    /**
     * CSS
     *
     * @since      0.0.13
     * @return     void
     */
    public function css() {
      $counter = 1;
      if( have_rows( 'dfw_general_remote_css', 'option' ) ) {
        while( have_rows( 'dfw_general_remote_css', 'option' ) ) {
          the_row();
          $dfw_general_remote_css_handle  = dfw_get_sub_field( 'dfw_general_remote_css', 'dfw_general_remote_css_handle' );
          $dfw_general_remote_css_url     = dfw_get_sub_field( 'dfw_general_remote_css', 'dfw_general_remote_css_url' );
          $dfw_general_remote_css_depend  = dfw_get_sub_field( 'dfw_general_remote_css', 'dfw_general_remote_css_depend' );
          $dfw_general_remote_css_version = dfw_get_sub_field( 'dfw_general_remote_css', 'dfw_general_remote_css_version' );
          $dfw_general_remote_css_media   = dfw_get_sub_field( 'dfw_general_remote_css', 'dfw_general_remote_css_media' );
          $handle                         = ( $dfw_general_remote_css_handle ) ? esc_attr( $dfw_general_remote_css_handle ) : 'remote-' . $counter;
          $url                            = esc_url( $dfw_general_remote_css_url );
          $depends                        = dfw_string_to_array( ', ', esc_attr( $dfw_general_remote_css_depend ) );
          $version                        = ( $dfw_general_remote_css_version ) ? esc_attr( $dfw_general_remote_css_version ) : DFW_PL_VERSION;
          $media                          = ( $dfw_general_remote_css_media ) ? esc_attr( $dfw_general_remote_css_media ) : 'all';
          wp_register_style( $handle, $url, $depends , $version, $media );
          wp_enqueue_style( $handle );
          $counter++;
        }
      } 
    } // end css
  }
} // end Remote_CSS