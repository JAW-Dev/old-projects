<?php
/**
 * The name of the theme's folder
 * @var string
 */
$theme_folder = basename( dirname( dirname(__FILE__) ) );
/**
 * Defines the Theme domain based on the theme Name
 * @var string
 */
$theme_domain = strtolower( str_replace( ' ', '-', wp_get_theme( '', 'name' ) ) );
/* Declare Constant Variables
===============================================================================*/
/** 
 * Theme Name Constant
 */
if ( !defined( 'THEME_NAME' ) ) {
  define( 'THEME_NAME', wp_get_theme( '', 'name' ) );
}
/** 
 * Content Directory Path Constant
 */
if ( !defined( 'CONTENT_DIR' ) ){
  define( 'CONTENT_DIR', ABSPATH . 'wp-content' );
}
/** 
 * Theme Directory Constant
 */
if ( !defined( 'THEME_DIR' ) ) {
  define( 'THEME_DIR', WP_CONTENT_DIR . '/themes/'. $theme_folder .'/' );
}
/** 
 * Theme ULR Constant
 */
if ( !defined( 'THEME_URL' ) ) {
  define( 'THEME_URL', WP_CONTENT_URL . '/themes/' . $theme_folder . '/' );
}
/** 
 * Theme Domain Constant
 */
if ( !defined( 'DOMAIN' ) ) {
  define( 'DOMAIN', $theme_domain );
}
?>