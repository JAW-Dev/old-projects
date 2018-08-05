<?php
/**
 * Custom Upload Dir
 *
 * @package    FCWP
 * @subpackage FCWP/Incluides/Classes
 * @since      0.0.1
 */

if( !class_exists( 'FCWP_Custom_Upload_Dir' ) ) {
  class FCWP_Custom_Upload_Dir {

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
        'audio_formats'       => array( 'mp3', 'm4a', 'm4b', 'ra', 'ram', 'wav', 'ogg', 'oga', 'mid', 'midi', 'wma', 'wax', 'mka', ),
        'image_formats'       => array( 'jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp', 'tif', 'tiff', 'ico', ),
        'video_formats'       => array( 'asf', 'asx', 'wmv', 'wmx', 'wm', 'avi', 'divx', 'flv', 'mov', 'qt', 'mpeg', 'mpg', 'mpe', 'mp4', 'm4v', 'ogv', 'webm', 'mkv', ),
        'document_formats'    => array( 'txt', 'asc', 'c', 'cc', 'h', 'csv', 'tsv' ,'ics', 'rtx', 'css', 'htm', 'html', 'doc' ,'pot', 'pps', 'ppt' ,'wri' ,'xla', 'xls', 'xlt', 'xlw' ,'mdb' ,'mpp' ,'docx' ,'docm' ,'dotx' ,'dotm' ,'xlsx' ,'xlsm' ,'xlsb' ,'xltx' ,'xltm' ,'xlam' ,'pptx' ,'pptm' ,'ppsx' ,'ppsm' ,'potx' ,'potm' ,'ppam' ,'sldx', 'sldm', 'onetoc', 'onetoc2', 'onetmp', 'onepkg', 'odt', 'odp', 'ods', 'odg', 'odc', 'odb', 'odf', 'wp','wpd', 'key', 'numbers', 'pages', ),
        'application_formats' => array( 'rtf', 'js', 'pdf', 'swf', 'class', 'tar', 'zip', 'gz', 'gzip', 'rar', '7z', 'exe', )
      );
      $this->args = array_merge( $defaults, $this->args );
    } // end arguments

    /**
     * Upload Dir
     *
     * @since      0.0.1
     * @return     $path
     */
    public function custom_upload_dir( $path ) {
      $file_type = wp_check_filetype( $_POST['name'] );
      $file_ext  = ( $file_type['ext'] ) ? $file_type['ext'] : '';
      $custom_directory = '';
      if (!empty($path['error']) || substr(strrchr($_POST['name'], '.'), 1) != $file_ext) {
        return $path;
      } //error or not pdf, so bail unchanged.

      global $post, $post_id;
      $post_id = (!empty($post_id) ? $post_id : (!empty($_REQUEST['post_id']) ? $_REQUEST['post_id'] : ''));
      if (empty($post) || (!empty($post) && is_numeric($post_id) && $post_id != $post->ID)) {
        $post = get_post($post_id);
      }

      $time = (!empty($_SERVER['REQUEST_TIME'])) ? $_SERVER['REQUEST_TIME'] : (time() + (get_option('gmt_offset') * 3600)); // Fallback of now
      $post_type = 'post';
      if (!empty($post)) {
        // Grab the posted date for use later
        $time = ($post->post_date == '0000-00-00 00:00:00') ? $time : strtotime($post->post_date);
        $post_type = $post->post_type;
      }

      $date = explode(" ", date('Y m d H i s', $time));

      // set directory based on file type
        if( in_array( strtolower( $file_ext ), array( 'jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp', 'tif', 'tiff', 'ico', ) ) ) {
            $custom_directory = '/images';
        } elseif( in_array( strtolower( $file_ext ), array( 'mp3', 'm4a', 'm4b', 'ra', 'ram', 'wav', 'ogg', 'oga', 'mid', 'midi', 'wma', 'wax', 'mka', ) ) ) {
            $custom_directory = '/audio';
        } elseif( in_array( strtolower( $file_ext ), array( 'asf', 'asx', 'wmv', 'wmx', 'wm', 'avi', 'divx', 'flv', 'mov', 'qt', 'mpeg', 'mpg', 'mpe', 'mp4', 'm4v', 'ogv', 'webm', 'mkv', ) ) ) {
            $custom_directory = '/video';
        } elseif( in_array( strtolower( $file_ext ), array( 'txt', 'asc', 'c', 'cc', 'h', 'csv', 'tsv' ,'ics', 'rtx', 'css', 'htm', 'html', 'doc' ,'pot', 'pps', 'ppt' ,'wri' ,'xla', 'xls', 'xlt', 'xlw' ,'mdb' ,'mpp' ,'docx' ,'docm' ,'dotx' ,'dotm' ,'xlsx' ,'xlsm' ,'xlsb' ,'xltx' ,'xltm' ,'xlam' ,'pptx' ,'pptm' ,'ppsx' ,'ppsm' ,'potx' ,'potm' ,'ppam' ,'sldx', 'sldm', 'onetoc', 'onetoc2', 'onetmp', 'onepkg', 'odt', 'odp', 'ods', 'odg', 'odc', 'odb', 'odf', 'wp','wpd', 'key', 'numbers', 'pages', 'pdf', 'rtf', ) ) ) {
            $custom_directory = '/documents';
        } elseif( in_array( strtolower( $file_ext ), array(  'js',  'swf', 'class', 'tar', 'zip', 'gz', 'gzip', 'rar', '7z', 'exe', ) ) ) {
            $custom_directory = '/applications';
        } else {
            $custom_directory = '/miscellaneous';
        }

      $path = array(
        'path' => WP_CONTENT_DIR . '/uploads/' . $custom_directory . '/post-id_' . $post_id  . '/' . $date[0] . '/' . $date[1], // Year on end
        'url' => WP_CONTENT_URL . '/uploads/' . $custom_directory . '/post-id_' . $post_id  . '/' . $date[0] . '/' . $date[1],
        'subdir' => '',
        'basedir' => WP_CONTENT_DIR . '/uploads',
        'baseurl' => WP_CONTENT_URL . '/uploads',
        'error' => false,
      );

      return $path;
    } // end custom_upload_dir



  }
} // end FCWP_Custom_Upload_Dir

$fcwp_custom_upload_dir = new FCWP_Custom_Upload_Dir();
/**
 * Pre Upload
 *
 * @since      0.0.1
 * @return     $file
 */
function pre_upload( $file ) {
  add_filter('upload_dir', array(  $fcwp_custom_upload_dir, 'custom_upload_dir') );
  return $file;
} // end pre_upload

/**
 * Post Upload
 *
 * @since      0.0.1
 * @return     $fileinfo
 */
function post_upload( $fileinfo ) {
  add_filter('upload_dir', array(  $fcwp_custom_upload_dir, 'custom_upload_dir') );
  return $file;
} // end post_upload
if (!defined('MULTISITE')) {
	add_filter('wp_handle_upload_prefilter', 'pre_upload', 0);
	add_filter('wp_handle_upload', 'post_upload', 0);
}