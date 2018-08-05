<?php
namespace Distance_Framework\Helpers\Classes;
/**
 * Object to Array
 *
 * @package    dfw
 * @subpackage dfw/Helpers/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Obj_To_Array' ) ) {
  class Obj_To_Array {

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {
    } // end __construct

    /**
     * Convert Object to Array 
     *
     * @since      0.0.1
     * @return     array
     */
    public function obj_to_array( $object ) {
      if( !is_object( $object ) && !is_array( $object ) ) {
        return $object;
      }
      return array_map( array( $this, 'obj_to_array'), (array) $object );
    } // end obj_to_array
  }
} // end Obj_To_Array
