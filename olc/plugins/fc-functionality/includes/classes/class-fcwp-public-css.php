<?php
/**
 * Load admin CSS
 *
 * @package     FCWP
 * @subpackage  FCWP/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Public_CSS' ) ) {
	class FCWP_Public_CSS {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() { 
			add_action( 'wp_enqueue_scripts', array( $this, 'load_public_css' ) );
		}

		public function load_public_css() {
			wp_enqueue_style( FCWP_PL_PREFIX . '-public', FCWP_PL_PLUGIN_URL . 'includes/css/public.css', array(), FCWP_PL_VERSION, 'all' );
		}
	}
}