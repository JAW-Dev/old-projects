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

/*---------------------------------------------------------
 * Constants
---------------------------------------------------------*/
$wp_theme = wp_get_theme();
// Theme Version
if ( ! defined( 'FCWP_VERSION' ) ) {
  define( 'FCWP_VERSION', $wp_theme->get( 'Version' ) );
}
// Theme Prefix
if ( ! defined( 'FCWP_PREFIX' ) ) {
  define( 'FCWP_PREFIX', 'dfw' );
}
// Theme Name
if ( !defined( 'FCWP_NAME' ) ) {
  define( 'FCWP_NAME', $wp_theme->get( 'Name' ) );
}
// Theme URI
if ( !defined( 'FCWP_URI' ) ) {
  define( 'FCWP_URI', esc_url( get_template_directory_uri() ) );
}
// Theme Stylesheet URI
if ( !defined( 'FCWP_STYLESHEETURI' ) ) {
  define( 'FCWP_STYLESHEETURI', esc_url( get_stylesheet_uri() ) );
}
// Theme Directory
if ( !defined( 'FCWP_DIR' ) ) {
  define( 'FCWP_DIR', get_template_directory() );
}
?>