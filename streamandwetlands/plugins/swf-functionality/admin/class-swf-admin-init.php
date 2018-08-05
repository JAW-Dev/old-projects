<?php
/**
 * Admin Init
 *
 * @package     SWF
 * @subpackage  SWF/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'SWF_Admin_Init' ) ) {
	class SWF_Admin_Init {

		/**
		 * Initialize the class
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			$this->admin_css();
			$this->add_admin_bar_link();
			$this->remove_admin_bar_link();
			//$this->add_menu_items();
		}

		/**
     * Load the admin CSS
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
		protected function admin_css() {
			new SWF_Admin_CSS();
		}

		/**
     * Add custom admin bar links
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
		protected function add_admin_bar_link() {
			new SWF_Add_Admin_Bar_Link();
		}

		/**
     * Remove custom admin bar links
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
		protected function remove_admin_bar_link() {
			new SWF_Remove_Admin_Bar_Link();
		}
		

		/**
     * Add menu items
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
		protected function add_menu_items() {
			//new SWF_Add_Menu_Items();
		}
	}
}