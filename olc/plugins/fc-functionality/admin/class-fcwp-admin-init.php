<?php
/**
 * Admin Init
 *
 * @package     FCWP
 * @subpackage  FCWP/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Admin_Init' ) ) {
	class FCWP_Admin_Init {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			$this->admin_css();
			$this->add_admin_bar_link();
			$this->remove_admin_bar_link();
			$this->add_menu_items();
		}

		/**
     * Load the admin CSS
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
		protected function admin_css() {
			new FCWP_Admin_CSS();
		}

		/**
     * Add custom admin bar links
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
		protected function add_admin_bar_link() {
			new FCWP_Add_Admin_Bar_Link();
		}

		/**
     * Remove custom admin bar links
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
		protected function remove_admin_bar_link() {
			new FCWP_Remove_Admin_Bar_Link();
		}

		/**
     * Add menu items
     *
     * @since 0.0.1
     * @access protected
     * @return void
     */
		protected function add_menu_items() {
			new FCWP_Add_Menu_Items();
		}
	}
}