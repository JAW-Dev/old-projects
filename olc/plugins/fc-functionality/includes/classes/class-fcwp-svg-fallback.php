<?php
/**
 * Svg Image with Fallback
 *
 * @package    FCWP
 * @subpackage FCWP/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'FCWP_SVG_Fallback' ) ) {
  class FCWP_SVG_Fallback {

    /**
     * File Path
     *
     * @since  0.0.1
     * @var    array $file_paths the file path of the images
     */
    public $file_paths;

    /**
     * Atl Tag
     *
     * @since  0.0.1
     * @var    strinf $alt the alternate tag text
     */
    public $alt;

    /**
     * ID
     *
     * @since  0.0.1
     * @var    string $id the id for the image
     */
    public $id;

    /**
     * SVG Classes
     *
     * @since  0.0.1
     * @var    string $svg_classes the classes for the svg image
     */
    public $svg_classes;

    /**
     * Image Classes
     *
     * @since  0.0.1
     * @var    string $image_classes the classes for the image image
     */
    public $image_classes;

    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $file_paths = array(), $alt, $id, $svg_classes, $image_classes ) {
      $this->file_paths = $file_paths;
      $this->alt = $alt;
      $this->id = $id;
      $this->svg_classes = $svg_classes;
      $this->image_classes = $image_classes;
    } // end __construct

    /**
     * The file paths
     *
     * @global $paged the paged number
     * 
     * @since 0.0.1
         * @access private
         * @return void
     */
    private function file_paths() {
      $defaults = array(
        'svg'    => '',
        'image'  => '',
        'retina' => '',
      );
          $this->file_paths = array_merge( $defaults, $this->file_paths );
    } // end file_paths

    /**
     * SVG
     *
     * @since      0.0.1
     * @return     $string the HTML output
     */
    public function svg() {
      $svg_path = ( $this->file_paths['svg'] ? $this->file_paths['svg'] : '' );
      $image_path = ( $this->file_paths['image'] ? $this->file_paths['image'] : '' );
      $retina_path = ( $this->file_paths['retina'] ? $this->file_paths['retina'] : '' );
      $svg_id = ( $this->id ? ' id="' . $this->id . '-svg"' : '' );
      $id = ( $this->id ? ' id="' . $this->id . '"' : '' );
      $alt = ( $this->alt ? ' alt="' . $this->alt . '"' : '' );
      $svg_classes = ( $this->svg_classes ? ' class="' . $this->svg_classes . '"' : '' );
      $image_classes = ( $this->image_classes ? ' class="' . $this->image_classes . '"' : '' );
      $string = '<picture>
                  <!--[if IE 9]><video style="display: none;"><![endif]-->
                    <img src="' . $svg_path . '"' . $svg_id . $alt . $svg_classes . ' type="image/svg"/>
                  <!--[if IE 9]></video><![endif]-->
                  <img src="' . $image_path . '" srcset="' . $image_path . ' 1x, ' . $retina_path .' 2x"' . $id . $alt . $image_classes . ' />
                </picture>';
      return $string;
      
    } // end svg
  }
} // end FCWP_SVG_Fallback

/**
 * SVG with Fallback
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'fcwp_svg') ) {
  function fcwp_svg( $file_paths, $alt, $id, $svg_classes = '', $image_classes = '' ) {
    $fcwp_svg = new FCWP_SVG_Fallback( $file_paths, $alt, $id, $svg_classes, $image_classes );
    echo $fcwp_svg->svg();
  }
} // end fcwp_svg