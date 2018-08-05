<?php
namespace Distance_Framework\Admin\Classes;
/**
 * Rename Posts
 *
 * @package     DFW
 * @subpackage  DFW/Admin
 * @since       0.0.21
 */

if( !class_exists( 'Rename_Posts' ) ) {
	class Rename_Posts {

		/**
     * Arguments
     *
     * @since  0.0.21
     * @var    array $args the arguments
     */
    public $args;

		/**
		 * Initialize the class
		 *
		 * @since 0.0.21
		 */
		public function __construct( $args = array() ) {
			$this->args = $args;
			$this->defaults();
			$this->format();
			if( $this->args['change'] == 1 ) {
				if( is_admin() ) {
					add_action( 'admin_menu', array( $this, 'post_label' ) );
					add_action( 'admin_init', array( $this, 'post_object' ) );
				}
			}
			if( $this->args['taxes'] == 1 ) {
				add_action( 'init',  array( $this, 'remove_default_taxonomies') );
			}
		} // end __construct

		/**
		 * The class defaults
		 * 
		 * @since 0.0.21
     * @access private
     * @return void
		 */
		private function defaults() {
			$defaults = array(
				'change' => dfw_get_meta( DFW_PL_PREFIX . '_change_posts_post_type', '', true, false ),
				'name'   => dfw_get_meta( DFW_PL_PREFIX . '_posts_singular_name', '', true, false ),
				'plural' => dfw_get_meta( DFW_PL_PREFIX . '_posts_plural_name', '', true, false ),
				'taxes'  => dfw_get_meta( DFW_PL_PREFIX . '_remove_default_taxes', '', true, false ),
			);
	    $this->args = array_merge( $defaults, $this->args );
		} // end defaults

		/**
		 * Format
		 *
		 * @since      Version
		 * @return     Return
		 */
		public function format() {
			$this->args['name'] = ucwords( str_replace( array( ' ', '-' ), '_', $this->args['name'] ) );
			$this->args['plural'] = ( !empty( $this->args['plural'] ) ? strtolower( ucwords( str_replace( array( ' ', '-' ), '_', $this->args['plural'] ) ) ) : $this->args['name'] );
		} // end format

		/**
		 * Change the name in the submenu for the Posts labels
		 *
		 * @since 1.1.6
		 * @access public
		 * @return void
		 */
		public function post_label() {
			global 	$menu, 
							$submenu;
			$label      = ucwords( str_replace( '_', ' ',  $this->args['name'] ) );
			$label_sub  = ( !empty( $this->args['plural'] ) ) ? ucwords( str_replace( '_', ' ', $this->args['plural'] ) ) : $label;
			$menu[5][0] =  $label_sub;
			$submenu['edit.php'][5][0] = 'All ' . $label_sub;
			$submenu['edit.php'][10][0] = 'Add New ' .  $label;
		} // end post_label

		/**
		 * Post Object
		 *
		 * @since 1.1.6
		 * @return void
		 */
		public function post_object() {
			global $wp_post_types;
			$label                      = ucwords( str_replace( '_', ' ',  $this->args['name'] ) );
			$label_sub                  = ( !empty( $this->args['plural'] ) ) ? ucwords( str_replace( '_', ' ', $this->args['plural'] ) ) : $label;
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

		/**
		 * Remove Default Taxonomies
		 *
		 * @since      1.1.5
		 * @return     void
		 */
		public function remove_default_taxonomies() {
			global $wp_taxonomies;
			$taxonomies = array( 'category', 'post_tag' );
			foreach( $taxonomies as $taxonomy ) {
				if ( taxonomy_exists( $taxonomy) )
				unset( $wp_taxonomies[$taxonomy] );
			}
		} // end remove_default_taxonomies
	}
} // end Rename_Posts