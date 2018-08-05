<?php
namespace Distance_Framework\Includes\Classes;
/**
 * Retina Images
 *
 * @package    DFW
 * @subpackage DFW/Includes/Classes
 * @since      0.0.5
 */

if( !class_exists( 'Retina_Images' ) ) {
  class Retina_Images {

    /**
     * Initialize the class
     *
     * @since 0.0.5
     */
    public function __construct() {
      add_filter( 'wp_generate_attachment_metadata', array( $this, 'attachment_meta' ), 10, 2 );
      add_filter( 'delete_attachment', array( $this, 'delete_images' ) );
    } // end __construct

    /**
     * Attachment Meta
     *
     * @since      0.0.5
     * @return     $metadata
     */
    public function attachment_meta( $metadata, $attachment_id ) {
      foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
          foreach ( $value as $image => $attr ) {
          if ( is_array( $attr ) )
            $this->create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
          }
        }
      }
      return $metadata;
    } // end attachment_meta

    /**
     * Create Image
     *
     * @since      0.0.5
     * @return     array
     */
    public function create_images( $file, $width, $height, $crop = false ) {
      if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
          $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
          $resized_file->resize( $width * 2, $height * 2, $crop );
          $resized_file->save( $filename );
          $info = $resized_file->get_size();
          return array(
            'file'   => wp_basename( $filename ),
            'width'  => $info['width'],
            'height' => $info['height'],
          );
        }
      }
      return false;
    } // end create_images

    /**
     * Delete Images
     *
     * @since      0.0.5
     * @return     void
     */
    public function delete_images( $attachment_id ) {
      $meta = wp_get_attachment_metadata( $attachment_id );
      $upload_dir = wp_upload_dir();
      $path = pathinfo( $meta['file'] );
      foreach ( $meta as $key => $value ) {
        if ( 'sizes' === $key ) {
        foreach ( $value as $sizes => $size ) {
          $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
          $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
          if ( file_exists( $retina_filename ) )
            unlink( $retina_filename );
          }
        }
      }
    } // end delete_images
  }
} // end Retina_Images