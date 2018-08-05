<?php
namespace Distance_Framework\Admin\Classes;
/**
 * Load admin JS
 *
 * @package     DFW
 * @subpackage  DFW/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Admin_JS' ) ) {
  class Admin_JS {

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() { 
      add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }

    /**
     * Enqueue Scripts
     *
     * @since      0.0.1
     * @return     void
     */
    public function enqueue_scripts() {
      wp_enqueue_script( DFW_PL_PREFIX . '-admin-js', DFW_PL_PLUGIN_URL . 'admin/js/scripts.js', array('jquery'), DFW_PL_VERSION, true );
    }
  }
} // end Admin_JS