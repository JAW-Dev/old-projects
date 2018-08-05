<?php
namespace Distance_Framework\Helpers\Classes; 
/**
 * Settings Tags
 *
 * Converts the template tags to the equvalent function value
 *
 * @package    DFW
 * @subpackage DFW/Helpers/Classes
 * @since      0.0.1
 */

if( !class_exists( 'Settings_Tags' ) ) {
  class Settings_Tags {

    /**
     * String
     *
     * @since  0.0.1
     * @var    string $string the string of text
     */
    protected $string;  

    /**
     * Tamplate Tags
     *
     * @since  0.0.1
     * @var    array $template_tags the array of template tags
     */
    protected $template_tags;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $string ) {
      $this->string = $string;
    } // end __construct

    /**
     * Replace
     *
     * Converts the template tags to the equvalent function value
     *
     * @since      1.1.7
     * @return     mixed $string retuns the value of the function
     */
    public function replace() {
      $template_tags = array(
        '/%POSTID%/i'        => get_the_ID(),
        '/%CONTENT%/i'       => get_the_content(),
        '/%PERMALINK%/i'     => get_the_permalink(),
        '/%AUTHORID%/i'      => get_the_author_meta( 'ID' ),
        '/%AUTHFIRSTNAME%/i' => get_the_author_meta( 'first_name' ),
        '/%AUTHLASTNAME%/i'  => get_the_author_meta( 'last_name' ),
        '/%TITLE%/i'         => get_the_title(),
        '/%HOMEURL%/i'       => home_url(),
      );
      $patterns = array_keys( $template_tags );
      $replacements = array_values( $template_tags );
      $output = preg_replace( $patterns, $replacements, $this->string );
      return $output;
    } // end replace
  }
} // end Settings_Tags