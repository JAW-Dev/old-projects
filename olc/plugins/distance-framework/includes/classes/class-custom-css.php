<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Custom CSS
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.13
 */

if( !class_exists( 'Custom_CSS' ) ) {
  class Custom_CSS {

    /**
     * Initialize the class
     *
     * @since 0.0.13
     */
    public function __construct() {
      add_action( 'wp_head', array( $this, 'css' ), 100 );
    } // end __construct

    /**
     * CSS
     *
     * @since      1.0.1
     * @return     void
     */
    public function css() {
      $css = dfw_get_meta( DFW_PL_PREFIX . '_general_custom_css', '', true );
      if( $css != '' ) {
        echo '<style type="text/css" media="all">' . "\n" . $css . "\n" . '</style>' . "\n";
      }
    } // end css

  }
} // end Custom_CSS