<?php
/**
 * Custom Upload Dir
 */
if (!defined('MULTISITE')) {
	add_filter('wp_handle_upload_prefilter', 'am_mawa_pre_upload');
	add_filter('wp_handle_upload', 'am_mawa_post_upload');
}
function am_mawa_pre_upload($file) {
  add_filter('upload_dir', 'am_custom_upload_dir');
  return $file;
}
function am_mawa_post_upload($fileinfo) {
  remove_filter('upload_dir', 'am_custom_upload_dir');
  return $fileinfo;
}
function am_custom_upload_dir($path) {
	global $post, $post_id;
	$file_type   = wp_check_filetype( $_POST['name'] );
  $file_ext    = ( $file_type['ext'] ) ? $file_type['ext'] : '';
	$cust_dir    = '';
  $post_id     = ( !empty($post_id) ? $post_id : ( !empty($_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '') );
  $post_dir    = ( $post_id ? '/post-id_' . $post_id : '/option' );
  $time        =  ( !empty($_SERVER['REQUEST_TIME'] ) ) ? $_SERVER['REQUEST_TIME'] : ( time() + ( get_option( 'gmt_offset' ) * 3600) );
  $post_type   = 'post';
  if( !empty($path['error']) || substr( strrchr ($_POST['name'], '.' ), 1 ) != $file_ext ) {
    return $path;
  }
  if( empty( $post ) || ( !empty( $post ) && is_numeric( $post_id ) && $post_id != $post->ID ) ) {
    $post      = get_post($post_id);
  }
  if( !empty( $post ) ) {
    $time      = ( $post->post_date == '0000-00-00 00:00:00' ) ? $time : strtotime( $post->post_date );
    $post_type = $post->post_type;
  }
  $date        = explode( " ", date( 'Y m d H i s', $time ) );
  if( in_array( strtolower( $file_ext ), array( 'jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp', 'tif', 'tiff', 'ico', 'svg', ) ) ) {
      $cust_dir = '/images';
  } elseif( in_array( strtolower( $file_ext ), array( 'mp3', 'm4a', 'm4b', 'ra', 'ram', 'wav', 'ogg', 'oga', 'mid', 'midi', 'wma', 'wax', 'mka', ) ) ) {
      $cust_dir = '/audio';
  } elseif( in_array( strtolower( $file_ext ), array( 'asf', 'asx', 'wmv', 'wmx', 'wm', 'avi', 'divx', 'flv', 'mov', 'qt', 'mpeg', 'mpg', 'mpe', 'mp4', 'm4v', 'ogv', 'webm', 'mkv', ) ) ) {
      $cust_dir = '/video';
  } elseif( in_array( strtolower( $file_ext ), array( 'txt', 'asc', 'c', 'cc', 'h', 'csv', 'tsv' ,'ics', 'rtx', 'css', 'htm', 'html', 'doc' ,'pot', 'pps', 'ppt' ,'wri' ,'xla', 'xls', 'xlt', 'xlw' ,'mdb' ,'mpp' ,'docx' ,'docm' ,'dotx' ,'dotm' ,'xlsx' ,'xlsm' ,'xlsb' ,'xltx' ,'xltm' ,'xlam' ,'pptx' ,'pptm' ,'ppsx' ,'ppsm' ,'potx' ,'potm' ,'ppam' ,'sldx', 'sldm', 'onetoc', 'onetoc2', 'onetmp', 'onepkg', 'odt', 'odp', 'ods', 'odg', 'odc', 'odb', 'odf', 'wp','wpd', 'key', 'numbers', 'pages', 'pdf', 'rtf', ) ) ) {
      $cust_dir = '/documents';
  } elseif( in_array( strtolower( $file_ext ), array(  'js',  'swf', 'class', 'tar', 'zip', 'gz', 'gzip', 'rar', '7z', 'exe', ) ) ) {
      $cust_dir = '/applications';
  } else {
      $cust_dir = '/miscellaneous';
  }
  $path = array(
    'path'    => WP_CONTENT_DIR . '/uploads/' . $cust_dir . $post_dir . '/' . $date[0] . '/' . $date[1], // Year on end
    'url'     => WP_CONTENT_URL . '/uploads/' . $cust_dir . $post_dir . '/' . $date[0] . '/' . $date[1],
    'subdir'  => '',
    'basedir' => WP_CONTENT_DIR . '/uploads',
    'baseurl' => WP_CONTENT_URL . '/uploads',
    'error'   => false,
  );
  return $path;
}