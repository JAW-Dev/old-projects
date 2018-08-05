<?php
/**
 * Add custom admin bar links
 *
 * example:
 * 		$new_link = new FCWP_Add_Admin_Bar_Link( array(
 * 			'id'     => false, //The ID of the node
 * 			'title'  => false, // The text that will be visible in the Toolbar
 * 			'parent' => false, // The ID of the parent node
 * 			'href'   => false, // The 'href' attribute for the link
 * 			'group'  => false, // This will make the node a group (node) if set to 'true'. Group nodes are not visible in the Toolbar, but nodes added to it are
 * 			'meta'   => array(
 * 					'html'     => '', // The html used for the node
 * 				 	'class'    => '', //The class attribute for the list item containing the link or text node.
 * 				  	'rel'      => '', // The rel attribute
 * 				 	'onclick'  => '', // The onclick attribute for the link. This will only be set if the 'href' argument is present.
 * 				  	'target'   => '', // The target attribute for the link. This will only be set if the 'href' argument is present.
 * 				   	'title'    => '', // The title attribute. Will be set to the link or to a div containing a text node.
 * 				    'tabindex' => ''  // The tabindex attribute. Will be set to the link or to a div containing a text node.
 * 			 	)
 * 		 	) 
 * 		);
 *
 * @package     FCWP
 * @subpackage  FCWP/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Add_Admin_Bar_Link' ) ) {
	class FCWP_Add_Admin_Bar_Link {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'admin_bar_menu', array( $this, 'add_fulcrum_link' ), 999 );
		}

		/**
     * Add custom admin bar links
     *
     * @since 0.0.1
     * @access public
     * @return void
     */
		public function add_fulcrum_link( $wp_admin_bar ) {
			$args = array(
				array(
					'id'     => 'fulcrum-link',
					'title'  => 'Fulcrum Creatives',
					'href'   => 'http://fulcrumcreatives.com',
					'meta'   => array(
						'class'  => 'fulcrum-link',
						'target'   => '_blank',
					)
				)
			);
			foreach( $args as $key => $value ) {
				$wp_admin_bar->add_node( $value );
			}
		}
	}
}