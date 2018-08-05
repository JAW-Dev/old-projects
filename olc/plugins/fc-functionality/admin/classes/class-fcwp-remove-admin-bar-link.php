<?php
/**
 * Remove admin bar links
 *
 * wp-logo: WordPress logo
 * my-account: Links to your account. The ID depends upon if you have avatar enabled or not.
 * site-name: Site name with other dashboard items
 * my-sites : My Sites menu, if you have more than one site
 * get-shortlink : Shortlink to a page/post
 * edit : Post/Page/Category/Tag edit link
 * new-content : Add New menu
 * comments : Comments link
 * updates : Updates link
 * search: Search box
 *
 * @package     FCWP
 * @subpackage  FCWP/admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Remove_Admin_Bar_Link' ) ) {
	class FCWP_Remove_Admin_Bar_Link {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'wp_before_admin_bar_render', array( $this, 'remove_admin_bar_link' ) );
		}

		/**
         * Remove custom admin bar links
         *
         * @since 0.0.1
         * @access public
         * @return void
         */
		public function remove_admin_bar_link() {
			global $wp_admin_bar;
			$args = array(
				'wp-logo'
			);
			foreach( $args as $arg ) {
				$wp_admin_bar->remove_menu( $arg );
			}
			
		}
	}
}