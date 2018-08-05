<?php
/**
 * Load admin CSS
 *
 * @package     SWF
 * @subpackage  SWF/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'SWF_Admin_CSS' ) ) {
	class SWF_Admin_CSS {

		/**
		 * Initialize the class
		 *
		 * @since 1.0.0
		 */
		public function __construct() { 
			add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_css' ) );
		}

		public function load_admin_css() {
			wp_enqueue_style( CUSTOM_PREFIX . '-admin', CUSTOM_PLUGIN_URL . 'admin/css/admin.css', array(), CUSTOM_VERSION, 'all' );
		}
	}
}