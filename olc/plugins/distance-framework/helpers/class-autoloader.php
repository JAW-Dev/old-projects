<?php
namespace Distance_Framework\Helpers; 
/**
 * Autoloader
 *
 * @package    DFW
 * @since      0.0.1
 */

if( !class_exists( 'Autoloader' ) ) {
  class Autoloader {

    /**
     * The directory path to your classes.
     * No leading or training slashed required.
     * 
     * @var string $dir the directory containing the classes to load
     */
    public $dir;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $dir ) {
      $this->dir = $dir;
      spl_autoload_register( array( $this, 'autoloader') );
    } // end __construct

    /**
     * Autoloader
     *
     * @since      0.0.1
     * @return     void
     */
    public function autoloader() {
      foreach( glob( DFW_PL_PLUGIN_DIR . $this->dir .'/*.php' ) as $filename ) {
        require_once $filename;
      }
    } // end autoloder
  }
} // end Autoloader

/**
 * Autoloader
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_autoloader') ) {
  function dfw_autoloader( $dir ) {
    $dfw_autoloader = new Autoloader( $dir );
  }
} // end dfw_autoloader