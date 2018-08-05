<?php

require ABSPATH . 'wp-admin/includes/post.php';

if( !post_exists( 'Distance Framework Template Functions' ) ) {
  require_once DFW_PL_PLUGIN_DIR . 'admin/settings/template-functions.php';
}
if( !post_exists( 'Tutorial Videos' ) ) {
  require_once DFW_PL_PLUGIN_DIR . 'admin/settings/tutorial-videos.php';
}
if( !post_exists( 'General Settings' ) ) {
  require_once DFW_PL_PLUGIN_DIR . 'admin/settings/general-settings.php';
}
if( !post_exists( 'Page CSS and JavaScript' ) ) {
  require_once DFW_PL_PLUGIN_DIR . 'admin/settings/page-css-js.php';
}