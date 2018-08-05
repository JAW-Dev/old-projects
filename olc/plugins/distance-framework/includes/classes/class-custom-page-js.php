<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Custom Footer JS
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      1.0.1
 */

if( !class_exists( 'Custom_Page_JS' ) ) {
  class Custom_Page_JS {

    /**
     * Initialize the class
     *
     * @since 1.0.1
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
      $js = get_field( DFW_PL_PREFIX . '_custom_page_javascript' );
      if( $js != '' ) {
        if ( wp_script_is( DFW_PL_PREFIX . '-js', 'done' ) ) {
          echo '<script type="text/javascript">' . "\n" . $js . "\n" . '</script>' . "\n";
        }
      }
    } // end js

  }
} // end Custom_Page_JS