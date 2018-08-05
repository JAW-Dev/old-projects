<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://fulcrumcreatives.com
 * @since             1.0.0
 * @package           Kaleido
 *
 * @wordpress-plugin
 * Plugin Name:       Kaleidoscope Custom Functionality
 * Plugin URI:        www.kaleidoscopeinc.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kaleido
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kaleido-activator.php
 */
function activate_kaleido() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kaleido-activator.php';
	Kaleido_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kaleido-deactivator.php
 */
function deactivate_kaleido() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kaleido-deactivator.php';
	Kaleido_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kaleido' );
register_deactivation_hook( __FILE__, 'deactivate_kaleido' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-kaleido.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kaleido() {

	$plugin = new Kaleido();
	$plugin->run();

}
run_kaleido();
