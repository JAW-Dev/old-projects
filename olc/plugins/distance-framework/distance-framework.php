<?php
namespace Distance_Framework;
use Distance_Framework\Helpers as Helpers;
/**
 *
 * @todo Add Distance Email address
 *       Add Plugin URI
 *
 * Distance Framework
 *
 * @package     DFW
 * @copyright   Copyright (c) 2014, Fulcrum Creatives
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Fulcrum Creatives <TODO>
 *
 * @wordpress-plugin
 * Plugin Name:       Distance Framework
 * Plugin URI:        TODO
 * Description:       A Framework for Custom WordPress Themes
 * Version:           1.3.0
 * Author:            Fulcrum Creatives
 * Author URI:        Author URL
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dfw
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/jawittdesigns/distance-framework
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
  die;
}
if( !class_exists( 'DFW' ) ) {
  class DFW {

	/**
	 * Instance of the class
	 *
	 * @since 0.0.1
	 * @var Instance of DFW class
	 */
	private static $instance;

	/**
	 * Instance of the plugin
	 *
	 * @since 0.0.1
	 * @static
	 * @staticvar array
	 * @return Instance
	 */
	public static function instance() {
	  if ( !isset( self::$instance ) && ! ( self::$instance instanceof DFW ) ) {
		self::$instance = new DFW;
		self::$instance->define_constants();
		add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		self::$instance->includes();
		self::$instance->admin_init = new \Distance_Framework\Admin\Admin_Init();
		self::$instance->init = new \Distance_Framework\Includes\Init();
	  }
	return self::$instance;
	}

	/**
	 * Define the plugin constants
	 *
	 * @since  0.0.1
	 * @access private
	 * @return void
	 */
	private function define_constants() {
	  // Plugin Version
	  if ( !defined( 'DFW_PL_VERSION' ) ) {
		define( 'DFW_PL_VERSION', '1.3.0' );
	  }
	  // Prefix
	  if ( !defined( 'DFW_PL_PREFIX' ) ) {
		define( 'DFW_PL_PREFIX', 'dfw' );
	  }
	  // Plugin Directory
	  if ( !defined( 'DFW_PL_PLUGIN_DIR' ) ) {
		define( 'DFW_PL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	  }
	  // Plugin URL
	  if ( !defined( 'DFW_PL_PLUGIN_URL' ) ) {
		define( 'DFW_PL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	  }
	  // Plugin Root File
	  if ( !defined( 'DFW_PL_PLUGIN_FILE' ) ) {
		define( 'DFW_PL_PLUGIN_FILE', __FILE__ );
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
	  // autoloader
	  require_once DFW_PL_PLUGIN_DIR . 'helpers/class-autoloader.php';
	  // helpers
	  Helpers\dfw_autoloader( 'helpers/classes' );
	  // admin classes
	  Helpers\dfw_autoloader( 'admin/classes' );
	  // admin init
	  require_once DFW_PL_PLUGIN_DIR . 'admin/class-admin-init.php';
	  // includes classes
	  Helpers\dfw_autoloader( 'includes/classes' );
	  // includes init
	  require_once DFW_PL_PLUGIN_DIR . 'includes/class-init.php';
	  // Template functions
	  require_once DFW_PL_PLUGIN_DIR . 'helpers/template-functions.php';
	  // Vendor
	  require_once DFW_PL_PLUGIN_DIR . 'vendor/vendor.php';
	  // Activation
	  require_once DFW_PL_PLUGIN_DIR . 'activation.php';
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since  0.0.1
	 * @access public
	 */
	public function load_textdomain() {
	  $dfw_lang_dir = dirname( plugin_basename( DFW_PL_PLUGIN_FILE ) ) . '/languages/';
	  $dfw_lang_dir = apply_filters( 'dfw_lang_dir', $dfw_lang_dir );
	  $locale = apply_filters( 'plugin_locale',  get_locale(), 'dfw' );
	  $mofile = sprintf( '%1-%2.mo', 'dfw', $locale );
	  $mofile_local  = $dfw_lang_dir . $mofile;
	  if ( file_exists( $mofile_local ) ) {
		load_textdomain( 'dfw', $mofile_local );
	  } else {
		load_plugin_textdomain( 'dfw', false, $dfw_lang_dir );
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
	  _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'dfw' ), '1.6' );
	}

	/**
	 * Disable unserializing of the class
	 *
	 * @since  0.0.1
	 * @access public
	 * @return void
	 */
	public function __wakeup() {
	  _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'dfw' ), '1.6' );
	}

  }
} // end DFW
/**
 * Return the instance
 *
 * @since 0.0.1
 * @return object The Safety Links instance
 */
function DFW_Run() {
  return DFW::instance();
} // end DFW_Run
DFW_Run();
