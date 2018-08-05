<?php
namespace Distance_Framework\Helpers\Classes; 
/**
 * Convert a String to an Array
 *
 * @package    DFW
 * @subpackage DFW/Helpers/Classes
 * @since      0.0.13
 */

if( !class_exists( 'String_To_Array' ) ) {
  class String_To_Array {

    /**
     * Delimer
     *
     * @since  0.0.13
     * @var    string $delimer the delimer seprating the string items
     */
    protected $delimer;

    /**
     * String
     *
     * @since  0.0.13
     * @var    string $string the comma separated string
     */
    protected $string;

    /**
     * Initialize the class
     *
     * @since 0.0.13
     */
    public function __construct( $delimer, $string ) {
      $this->delimer = $delimer;
      $this->string = $string;
      $this->convert();
    } // end __construct

    /**
     * Convert
     *
     * @since      0.0.13
     * @return     void
     */
    public function convert() {
      $values = explode( $this->delimer, $this->string );
      foreach( $values as $key => $value ) {
        $values[$key] = trim( $value );
      }
      return array_diff( $values, array( "" ) );
    } // end convert
  }
} // end String_To_Array