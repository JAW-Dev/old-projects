<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Add Mime Type
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.3
 */

if( !class_exists( 'Add_Mime_Types' ) ) {
  class Add_Mime_Types {

  	/**
  	 * Argument
  	 *
  	 * @since  0.0.1
  	 * @var    array $args the array of mime types and names
  	 */
  	protected $args;

    /**
     * Initialize the class
     *
     * @since 1.1.9
     */
    public function __construct( $args = array() ) {
    	$this->args = $args;
      add_action( 'init', array( $this, 'defaults' ) );
    	add_filter( 'upload_mimes', array( $this, 'add_mime' ) );
    }// end __construct

    /**
     * The class defaults
     * 
     * @since 1.1.10
     * @access private
     * @return void
     */
    public function defaults() {
      $defaults = array();
      if( function_exists( 'have_rows' ) ) {
        if( have_rows( DFW_PL_PREFIX . '_add_mime_types', 'option' ) ) {
           while ( have_rows( DFW_PL_PREFIX . '_add_mime_types', 'option' ) ) {
            the_row();
            $key = dfw_get_sub_field( DFW_PL_PREFIX . '_add_mime_types', DFW_PL_PREFIX . '_mime_extension' );
            $value = dfw_get_sub_field( DFW_PL_PREFIX . '_add_mime_types', DFW_PL_PREFIX . '_mime_type' );
            $defaults[$key] = $value;
          }
        }
      }
      $this->args = array_merge( $defaults, $this->args );
    } // end defaults

    /**
     * Add Mime
     *
     * @since      0.0.3
     * @access     private
     * @return     void
     */
    public function add_mime( $mimes = array() ) {
    	foreach( $this->args as $key => $value) {
    		$mimes[$key] = $value;
    	}
    	return $mimes;
    } // end add_mime()

  }
} // end Add_Mime_Types