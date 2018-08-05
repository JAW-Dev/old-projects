<?php
/**
 * Plugin Name: Benefactor Group Custom Shortcodes
 * Plugin URI:  https://benefactorgroup.com
 * Description: Custom Shortcodes
 * Version:     1.0.0
 * Author:      Fulcrum Creatives
 * Author URI:  https://www.fulcrumcreatives.com
 * License:     GPLv2
 * Text Domain: benesh
 * Domain Path: /languages
 *
 * @package   Bene_Shortcodes
 * @author    Fulcrum Creatives <jason@fulcrumcreatives.com>
 * @copyright Copyright (c) 2017, Fulcrum Creatives
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

namespace Bene_Shortcodes;

use Bene_Shortcodes\Includes\Classes as Classes;

// ==============================================
// Autoloader
// ==============================================
require_once trailingslashit( plugin_dir_path( __FILE__ ) ) . trailingslashit( 'includes' ) . 'autoload.php';

if ( ! class_exists( 'BeneShortcodes' ) ) {

	/**
	 * Name
	 *
	 * @author Fulcrum Creatives
	 * @since  1.0.0
	 */
	class BeneShortcodes {

		/**
		 * Singleton instance of plugin.
		 *
		 * @var   BeneShortcodes
		 * @since 1.0.0
		 */
		protected static $single_instance = null;

		/**
		 * Creates or returns an instance of this class.
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @return A single instance of this class.
		 */
		public static function get_instance() {
			if ( null === self::$single_instance ) {
				self::$single_instance = new self();
			}

			return self::$single_instance;
		}

		/**
		 * Initialize the class
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function __construct() {

		}

		/**
		 * Init
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function init() {

			// Load translated strings for plugin.
			load_plugin_textdomain( 'benesh', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

			// Load Classes.
			$this->classes();
		}

		/**
		 * Classes.
		 *
		 * @author Jason Witt
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function classes() {
			$post_wrapper = new Classes\Shortcode_Post_Wrapper;
		}

		/**
		 * Activate the plugin.
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function _activate() {

			flush_rewrite_rules();
		}

		/**
		 * Deactivate the plugin.
		 * Uninstall routines should be in uninstall.php.
		 *
		 * @author Fulcrum Creatives
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function _deactivate() {

		}
	}
}

/**
 * Return an instance of the plugin class.
 *
 * @author Fulcrum Creatives
 * @since  1.0.0
 *
 * @return Singleton instance of plugin class.
 */
function bene_shortcodes() {
	return BeneShortcodes::get_instance();
}
add_action( 'plugins_loaded', array( bene_shortcodes(), 'init' ) );

// ==============================================
// Activation
// ==============================================
register_activation_hook( __FILE__, array( bene_shortcodes(), '_activate' ) );

// ==============================================
// Deactivation
// ==============================================
register_deactivation_hook( __FILE__, array( bene_shortcodes(), '_deactivate' ) );
