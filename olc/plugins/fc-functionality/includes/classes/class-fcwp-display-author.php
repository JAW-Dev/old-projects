<?php
/**
 * Display Post Author
 *
 * @package     FCWP
 * @subpackage  FCWP/Includes/Classes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */
if( !class_exists( 'FCWP_Display_Author' ) ) {
	class FCWP_Display_Author {

    /**
     * Arguments
     *
     * @since  0.0.1
     * @var    array $args the arguments
     */
    public $args;

		/**
     * Initialize the class
     *
     * @since      0.0.1
     * @param      array $args the class arguments
     */
    public function __construct( $args = array() ) {
      $this->args = $args;
      $this->arguments();
      $this->display();
    } // end __construct

    /**
     * The class arguments
     *
     * @global $paged the paged number
     * 
     * @since      0.0.1
     * @access     private
     * @return     void
     */
    private function arguments() {
      $defaults = array(
        'container'       => 'span',
        'container_id'    => '',
        'container_class' => 'author vcard',
        'container_attr'  => '',
        'text'            => 'By: ',
        'is_linked'       => true,
        'link_id'         => '',
        'link_class'      => 'url fn n',
        'link_attr'       => 'rel="bookmark"'
      );
      $this->args = array_merge( $defaults, $this->args );
    } // end arguments

    /**
     * Display the published time
     *
     * @since     0.0.1
     * @uses      esc_html() wp-includes/formatting.php
     * @uses      get_the_author() wp-includes/author-template.php
     * @uses      get_the_author_meta() wp-includes/author-template.php
     * @return    string $string the outputed HTML
     */
    public function display() {
      $container_id    = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
      $container_class = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
      $container_attr  = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
      $text            = ( !empty( $this->args['text'] ) ? $this->args['text'] : "" );
      $link_id         = ( !empty( $this->args['link_id'] ) ? 'id="' . $this->args['link_id'] . '"' : "" );
      $link_class      = ( !empty( $this->args['link_class'] ) ? 'class="' . $this->args['link_class'] . '"' : "" );
      $link_attr       = ( !empty( $this->args['link_attr'] ) ? $this->args['link_attr'] : "" );
      $string          = '';
      if( $this->args['is_linked'] != true ) {
        $string = '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>' .
                    esc_html__( $text, 'textdomain' ) . esc_html( get_the_author() ) . '
                  </' . $this->args['container'] . '>';
      } else {
        $string = '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>' .
                    esc_html__( $text, 'textdomain' ) . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" ' . $link_id . ' ' . $link_class  . ' ' . $link_attr . '>' . esc_html( get_the_author() ) . '</a>
                  </' . $this->args['container'] . '>';
      }
      echo $string;
    } // end display
	}
}