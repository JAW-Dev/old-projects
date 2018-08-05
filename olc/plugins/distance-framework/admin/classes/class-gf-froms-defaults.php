<?php
namespace Distance_Framework\Admin\Classes;
/**
 * Gravirtforms Defaults
 *
 * @package    DFW
 * @subpackage DFE/Admin/Claases
 * @since      0.0.15
 */

if( !class_exists( 'GF_Forms_Defaults' ) ) {
  class GF_Forms_Defaults {

	/**
	 * Initialize the class
	 *
	 * @since 0.0.15
	 */
	public function __construct() {
	  if ( ! file_exists( ABSPATH . 'wp-includes/pluggable.php' ) ) {
		  include ABSPATH . 'wp-includes/pluggable.php';
	  }
	  add_filter( 'gform_field_value_dfw_support_name', array( $this, 'name_filter') );
	  add_filter( 'gform_field_value_dfw_support_url', array( $this, 'url_filter') );
	} // end __construct

	/**
	 * Name Filter
	 *
	 * @since      0.0.15
	 * @return     string
	 */
	public function name_filter() {
	  $user_id = get_current_user_id();
	  $user_first_name = get_the_author_meta( 'first_name', $user_id );
	  $user_last_name = get_the_author_meta( 'last_name', $user_id );
	  $user_nicename = get_the_author_meta( 'display_name', $user_id );
	  if( !$user_first_name ) {
		$name = $user_nicename;
	  } else {
		$name = $user_first_name . ' ' . $user_last_name;
	  }
	  return $name;
	} // end name_filter

	/**
	 * URL Filter
	 *
	 * @since      0.0.15
	 * @return     string
	 */
	public function url_filter() {
	  return home_url();
	} // end url_filter

  }
} // end GF_Forms_Defaults
