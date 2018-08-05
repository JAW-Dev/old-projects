<?php
namespace Distance_Framework\Admin\Classes;
/**
 * Load admin CSS
 *
 * @package     DFW
 * @subpackage  DFW/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'Admin_CSS' ) ) {
	class Admin_CSS {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() { 
			add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_css' ) );
		}

		public function load_admin_css() {
			wp_enqueue_style( DFW_PL_PREFIX . '-admin', DFW_PL_PLUGIN_URL . 'admin/css/styles.css', array(), DFW_PL_VERSION, 'all' );
		}
	}
} // end Admin_CSS