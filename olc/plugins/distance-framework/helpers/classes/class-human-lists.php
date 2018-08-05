<?php
namespace Distance_Framework\Helpers\Classes;
/**
 * Human Lists
 *
 * @package    dfw
 * @subpackage dfw/Helpers/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Human_lists' ) ) {
  class Human_lists {

    /**
     * Array
     *
     * @since  0.0.1
     * @var    array $array the array
     */
    protected $array;

    /**
     * Conjunction
     *
     * @since  0.0.1
     * @var    string $conjunction the conjunction to use
     */
    protected $conjunction;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $array = array(), $conjunction = 'and', $delimer = ',' ) {
      $this->array = $array;
      $this->conjunction = $conjunction;
      $this->delimer = $delimer;
    } // end __construct

    /**
     * Human Lists
     *
     * @since      Version
     * @return     Return
     */
    public function human_lists() {
      $last  = array_slice( $this->array, -1 );
      $first = join( $this->delimer . ' ', array_slice( $this->array, 0, -1 ) );
      $both  = array_filter( array_merge( array( $first ), $last ) );
      return join( $this->delimer . ' ' . $this->conjunction . ' ', $both );
    } // end human_lists
  }
} // end Human_lists
