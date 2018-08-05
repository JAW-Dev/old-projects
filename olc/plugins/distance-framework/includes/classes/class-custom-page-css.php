<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Custom CSS
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      1.0.1
 */

if( !class_exists( 'Custom_Page_CSS' ) ) {
  class Custom_Page_CSS {

    /**
     * Initialize the class
     *
     * @since 1.0.1
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
      $css = get_field( DFW_PL_PREFIX . '_custom_page_css' );
      if( $css != '' ) {
        echo '<style type="text/css" media="all">' . "\n" . $css . "\n" . '</style>' . "\n";
      }
    } // end css

  }
} // end Custom_Page_CSS