<?php
/**
 * Fulcrum Creatives Functionality Plugin
 * 
 * @package     FCWP
 * @copyright   Copyright (c) 2014, Fulcrum Creatives
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Fulcrum Creatives <info@fulcrumcreatives>
 *
 * @wordpress-plugin
 * Plugin Name:       Functionality Plugin
 * Plugin URI:        https://github.com/
 * Description:       Custom Functionality for Company Name
 * Version:           0.0.1
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Fulcrum-Creatives/fc-wp-framework
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'FCWP_Custome_Functionality' ) ) {
	class FCWP_Custome_Functionality {
		
		/**
		 * Instance of the class
		 *
		 * @since 0.0.1
		 * @var Instance of FCWP_Custome_Functionality class
		 */
		private static $instance;

		/**
		 * Instance of the plugin
		 *
		 * @since 0.0.1
		 * @static
		 * @staticvar array $instance
		 * @return Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof FCWP_Custome_Functionality ) ) {
				self::$instance = new FCWP_Custome_Functionality;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				//register_activation_hook( __FILE__, array( 'FCWP_Register_Post_Type', 'flush_rewrite_rules' ) );
				self::$instance->admin_init = new FCWP_Admin_Init();
				self::$instance->init = new FCWP_Init();
			}
		return self::$instance;
		}

		/**
		 * Define the plugin constants
		 *
		 * @since  0.0.1
		 * @access private
		 * @return voide
		 */
		private function define_constants() {
			// Plugin Version
			if ( ! defined( 'FCWP_PL_VERSION' ) ) {
				define( 'FCWP_PL_VERSION', '0.0.1' );
			}
			// Prefix
			if ( ! defined( 'FCWP_PL_PREFIX' ) ) {
				define( 'FCWP_PL_PREFIX', 'custom' );
			}
			// Textdomain
			if ( ! defined( 'FCWP_PL_TEXTDOMAIN' ) ) {
				define( 'FCWP_PL_TEXTDOMAIN', 'custom' );
			}
			// Plugin Options
			if ( ! defined( 'FCWP_PL_OPTIONS' ) ) {
				define( 'FCWP_PL_OPTIONS', 'custom-options' );
			}
			// Plugin Directory
			if ( ! defined( 'FCWP_PL_PLUGIN_DIR' ) ) {
				define( 'FCWP_PL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'FCWP_PL_PLUGIN_URL' ) ) {
				define( 'FCWP_PL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'FCWP_PL_PLUGIN_FILE' ) ) {
				define( 'FCWP_PL_PLUGIN_FILE', __FILE__ );
			}
		}

		/**
		 * Load the required files
		 *
		 * @since  0.0.1
		 * @access private
		 * @return void
		 */
		private function includes() {
			$includes_path = plugin_dir_path( __FILE__ ) . 'includes/';
			// admin classes
			require_once FCWP_PL_PLUGIN_DIR . 'admin/classes/class-fcwp-rename-post.php';
			require_once FCWP_PL_PLUGIN_DIR . 'admin/classes/class-fcwp-admin-css.php';
			require_once FCWP_PL_PLUGIN_DIR . 'admin/classes/class-fcwp-remove-admin-bar-link.php';
			require_once FCWP_PL_PLUGIN_DIR . 'admin/classes/class-fcwp-add-admin-bar-link.php';
			require_once FCWP_PL_PLUGIN_DIR . 'admin/classes/class-fcwp-add-menu-items.php';
			// admin init
			require_once FCWP_PL_PLUGIN_DIR . 'admin/class-fcwp-admin-init.php';
			// includes classes
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-pagination.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-svg-fallback.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-custom-excerpt.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-add-mime.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-archive-title.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-page-title.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-acf-get-fields.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-public-js.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/classes/class-fcwp-public-css.php';
			// includes init
			require_once FCWP_PL_PLUGIN_DIR . 'includes/general-functions.php';
			require_once FCWP_PL_PLUGIN_DIR . 'includes/class-fcwp-init.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  0.0.1
		 * @access public
		 */
		public function load_textdomain() {
			$custom_lang_dir = dirname( plugin_basename( FCWP_PL_PLUGIN_FILE ) ) . '/languages/';
			$custom_lang_dir = apply_filters( 'custom_lang_dir', $custom_lang_dir );
			$locale = apply_filters( 'plugin_locale',  get_locale(), FCWP_PL_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', FCWP_PL_TEXTDOMAIN, $locale );
			$mofile_local  = $custom_lang_dir . $mofile;
			if ( file_exists( $mofile_local ) ) {
				load_textdomain( FCWP_PL_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( FCWP_PL_TEXTDOMAIN, false, $custom_lang_dir );
			}
		}

		/**
		 * Throw error on object clone
		 *
		 * @since  0.0.1
		 * @access public
		 * @return void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', FCWP_PL_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  0.0.1
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', FCWP_PL_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance 
 *
 * @since 0.0.1
 * @return object The Safety Links instance
 */
function FCWP_Run() {
	return FCWP_Custome_Functionality::instance();
}
FCWP_Run();