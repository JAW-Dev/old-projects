<?php
/**
 * Page Title
 *
 * @package    FCWP
 * @subpackage FCWP/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'FCWP_Page_Title' ) ) {
  class FCWP_Page_Title {

    /**
     * Arguments
     *
     * @since  0.0.1
     * @var    array $args the arguments
     */
    public $args;

    /**
     * Title
     *
     * @since  0.0.1
     * @var    string $title the title
     */
    public $title;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $title = '', $args = array()  ) {
      $this->args  = $args;
      $this->title = $title;
      $this->arguments();
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
        'header_id'         => 'entry__header',
        'header_class'      => 'entry__header',
        'header_attr'       => '',
        'heading_container' => 'h1',
        'heading_id'        => 'section-heading-' . get_the_ID(),
        'heading_class'     => 'entry__title',
        'heading_attr'      => '',
        'is_linked'         => '',
        'link_id'           => '',
        'link_class'        => '',
        'link_attr'         => 'rel="bookmark"',
        'link_url'          => get_the_permalink()
      );
      $this->args = array_merge( $defaults, $this->args );
    } // end arguments

    /**
     * Title
     *
     * @since      0.0.1
     * @return     string $string
     */
    public function title() {
      $title             = ( $this->title != '' ? __( $this->title, FCWP_PL_TEXTDOMAIN ) : get_the_title() );
      $header_id         = ( !empty( $this->args['header_id'] )         ? ' id="' . $this->args['header_id'] . '"'        : "" );
      $header_class      = ( !empty( $this->args['header_class'] )      ? ' class="' . $this->args['header_class'] . '"'  : "" );
      $header_attr       = ( !empty( $this->args['header_attr'] )       ? ' ' . $this->args['header_attr']                : "" );
      $heading_container = ( !empty( $this->args['heading_container'] ) ? $this->args['heading_container']                : "" );
      $heading_id        = ( !empty( $this->args['heading_id'] )        ? ' id="' . $this->args['heading_id'] . '"'       : "" );
      $heading_class     = ( !empty( $this->args['heading_class'] )     ? ' class="' . $this->args['heading_class'] . '"' : "" );
      $heading_attr      = ( !empty( $this->args['heading_attr'] )      ? ' ' . $this->args['heading_attr']               : "" );
      $is_linked         = ( !empty( $this->args['is_linked'] )         ? $this->args['is_linked']                        : false );
      $link_id           = ( !empty( $this->args['link_id'] )           ? ' id="' . $this->args['link_id'] . '"'          : "" );
      $link_class        = ( !empty( $this->args['link_class'] )        ? 'c lass="' . $this->args['link_class'] . '"'    : "" );
      $link_attr         = ( !empty( $this->args['link_attr'] )         ? ' ' . $this->args['link_attr']                  : "" );
      $link_url          = ( !empty( $this->args['link_url'] )          ? $this->args['link_url']                         : "" );
      $string            = '';
      if( $is_linked == false) {
        $string = '<header ' . $header_id . $header_class . $header_attr . '>' . 
                    '<' . $heading_container . $heading_id . $heading_class . $heading_attr . '>' . 
                      esc_html__( $title, FCWP_PL_TEXTDOMAIN ) . 
                    '</' . $heading_container . '>' . 
                  '</header>';
        
      } else {
        $string = '<header ' . $header_id . $header_class . $header_attr . '>' . 
                    '<' . $heading_container . $heading_id . $heading_class . $heading_attr . ' >' . 
                      '<a href="' . $link_url . '" ' . $link_id . $link_class . $link_attr .'>' . 
                        esc_html__( $title, FCWP_PL_TEXTDOMAIN ) . 
                      '</a>' . 
                    '</' . $heading_container . '>' . 
                  '</header>';
      }
      $string = apply_filters( 'fcwp_page_title', $string );
      return $string;
    } // end title

  }
} // end FCWP_Page_Title

/**
 * Page Title
 *
 * @package    0.0.1
 * @return     void
 */
if( ! function_exists( 'fcwp_page_title') ) {
  function fcwp_page_title( $title = '', $args = array() ) {
    $fcwp_page_title = new FCWP_Page_Title( $title, $args );
    echo $fcwp_page_title->title();
  }
} // end fcwp_page_title