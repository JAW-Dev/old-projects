<?php
use Distance_Framework\Includes\Classes as Includes;
use Distance_Framework\Admin\Classes as Admin;
use Distance_Framework\Helpers\Classes as Helpers;

/**
 * Add Admin Bar Item
 *
 * @version    0.0.15
 * @return     void
 */
if( ! function_exists( 'dfw_add_admin_bar_item') ) {
  function dfw_add_admin_bar_item( $args = array(), $priority = 999 ) {
	$dfw_add_admin_bar_item = new Admin\Add_Admin_Bar_Item( $args, $priority );
  }
} // end dfw_add_admin_bar_item

/**
 * Add Mime Types
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_add_mime_types') ) {
  function dfw_add_mime_types( $args = array() ) {
	$dfw_add_mime_types = new Includes\Add_Mime_Types( $args );
  }
} // end dfw_add_mime_types
/**
 * Archive Title
 *
 * @package    0.0.1
 * @return     void
 */
if( !function_exists( 'dfw_archive_title') ) {
  function dfw_archive_title( $args = array() ) {
	$dfw_archive_title = new Includes\Archive_Title( $args );
	echo $dfw_archive_title->title();
  }
} // end dfw_archive_title

/**
 * Attribute
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_attribute') ) {
  function dfw_attribute( $attr, $value ) {
	$dfw_attribute = new Helpers\Attribute( $attr, $value );
	return $dfw_attribute->has_value();
  }
} // end dfw_attribute

/**
 * Custom Excerpt
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_custom_excerpt') ) {
  function dfw_custom_excerpt( $args = array() ) {
	$dfw_custom_excerpt = new Includes\Custom_Excerpt( $args );
	echo $dfw_custom_excerpt->excerpt();
  }
} // end dfw_custom_excerpt

/**
 * Dsiplay Author
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_display_author') ) {
  function dfw_display_author( $args = array() ) {
	$dfw_display_author = new Includes\Display_Author( $args );
	echo $dfw_display_author->display();
  }
} // end dfw_display_author

/**
 * Entry Title
 *
 * @package    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_entry_title') ) {
  function dfw_entry_title( $args = array() ) {
	$dfw_entry_title = new Includes\Entry_Title( $args );
	echo $dfw_entry_title->title();
  }
} // end dfw_entry_title

/**
 * ACF Get Field
 *
 * @package    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_get_field') ) {
  function dfw_get_field( $field, $option = false, $default = '', $post_id = '', $single = true ) {
	$dfw_get_field = new Helpers\ACF_Get_Field();
	//return $dfw_get_field->get_field( $field, $option, $default, $post_id, $single );
  }
} // end dfw_get_field

/**
 * Get Meta
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_get_meta') ) {
  function dfw_get_meta( $id, $default = '', $option = true, $replace = true ) {
	$dfw_get_meta = new  Helpers\Get_Meta( $id, $default, $option, $replace );
	return $dfw_get_meta->get_the_meta();
  }
} // end dfw_get_meta

/**
 * ACF Get Sub Field
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_get_sub_field') ) {
  function dfw_get_sub_field( $parent, $field, $option = false, $default = '', $post_id = '', $single = true ) {
	$dfw_get_sub_field = new Helpers\ACF_Get_Field();
	return $dfw_get_sub_field->get_sub_field( $parent, $field, $option = false, $default = '', $post_id = '', $single = true );
  }
} // end dfw_get_sub_field

/**
 * Get Term List
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_get_term_list') ) {
  function dfw_get_term_list( $args = array() ) {
	$dfw_get_term_list = new Includes\List_Terms( $args );
	echo $dfw_get_term_list->list_terms();
  }
} // end dfw_get_term_list

/**
 * Human Lists
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_human_list') ) {
  function dfw_human_list( $array = array(), $conjunction = 'and', $delimer = ',' ) {
	$dfw_human_list = new Helpers\Human_lists( $array, $conjunction, $delimer );
	return $dfw_human_list->human_lists();
  }
} // end dfw_human_list

/**
 * Import GF Form
 *
 * @version    0.0.15
 * @return     void
 */
if( ! function_exists( 'dfw_import_gf_form') ) {
  function dfw_import_gf_form( $form_name, $filepath ) {
	$dfw_import_gf_form = new Import_GF_Form( $form_name, $filepath );
	$dfw_import_gf_form->import();
  }
} // end dfw_import_gf_form

/**
 * Object to Array
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_obj_to_array') ) {
  function dfw_obj_to_array( $object ) {
	$dfw_obj_to_array = new Helpers\Obj_To_Array( $object );
	return $dfw_obj_to_array->obj_to_array( $object );
  }
} // end dfw_obj_to_array

/**
 * Pagination
 *
 * @version    0.0.15
 * @return     void
 */
if( ! function_exists( 'dfw_pagination') ) {
  function dfw_pagination( $args = array() ) {
	$dfw_pagination = new Includes\Pagination( $args );
	echo $dfw_pagination->pagination();
  }
} // end fcwp_pagination

/**
 * Page Title
 *
 * @package    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_page_title') ) {
  function dfw_page_title( $title = '', $args = array() ) {
	$dfw_page_title = new Includes\Page_Title( $title, $args );
	echo $dfw_page_title->title();
  }
} // end dfw_page_title

/**
 * Rename Posts
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_rename_posts') ) {
  function dfw_rename_posts( $args = array() ) {
	$dfw_rename_posts = new Admin\Rename_Posts( $args );
  }
} // end dfw_rename_posts

/**
 * String to Array
 *
 * @version    0.0.13
 * @return     void
 */
if( ! function_exists( 'dfw_string_to_array') ) {
  function dfw_string_to_array( $delimer, $string ) {
	$dfw_string_to_array = new Helpers\String_To_Array( $delimer, $string );
	return $dfw_string_to_array->convert();
  }
} // end dfw_string_to_array

/**
 * SVG with Fallback
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_svg_fallback') ) {
  function dfw_svg_fallback( $file_paths, $alt, $id, $svg_classes = '', $image_classes = '' ) {
	$dfw_svg_fallback = new Includes\SVG_Fallback( $file_paths, $alt, $id, $svg_classes, $image_classes );
	echo $dfw_svg_fallback->svg();
  }
} // end dfw_svg_fallback

/**
 * Settings Template Tags
 *
 * @version    0.0.1
 * @return     void
 */
if( ! function_exists( 'dfw_template_tags') ) {
  function dfw_template_tags( $string ) {
	$dfw_template_tags = new Helpers\Settings_Tags( $string );
	return $dfw_template_tags->replace();
  }
} // end dfw_template_tags
