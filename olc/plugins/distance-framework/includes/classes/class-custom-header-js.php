<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Custom Header JS
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.13
 */

if( !class_exists( 'Custom_Header_JS' ) ) {
  class Custom_Header_JS {

    /**
     * Initialize the class
     *
     * @since 0.0.13
     */
    public function __construct() {
      add_action( 'wp_head', array( $this, 'js' ), 99 );
    } // end __construct

    /**
     * CSS
     *
     * @since      1.0.1
     * @return     void
     */
    public function js() {
      $js = dfw_get_meta( DFW_PL_PREFIX . '_general_header_javascript', '', true );
      if( $js != '' ) {
        echo '<script type="text/javascript">' . "\n" . $js . "\n" . '</script>' . "\n";
      }
    } // end js

  }
} // end Custom_Header_JS