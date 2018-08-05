<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Custom Footer JS
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.13
 */

if( !class_exists( 'Custom_Footer_JS' ) ) {
  class Custom_Footer_JS {

    /**
     * Initialize the class
     *
     * @since 0.0.13
     */
    public function __construct() {
      add_action( 'wp_footer', array( $this, 'js' ), 99 );
    } // end __construct

    /**
     * CSS
     *
     * @since      1.0.1
     * @return     void
     */
    public function js() {
      $js = dfw_get_meta( DFW_PL_PREFIX . '_general_footer_javascript', '', true );
      if( $js != '' ) {
        if ( wp_script_is( DFW_PL_PREFIX . '-js', 'done' ) ) {
          echo '<script type="text/javascript">' . "\n" . $js . "\n" . '</script>' . "\n";
        }
      }
    } // end js

  }
} // end Custom_Footer_JS