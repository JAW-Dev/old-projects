<?php
/**
 * SWF Functionality plugin
 * 
 * @package     SWF
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 *
 * @wordpress-plugin
 * Plugin Name:       Stream & Wetlands Foundation Custom Functionality
 * Plugin URI:        https://github.com/
 * Description:       Stream & Wetlands Foundation Custom Functionality
 * Version:           1.0.0
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       swf
 * Domain Path:       /languages
 * GitHub Plugin URI: 
 * GitHub Branch:     
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'SWF' ) ) {
	class SWF {
		
		/**
		 * Instance of the class
		 *
		 * @since 1.0.0
		 * @var Instance of SWF class
		 */
		private static $instance;

		/**
		 * Instance of the plugin
		 *
		 * @since 1.0.0
		 * @static
		 * @staticvar array $instance
		 * @return Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof SWF ) ) {
				self::$instance = new SWF;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				register_activation_hook( __FILE__, array( 'SWF_Register_Post_Type', 'flush_rewrite_rules' ) );
				self::$instance->admin_init = new SWF_Admin_Init();
				self::$instance->init = new SWF_Init();
			}
		return self::$instance;
		}

		/**
		 * Define the plugin constants
		 *
		 * @since  1.0.0
		 * @access private
		 * @return voide
		 */
		private function define_constants() {
			// Plugin Version
			if ( ! defined( 'CUSTOM_VERSION' ) ) {
				define( 'CUSTOM_VERSION', '1.0.0' );
			}
			// Prefix
			if ( ! defined( 'CUSTOM_PREFIX' ) ) {
				define( 'CUSTOM_PREFIX', 'swf' );
			}
			// Textdomain
			if ( ! defined( 'CUSTOM_TEXTDOMAIN' ) ) {
				define( 'CUSTOM_TEXTDOMAIN', 'swf' );
			}
			// Plugin Options
			if ( ! defined( 'CUSTOM_OPTIONS' ) ) {
				define( 'CUSTOM_OPTIONS', 'swf-options' );
			}
			// Plugin Directory
			if ( ! defined( 'CUSTOM_PLUGIN_DIR' ) ) {
				define( 'CUSTOM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'CUSTOM_PLUGIN_URL' ) ) {
				define( 'CUSTOM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'CUSTOM_PLUGIN_FILE' ) ) {
				define( 'CUSTOM_PLUGIN_FILE', __FILE__ );
			}
		}

		/**
		 * Load the required files
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function includes() {
			$includes_path = plugin_dir_path( __FILE__ ) . 'includes/';

			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-swf-admin-css.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-swf-remove-admin-bar-link.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/classes/class-swf-add-admin-bar-link.php';
			require_once CUSTOM_PLUGIN_DIR . 'admin/class-swf-admin-init.php';

			require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-swf-public-css.php';
			require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-swf-register-post-type.php';
			require_once CUSTOM_PLUGIN_DIR . 'includes/classes/class-swf-register-taxonomies.php';
			require_once CUSTOM_PLUGIN_DIR . 'includes/class-swf-init.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function load_textdomain() {
			$swf_lang_dir = dirname( plugin_basename( CUSTOM_PLUGIN_FILE ) ) . '/languages/';
			$swf_lang_dir = apply_filters( 'swf_lang_dir', $swf_lang_dir );
			$locale = apply_filters( 'plugin_locale',  get_locale(), CUSTOM_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', CUSTOM_TEXTDOMAIN, $locale );
			$mofile_local  = $swf_lang_dir . $mofile;
			if ( file_exists( $mofile_local ) ) {
				load_textdomain( CUSTOM_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( CUSTOM_TEXTDOMAIN, false, $swf_lang_dir );
			}
		}

		/**
		 * Throw error on object clone
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', CUSTOM_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', CUSTOM_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance 
 *
 * @since 1.0.0
 * @return object The Safety Links instance
 */
function SWF_Run() {
	return SWF::instance();
}
SWF_Run();
