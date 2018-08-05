<?php
/**
 * Custom Excerpt
 *
 * @package    FCWP
 * @subpackage FCWP/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'FCWP_Custom_Excerpt' ) ) {
  class FCWP_Custom_Excerpt {

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
     * @since 0.0.1
     */
    public function __construct( $args = array() ) {
      $this->args = $args;
      $this->arguments();
    } // end __construct

    /**
     * The class arguments
     *
     * @global $paged the paged number
     * 
     * @since 0.0.1
         * @access private
         * @return void
     */
    private function arguments() {
      $defaults = array(
        'container'           => 'p',
        'content'             => get_the_content(),
        'length'              => '30',
        'type'                => 'word',
        'has_ellipsis'        => true,
        'ellipsis'            => '...',
        'is_ellipsis_link'    => true,
        'ellipsis_link_id'    => '',
        'ellipsis_link_class' => '',
        'ellipsis_link_attr'  => 'rel="bookmark"',
        'ellipsis_link_url'   => get_the_permalink(),
        'has_link'            => false,
        'link_text'           => 'More',
        'link_id'             => '',
        'link_class'          => '',
        'link_attr'           => 'rel="bookmark"',
        'link_url'            => get_the_permalink(),
        'allowed_tags'        => '',
      );
          $this->args = array_merge( $defaults, $this->args );
    } // end arguments

    /**
     * Excerpt
     *
     * @since      0.0.1
     * @return     string $string the excerpt
     */
    public function excerpt() {
      $container           = ( !empty( $this->args['container'] )           ? $this->args['container']                             : '' );
      $content             = ( !empty( $this->args['content'] )             ? $this->args['content']                               : '' );
      $length              = ( !empty( $this->args['length'] )              ? $this->args['length']                                : '30' );
      $type                = ( !empty( $this->args['type'] )                ? $this->args['type']                                  : 'word' );
      $has_ellipsis        = ( !empty( $this->args['has_ellipsis'] )        ? $this->args['has_ellipsis']                          : '' );
      $ellipsis            = ( !empty( $this->args['ellipsis'] )            ? $this->args['ellipsis']                              : '' );
      $is_ellipsis_link    = ( !empty( $this->args['is_ellipsis_link'] )    ? $this->args['is_ellipsis_link']                      : '' );
      $ellipsis_link_id    = ( !empty( $this->args['ellipsis_link_id'] )    ? ' id="' . $this->args['ellipsis_link_id'] . '"'      : '' );
      $ellipsis_link_class = ( !empty( $this->args['ellipsis_link_class'] ) ? ' class="' . $this->args['ellipsis_link_class']. '"' : '' );
      $ellipsis_link_attr  = ( !empty( $this->args['ellipsis_link_attr'] )  ? ' ' . $this->args['ellipsis_link_attr']              : '' );
      $ellipsis_link_url   = ( !empty( $this->args['ellipsis_link_url'] )   ? $this->args['ellipsis_link_url']                     : '' );
      $has_link            = ( !empty( $this->args['has_link'] )            ? $this->args['has_link']                              : false );
      $link_text           = ( !empty( $this->args['link_text'] )           ? $this->args['link_text']                             : '' );
      $link_id             = ( !empty( $this->args['link_id'] )             ? ' id="' . $this->args['link_id'] . '"'               : '' );
      $link_class          = ( !empty( $this->args['link_class'] )          ? ' class="' . $this->args['link_class']. '"'          : '' );
      $link_attr           = ( !empty( $this->args['link_attr'] )           ? ' ' . $this->args['link_attr']                       : '' );
      $link_url            = ( !empty( $this->args['link_url'] )            ? $this->args['link_url']                              : '' );
      $allowed_tags        = ( !empty( $this->args['allowed_tags'] )        ? $this->args['allowed_tags']                          : '' );
      $string              = trim( preg_replace( '~<(pre|table).*</\1>~ms', '', $content ) );
      $string              = strip_shortcodes( $string );
      $string              = apply_filters( 'the_content', $string );
      $string              = strip_tags( $string, $allowed_tags );
      

      if( $type == 'word' ) {
        if( str_word_count( $string, 0 ) > $length ) {
          $words = str_word_count ($string, 2 );
          $pos = array_keys( $words );
          $string = substr($string, 0, $pos[$length] );
        }
      } else {
        $string = substr( $string, 0, $length );
      }
      if( !empty( $container ) ) {

        if( $has_link == true ) {

          if( $has_ellipsis == true ) {

            if( $is_ellipsis_link == true ) {
              $string = '<' . $container . '>' . $string . ' <a href="' . $ellipsis_link_url . '"' . $ellipsis_link_id . $ellipsis_link_class . $ellipsis_link_attr . ' style="display: inline;">' .  $ellipsis . '</a></' . $container . '><a href="' . $link_url . '"' . $link_id . $link_class . $link_attr . '>' .  $link_text . "</a>";
            } else {
              $string = '<' . $container . '>' . $string . ' ' . $ellipsis . '</' . $container . '><a href="' . $link_url . '"' . $link_id . $link_class . $link_attr . '>' .  $link_text . "</a>";
            }

          } else {
            $string = '<' . $container . '>' . $string . '</' . $container . '>' . ' <a href="' . $link_url . '"' . $link_id . $link_class . $link_attr . '>' .  $link_text . "</a>";
          }

        } else {
          if( $has_ellipsis == true ) {

            if( $is_ellipsis_link == true ) {
              $string = '<' . $container . '>' . $string . ' <a href="' . $ellipsis_link_url . '"' . $ellipsis_link_id . $ellipsis_link_class . $ellipsis_link_attr . ' style="display: inline;">' .  $ellipsis . '</a></' . $container . '>';
            } else {
              $string = '<' . $container . '>' . $string . ' ' . $ellipsis . '</' . $container . '>';
            }

          } else {
            $string = '<' . $container . '>' . $string . '</' . $container . '>';
          }
        }

      } else {

        if( $has_link == true ) {
          if( $has_ellipsis == true ) {

            if( $is_ellipsis_link == true ) {
              $string = $string . ' <a href="' . $ellipsis_link_url . '"' . $ellipsis_link_id . $ellipsis_link_class . $ellipsis_link_attr . ' style="display: inline;">' .  $ellipsis . '</a><a href="' . $link_url . '"' . $link_id . $link_class . $link_attr . '>' .  $link_text . "</a>";
            } else {
              $string = $string . ' ' . $ellipsis . '<a href="' . $link_url . '"' . $link_id . $link_class . $link_attr . '>' .  $link_text . "</a>";
            }

          } else {
            $string = $string . ' <a href="' . $link_url . '"' . $link_id . $link_class . $link_attr . '>' .  $link_text . "</a>";
          }
        } else {
            if( $has_ellipsis == true ) {

            if( $is_ellipsis_link == true ) {
              $string = $string . ' <a href="' . $link_url . '"' . $link_id . $link_class . $link_attr . ' style="display: inline;">' .  $ellipsis . "</a>";
            } else {
              $string = $string . ' ' . $ellipsis;
            }

          } else {
            $string = $string;
          }
        }
        
      }
      return $string;
    } // end excerpt

  }
} // end FCWP_Custom_Excerpt

/**
 * Custom Excerpt
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'fcwp_custom_excerpt') ) {
  function fcwp_custom_excerpt( $args = array() ) {
    $fcwp_custom_excerpt = new FCWP_Custom_Excerpt( $args );
    echo $fcwp_custom_excerpt->excerpt();
  }
} // end fcwp_custom_excerpt