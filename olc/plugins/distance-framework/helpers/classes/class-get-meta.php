<?php
namespace Distance_Framework\Helpers\Classes;
/**
 * Get Meta
 *
 * Returns the value of an option or post meta
 * Converts template tage and creates a filter.
 *
 * @package    DFW
 * @subpackage DFW/Helpers/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Get_Meta' ) ) {
  class Get_Meta {

    /**
     * ID
     *
     * @since  0.0.1
     * @var    string $id the id of the meta entry
     */
    protected $id;

    /**
     * Default
     *
     * @since  0.0.1
     * @var    mixed $default the default value for the meta entry
     */
    protected $default;

    /**
     * Is an Option
     *
     * @since  0.0.1
     * @var    boolean $option true if is an option
     */
    protected $option;

    /**
     * Replace template tags
     *
     * @since  0.0.1
     * @var    boolean $replace if true replace tags
     */
    protected $replace;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $id, $default = '', $option = true, $replace = true ) {
      $this->id      = $id;
      $this->default = $default;
      $this->option  = $option;
      $this->replace = $replace;
    } // end __construct

    /**
     * Get the meta
     *
     * Returns the value of an option or post meta
     * Converts template tage and creates a filter.
     *
     * @since      0.0.1
     * @uses       wp-content/plugins/distance-framework/helpers/classes/template-functions.php: dfw_get_field()
     * @uses       wp-content/plugins/distance-framework/helpers/classes/template-functions.php: dfw_template_tags()
     * @uses       wp-includes/plugin.php: apply_filters()
     * @return     mixed $filter returns the value with a filter
     */
    public function get_the_meta() {
      $field = dfw_get_field( $this->id, $this->option );
      if( $this->replace == true ) {
        $meta = ( $field && !empty( $field ) ? dfw_template_tags( $field ) : $this->default );
      } else {
        $meta = ( $field && !empty( $field ) ? $field : $this->default );
      }
      $filter = apply_filters( $this->id, $meta );
      return $filter;
    } // end get_the_meta
  }
} // end Get_Meta