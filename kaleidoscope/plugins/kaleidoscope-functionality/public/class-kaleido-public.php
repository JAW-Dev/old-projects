<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://fulcrumcreatives.com
 * @since      1.0.0
 *
 * @package    Kaleido
 * @subpackage Kaleido/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Kaleido
 * @subpackage Kaleido/public
 * @author     Fulcrum Creatives <info@fulcrumcreatives.com>
 */
class Kaleido_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $kaleido    The ID of this plugin.
	 */
	private $kaleido;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string    $kaleido       The name of the plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $kaleido, $version ) {

		$this->kaleido = $kaleido;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Kaleido_Public_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kaleido_Public_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->kaleido, plugin_dir_url( __FILE__ ) . 'css/kaleido-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Kaleido_Public_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kaleido_Public_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->kaleido, plugin_dir_url( __FILE__ ) . 'js/kaleido-public.js', array( 'jquery' ), $this->version, false );

	}

}
