<?php 
namespace Distance_Framework\Includes;
use Distance_Framework\Includes\Classes as Includes;
/**
 * Admin Init
 *
 * @package    DFW
 * @subpackage DFW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Init' ) ) {
  class Init {

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {
      $this->includes_js();
      $this->custom_css();
      $this->remote_css();
      $this->custom_page_css();
      $this->custom_header_js();
      $this->custom_footer_js();
      $this->remote_js();
      $this->custom_page_js();
      $this->add_mime_types();
    } // end __construct

    /**
     * Load JS
     *
     * @since      0.0.7
     * @return     void
     */
    protected function includes_js() {
      new Includes\Includes_JS();
    } // end includes_js

    /**
     * Custom Css
     *
     * @since      0.0.13
     * @return     void
     */
    protected function custom_css() {
      new Includes\Custom_CSS();
    } // end custom_css

    /**
     * Remote CSS
     *
     * @since      0.0.13
     * @return     void
     */
    protected function remote_css() {
      new Includes\Remote_CSS();
    } // end remote_css

    /**
     * Custom Page Css
     *
     * @since      0.0.13
     * @return     void
     */
    protected function custom_page_css() {
      new Includes\Custom_Page_CSS();
    } // end custom_page_css

    /**
     * Custom Header JS
     *
     * @since      0.0.13
     * @return     void
     */
    protected function custom_header_js() {
      new Includes\Custom_Header_JS();
    } // end custom_header_js

    /**
     * Custom Footer JS
     *
     * @since      0.0.13
     * @return     void
     */
    protected function custom_footer_js() {
      new Includes\Custom_Footer_JS();
    } // end custom_footer_js

    /**
     * Remote JS
     *
     * @since      0.0.13
     * @return     void
     */
    protected function remote_js() {
      new Includes\Remote_JS();
    } // end remote_js

    /**
     * Remote JS
     *
     * @since      0.0.13
     * @return     void
     */
    protected function custom_page_js() {
      new Includes\Custom_Page_JS();
    } // end custom_page_js

    /**
     * Add mime types
     *
     * @since      1.1.8
     * @return     void
     */
    protected function add_mime_types() {
      new Includes\Add_Mime_Types();
    } // end add_mime_types

  }
} // end Init