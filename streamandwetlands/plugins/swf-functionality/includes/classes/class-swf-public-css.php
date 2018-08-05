<?php
/**
 * Load admin CSS
 *
 * @package     SWF
 * @subpackage  SWF/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'SWF_Public_CSS' ) ) {
	class SWF_Public_CSS {

		/**
		 * Initialize the class
		 *
		 * @since 1.0.0
		 */
		public function __construct() { 
			add_action( 'wp_enqueue_scripts', array( $this, 'load_public_css' ) );
		}

		public function load_public_css() {
			wp_enqueue_style( CUSTOM_PREFIX . '-public', CUSTOM_PLUGIN_URL . 'includes/css/public.css', array(), CUSTOM_VERSION, 'all' );
		}
	}
}