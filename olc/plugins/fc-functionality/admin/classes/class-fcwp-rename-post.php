<?php
/**
 * Rename Post
 *
 * @package     FCWP
 * @subpackage  FCWP/Admin
 * @since       0.0.1
 */

if( !class_exists( 'FCWP_Rename_Post' ) ) {
	class FCWP_Rename_Post {

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
		 * @since 0.0.1
		 * @param string $name the name of the menu item
		 * @param string $plural the plural of the menu item
		 */
		public function __construct( $name, $plural = '' ) {
			$this->name   = ucwords( str_replace( array( ' ', '-' ), '_', $name ) );
	    $this->plural = ( !empty( $plural ) ? strtolower( ucwords( str_replace( array( ' ', '-' ), '_', $plural ) ) ) : $this->name );
			add_action( 'admin_menu', array( $this, 'post_label' ) );
			add_action( 'init', array( $this, 'post_object' ) );
		} // end __construct

		/**
		 * Change the name in the submenu for the Posts labels
		 *
		 * @since 0.0.1
		 * @access public
		 * @return void
		 */
		public function post_label() {
			global 	$menu, 
							$submenu;
			$label      = ucwords( str_replace( '_', ' ', $this->name ) );
			$label_sub  = $label;
			$label_sub  = ( !empty( $this->plural ) ) ? ucwords( str_replace( '_', ' ', $this->plural ) ) : $label;
			$menu[5][0] = $this->name;
			$submenu['edit.php'][5][0] = 'All ' . $label_sub;
			$submenu['edit.php'][10][0] = 'Add New ' . $this->name;
		} // end post_label

		/**
		 * Post Object
		 *
		 * @since 0.0.1
		 * @return void
		 */
		public function post_object() {
			global $wp_post_types;
			$label                      = ucwords( str_replace( '_', ' ', $this->name ) );
			$label_sub                  = ( !empty( $this->plural ) ) ? ucwords( str_replace( '_', ' ', $this->plural ) ) : $label;
			$labels                     = &$wp_post_types['post']->labels;
			$labels->name               = $label;
			$labels->singular_name      = $label;
			$labels->add_new            = 'Add ' . $label;
			$labels->add_new_item       = 'Add ' . $label;
			$labels->edit_item          = 'Edit ' . $label;
			$labels->new_item           = $label;
			$labels->view_item          = 'View ' . $label;
			$labels->search_items       = 'Search ' . $label_sub;
			$labels->not_found          = 'No ' . $label_sub . ' found';
			$labels->not_found_in_trash = 'No ' . $label_sub . ' found in Trash';
			$labels->all_items          = 'All ' . $label_sub;
			$labels->menu_name          = $label_sub;
			$labels->name_admin_bar     = $label_sub;
		} // end post_object
	}
} // end FCWP_Rename_Post

/**
 * Rename Pst
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'fcwp_rename_post') ) {
  function fcwp_rename_post( $name, $plural = '' ) {
  	$fcwp_rename_post = new FCWP_Rename_Post( $name, $plural );
  }
} // end fcwp_rename_post