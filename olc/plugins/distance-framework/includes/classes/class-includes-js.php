<?php
namespace Distance_Framework\Includes\CLasses;
/**
 * Load Includes JS
 *
 * @package     DFW
 * @subpackage  DFW/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Includes_JS' ) ) {
  class Includes_JS {

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() { 
      add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
      add_action( 'wp_enqueue_scripts', array( $this, 'dqeueue_scripts' ), 100 );
    }

    /**
     * Enqueue Scripts
     *
     * @since      0.0.8
     * @return     void
     */
    public function enqueue_scripts() {
      wp_register_script( DFW_PL_PREFIX . '-js', DFW_PL_PLUGIN_URL . 'includes/js/scripts.min.js', array('jquery'), DFW_PL_VERSION, true  );
      wp_enqueue_script( DFW_PL_PREFIX . '-js' );
    }

    /**
     * Dequeue Scripts
     *
     * @since      0.0.8
     * @return     void
     */
    public function dqeueue_scripts() {
      // Dequeue RICG Responsive Images picturefill.js
      wp_dequeue_script( 'picturefill' );
    } // end dqeueue_scripts
  }
} // end Includes_JS