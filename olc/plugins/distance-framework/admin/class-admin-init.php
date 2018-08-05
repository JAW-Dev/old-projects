<?php
namespace Distance_Framework\Admin;
use Distance_Framework\Admin\Classes as Admin;
/**
 * Admin Init
 *
 * @package    DFW
 * @subpackage DFW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Admin_Init' ) ) {
  class Admin_Init {

	/**
	 * Initialize the class
	 *
	 * @since 0.0.1
	 */
	public function __construct() {
	  add_action( 'init', array( $this, 'add_settings' ) );
	  $this->admin_styles();
	  $this->admin_scripts();
	  $this->add_menu_items();
	  $this->gf_deafults();
	  $this->add_admin_bar_item();
	  $this->rename_posts();
	  $this->move_seo_box();
	  add_action( 'wp_loaded', array( $this, 'import_support_form' ) );
	} // end __construct

	/**
	 * Move Yoast SEO to Bottom
	 *
	 * @since      1.1.0
	 * @return     void
	 */
	public function move_seo_box() {
	  add_filter( 'wpseo_metabox_prio', function() { return 'low'; });
	} // end move_seo_box

	/**
	 * Include Settings
	 *
	 * @since      1.0.3
	 * @return     void
	 */
	public function add_settings() {
	  require_once DFW_PL_PLUGIN_DIR . 'admin/settings/settings.php';
	} // end add_settings

	/**
	 * Admin Styles
	 *
	 * @since      0.0.1
	 * @return     void
	 */
	protected function admin_styles() {
	  new Admin\Admin_CSS();
	} // end admin_styles

	/**
	 * Admin Scripts
	 *
	 * @since      0.0.1
	 * @return     void
	 */
	protected function admin_scripts() {
	  new Admin\Admin_JS();
	} // end admin_scripts

	/**
	 * Add menu items
	 *
	 * @since 0.0.1
	 * @access protected
	 * @return void
	 */
	protected function add_menu_items() {
	  new Admin\Add_Menu_Items();
	}

	/**
	 * Import Support Form
	 *
	 * @since      0.0.15
	 * @return     void
	 */
	public function import_support_form() {
	  dfw_import_gf_form( 'Support Form', DFW_PL_PLUGIN_DIR . 'admin/views/support-form.json');
	} // end import_support_form

	/**
	 * Gravityforms Defaults
	 *
	 * @since      0.0.15
	 * @return     void
	 */
	protected function gf_deafults() {
	  new Admin\GF_Forms_Defaults();
	} // end gf_deafults

	/**
	 * Add Admin Bar Item
	 *
	 * @since      0.0.15
	 * @return     void
	 */
	protected function add_admin_bar_item() {
	  $fulcrum = array(
		'id'     => 'fulcrum-link',
		'title'  => 'Fulcrum Creatives',
		'href'   => 'http://fulcrumcreatives.com',
		'meta'   => array(
		  'class'  => 'fulcrum-link',
		  'target'   => '_blank',
		)
	  );
	  if( is_admin() ) {
		dfw_add_admin_bar_item( $fulcrum, 40 );
	  }
	  $tutorials = array(
		'id'     => 'tutorials-link',
		'title'  => 'Tutorials',
		'parent' => 'fulcrum-link',
		'href'   => home_url() . '/wp-admin/admin.php?page=dfw_tutorials',
	  );
	  if( is_admin() ) {
		dfw_add_admin_bar_item( $tutorials, 40 );
	  }
	  /*$support = array(
		'id'     => 'support-link',
		'title'  => 'Support',
		'parent' => 'fulcrum-link',
		'href'   => home_url() . '/wp-admin/admin.php?page=dfw_support',
	  );
	  if( is_admin() ) {
		dfw_add_admin_bar_item( $support, 40 );
	  }*/
	} // end add_admin_bar_item

	/**
	 * Rename Posts
	 *
	 * @since      0.0.21
	 * @return     void
	 */
	protected function rename_posts() {
	 // new Admin\Rename_Posts($args = array() );
	} // end change_posts
  }
} // end Admin_Init
