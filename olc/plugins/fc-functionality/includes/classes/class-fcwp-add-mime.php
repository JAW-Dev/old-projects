<?php
/**
 * Add Mime Type
 *
 * @package    FCWP
 * @subpackage FCWP/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'FCWP_Add_Mime_Type' ) ) {
  class FCWP_Add_Mime_Type {

  	/**
  	 * Argument
  	 *
  	 * @since  0.0.1
  	 * @var    array $args the array of mime types and names
  	 */
  	public $args;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $args = array() ) {
    	$this->args = $args;
    	add_filter( 'upload_mimes', array( $this, 'add_mime' ) );
    }// end __construct

    /**
     * Add Mime
     *
     * @since      0.0.1
     * @return     void
     */
    public function add_mime( $mimes = array() ) {
    	foreach( $this->args as $key => $value) {
    		$mimes[$key] = $value;
    	}
    	return $mimes;
    } // end add_mime()

  }
} // end FCWP_Add_Mime_Type
/**
 * Add Mime Template Function
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'fcwp_add_mime') ) {
  function fcwp_add_mime( $args = array() ) {
  	$fcwp_add_mime = new FCWP_Add_Mime_Type( $args );
  }
} // end fcwp_add_mime