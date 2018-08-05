<?php
/**
 * Change the default Posts Menu item
 *
 * @package     SWF
 * @subpackage  SWF/Admin
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'SWF_Rename_Post' ) ) {
	class SWF_Rename_Post {

		/**
		 * The new name for Posts
		 * 
		 * @var string
		 */
		public $name;
		
		/**
	     * Plural Version of name
	     *
	     * @var string
	     */
	    public $plural;

		/**
		 * Initialize the class
		 *
		 * @since 1.0.0
		 * @param string $name the name of the menu item
		 * @param string $plural the plural of the menu item
		 */
		public function __construct( $name, $plural = '' ) {
			$this->name   = strtolower( ucwords( str_replace( array( ' ', '-' ), '_', $name ) ) );
	        $this->plural = ( !empty( $plural ) ? strtolower( ucwords( str_replace( array( ' ', '-' ), '_', $plural ) ) ) : $this->name ) );
			add_action( 'admin_menu', array( $this, 'post_label' ) );
			add_action( 'init', array( $this, 'post_object' ) );
		}

		/**
		 * Change the name in the submenu for the Posts labels
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function post_label() {
		    global 	$menu, 
		    		$submenu;
		    // Capitalize the words and replace underscores with spaces
			$label = ucwords( str_replace( '_', ' ', $this->name ) );
			$label_sub = $label;
			// If plural argument is set
			$label_sub = ( !empty( $this->plural ) ) ? ucwords( str_replace( '_', ' ', $this->plural ) ) : $label;
			// Rename the top level menu item
		    $menu[5][0] = $this->name;
		    // Rename the submenu menu items
		    $submenu['edit.php'][5][0] = 'All ' . $label_sub;
		    $submenu['edit.php'][10][0] = 'Add New ' . $this->name;
		}

		/**
		 * Change the name for the Posts object
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function post_object() {
		    global $wp_post_types;
		    $label = ucwords( str_replace( '_', ' ', $this->name ) );
		    // If plural argument is set
	        $label_sub = ( !empty( $this->plural ) ) ? ucwords( str_replace( '_', ' ', $this->plural ) ) : $label;
	        // Get the labels for Posts
		    $labels = &$wp_post_types['post']->labels;
		    // Rename the labels on the post type page
		    $labels->name = $label;
		    $labels->singular_name = $label;
		    $labels->add_new = 'Add ' . $label;
		    $labels->add_new_item = 'Add ' . $label;
		    $labels->edit_item = 'Edit ' . $label;
		    $labels->new_item = $label;
		    $labels->view_item = 'View ' . $label;
		    $labels->search_items = 'Search ' . $label_sub;
		    $labels->not_found = 'No ' . $label_sub . ' found';
		    $labels->not_found_in_trash = 'No ' . $label_sub . ' found in Trash';
		    $labels->all_items = 'All ' . $label_sub;
		    $labels->menu_name = $label_sub;
		    // Rename the Admin Bar label
		    $labels->name_admin_bar = $label_sub;
		}
	}
}