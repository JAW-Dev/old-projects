<?php
/* Theme Support and Registers
===============================================================================*/
function theme_support() {
    /**
     * Automatic Feed Support
     */
    add_theme_support( 'automatic-feed-links' );
    /**
     * Title Tage Support
     */    
    add_theme_support( 'title-tag' );
    /**
     * Post Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'logo', 293, 45 );
    add_image_size( 'logo@2', 586, 90 );

    add_image_size( 'post-excerpt', 528, 193 );

    /**
     * HTML5 Support
     */
    $html5_args = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' );
    add_theme_support( 'html5', $html5_args );

    register_nav_menus( array(
      'primary'             => 'Primary',
      'about'               => 'About us',
      'mitigation-banks'    => 'Mitigation Banks',
      'in-leiu-mitigation'  => 'In-leiu Mitigation',
      'resources'           => 'Resources',
      'footer'              => 'Footer'
    ) );
}
add_action( 'after_setup_theme', 'theme_support' );

/* Constants
================================================================================*/
if ( !defined( 'DOMAIN' ) ) {
  define( 'DOMAIN', 'ohw' );
}

/*  Load JavaScript
===============================================================================*/
function load_javascript() {
    /**
     * jQuery
     */
    wp_enqueue_script('jquery');
    /**
     * main.js
     */
    wp_register_script( 'main.min.js', get_template_directory_uri() . '/js/main.min.js', false, '1.0', true );
    wp_enqueue_script( 'main.min.js' );
    /**
     * Picturefill
     */
    wp_register_script( 'picturefill', get_template_directory_uri() . '/js/picturefill.js', false, '1.0', false );
    wp_enqueue_script( 'picturefill' );

    /**
     * Accordian
     */
    wp_register_script( 'transition', get_template_directory_uri() . '/js/transition.js', false, '1.0', true );
    wp_enqueue_script( 'transition' );
    wp_register_script( 'collapse', get_template_directory_uri() . '/js/collapse.js', false, '1.0', true );
    wp_enqueue_script( 'collapse' );
    
}
add_action( 'wp_enqueue_scripts', 'load_javascript' );

/* IE Conditional JavaScript
===============================================================================*/
function load_ie() {
  ob_start();?>
<!--[if (lt IE 9) & (!IEMobile)]><script src="<?php echo get_template_directory_uri(); ?>/js/ie.min.js"></script><![endif]-->
  <?php
  echo ob_get_clean();
}
add_action( 'wp_head', 'load_ie',10 );

/* Load CSS
================================================================================*/
function load_styles() {
    wp_enqueue_style( 'ohw', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'awesomefonts', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '1.0.0', 'all' );
    if( filesize( get_template_directory() . '/css/quickfix.css' ) != 0 ) {
        wp_enqueue_style( 'ohw-qf', get_template_directory_uri() . '/css/quickfix.css', array(), '1.0.0', 'all' );
    }
}
add_action( 'wp_enqueue_scripts', 'load_styles' );

function is_child( $post_id ) {
    global $post;
    if( is_page() && ($post->parent_page == $post_id ) ) {
      return true;
    } else {
      return false;
    }
}
/* Custom Excerpt Length and More Link
================================================================================*/
// custom length
function custom_excerpt_length( $length ) {
  $swf_post_excerpt_length = ( get_field( 'swf_post_excerpt_length', 'option' ) ? get_field( 'swf_post_excerpt_length', 'option' ) : '' );
  if( get_post_type() == 'post' ) {
      $length = $swf_post_excerpt_length;
  } elseif( get_post_type() == 'featured_project' ) {
      $length = $swf_post_excerpt_length;
  }
  
  return $length;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    $swf_post_excerpt_ellipise = ( get_field( 'swf_post_excerpt_ellipise', 'option' ) ? get_field( 'swf_post_excerpt_ellipise', 'option' ) : '' );
    global $post;
    if( get_post_type() == 'post' ) {
        return false;
    } elseif( get_post_type() == 'featured_project' ) {
        $ellipse = $swf_post_excerpt_ellipise;
        return '<a class="moretag" href="'. get_permalink($post->ID) . '"> '.$ellipse.'</a>';
    }
    
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
/* Sidebar Widget Area
===============================================================================*/
function register_custom_sidebars() {
  register_sidebar( array(
      'name'          => __( 'Sidebar', DOMAIN ),
      'id'            => 'sidebar-1',
      'description'   => '',
      'class'         => '',
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget'  => '</li>',
      'before_title'  => '<h2 class="widgettitle">',
      'after_title'   => '</h2>'
  ));
}
add_action( 'widgets_init', 'register_custom_sidebars' );

/* Add placeholer feild for gravity forms
===============================================================================*/
add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);
function my_standard_settings($position, $form_id){
    if($position == 25){ ?>  
        <li class="admin_label_setting field_setting" style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text
                <a href="javascript:void(0);" class="tooltip tooltip_form_field_placeholder" tooltip="&lt;h6&gt;Placeholder&lt;/h6&gt;Enter the placeholder/default text for this field.">(?)</a>
            </label>
            <input type="text" id="field_placeholder" class="fieldwidth-3" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php 
    }
}
add_action("gform_editor_js", "my_gform_editor_js");
function my_gform_editor_js(){ ?>
<script>
  jQuery(document).bind("gform_load_field_settings", function(event, field, form){
    jQuery("#field_placeholder").val(field["placeholder"]);
  });
</script>
<?php
}
add_action('gform_enqueue_scripts',"my_gform_enqueue_scripts", 10, 2);
function my_gform_enqueue_scripts($form, $is_ajax=false){?>
    <script>
        jQuery(function(){
            <?php
            foreach($form['fields'] as $i=>$field){
                if(isset($field['placeholder']) && !empty($field['placeholder'])){      
                    ?>        
                    jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');       
                    <?php
                }
            }
            ?>
        });
    </script>
<?php
}

/*---------------------------------------------------------
 * Purge Cache on custom post type edit
---------------------------------------------------------*/
function w3_flush_page_custom( $post_id ) {
  if ( 'custom_post_type' != get_post_type( $post_id ) ) {
    return;
  }
  $w3_plugin_totalcache->flush_pgcache();
}
add_action( 'edit_post', 'w3_flush_page_custom', 10, 1 );