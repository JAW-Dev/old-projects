<?php
namespace Distance_Framework\Helpers\Classes; 
/**
 * Attribute
 *
 * Print the attribute if it has a value
 *
 * @package    DFW
 * @subpackage DFW/Helpers/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Attribute' ) ) {
  class Attribute {

    /**
     * Attribute
     *
     * @since  0.0.1
     * @var    string $sttr the attribute
     */
    protected $attr;

    /**
     * Value
     *
     * @since  0.0.1
     * @var    string $value the value of the attribute
     */
    protected $value;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $attr, $value ) {
      $this->attr = $attr;
      $this->value = $value;
    } // end __construct

    /**
     * Has Value
     *
     * @since      0.0.1
     * @return     $string
     */
    public function has_value() {
      $string = '';
      if( empty( $this->attr ) && $this->value ) {
        $string = ' ' . $this->value;
      } elseif( $this->value ) {
        $string = ' ' . $this->attr . '="' . $this->value . '"';
      }
      return $string;
    } // end has_value
  }
} // end Attribute