<?php
namespace Distance_Framework\Admin\Classes;
/**
 * Add Admin Bar Item
 *
 * @package    DFW
 * @subpackage DFW/Admin/Classes
 * @since      0.0.15
 */

if( !class_exists( 'Add_Admin_Bar_Item' ) ) {
  class Add_Admin_Bar_Item {

    /**
     * Args
     *
     * @since  0.0.15
     * @var    array $args the menu item arguments  
     */
    public $args;

    /**
     * Initialize the class
     *
     * @since 0.0.15
     */
    public function __construct( $args = array(), $priority = 999 ) {
      $this->args = $args;
      add_action( 'admin_bar_menu', array( $this, 'add_link' ), $priority  );
    } // end __construct

    /**
     * Add Link
     *
     * @since      1.1.2
     * @return     void
     */
    public function add_link( $wp_admin_bar ) {
      $wp_admin_bar->add_node( $this->args );
    } // end add_link

  }
} // end Add_Admin_Bar_Item