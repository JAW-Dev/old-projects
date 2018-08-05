<?php
/**
 * Load admin CSS
 *
 * @package     FCWP
 * @subpackage  FCWP/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Admin_CSS' ) ) {
	class FCWP_Admin_CSS {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() { 
			add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_css' ) );
		}

		public function load_admin_css() {
			wp_enqueue_style( FCWP_PL_PREFIX . '-admin', FCWP_PL_PLUGIN_URL . 'admin/css/admin.css', array(), FCWP_PL_VERSION, 'all' );
		}
	}
}