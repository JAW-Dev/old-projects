<?php
/* Required Files
===============================================================================*/
include( get_template_directory() .'/includes/constant-variables.php' );

/* Content Width
===============================================================================*/
if ( ! isset( $content_width ) ) {
    $content_width = 1000;
}

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

    add_image_size( 'logo', 400, 72 );
    add_image_size( 'logo@2', 800, 144 );

    add_image_size( 'hero-image', 1200, 575, array( 'center', 'top') );
    add_image_size( 'hero-image@2', 2400, 1150, array( 'center', 'top') );

    add_image_size( 'featured', 733, 380, array( 'center', 'top') );
    add_image_size( 'featured@2', 1466, 760, array( 'center', 'top') );

    add_image_size( 'post', 387, 435, array( 'center', 'top') );
    add_image_size( 'post@2', 722, 812, array( 'center', 'top') );

    add_image_size( 'gallery-lrg', 775, 609, array( 'center', 'top') );
    add_image_size( 'gallery-lrg@2', 1550, 1218, array( 'center', 'top') );

    add_image_size( 'gallery-md', 382, 384, array( 'center', 'top') );
    add_image_size( 'gallery-md@2', 764, 768, array( 'center', 'top') );

    add_image_size( 'gallery-sm', 382, 237, array( 'center', 'top') );
    add_image_size( 'gallery-sm@2', 764, 474, array( 'center', 'top') );
    
    add_image_size( 'footer-logo', 100, 75 );
    add_image_size( 'footer-logo@2', 200, 150 );

    /**
     * Post Formats
     */
    $post_formats_args = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
    // add_theme_support( 'post-formats', $post_formats_args );
    /**
     * HTML5 Support
     */
    $html5_args = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' );
    add_theme_support( 'html5', $html5_args );
    /**
     * Custom Background
     */
    $custom_background_args = array(
        'default-color'          => '',
        'default-image'          => '',
        'default-repeat'         => '',
        'default-position-x'     => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $custom_background_args );
    /**
     * Custom Header
     */
    $custom_header_args = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => 0,
        'height'                 => 0,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $custom_header_args );
    /**
     * Register Nav Menus
     */
    register_nav_menus( array(
        'primary' => __( 'Primary', DOMAIN ),
    ) );
}
add_action( 'after_setup_theme', 'theme_support' );

/* Editor Styles
===============================================================================*/
if( file_exists( 'editor-style.css' ) ) {
    add_editor_style( 'editor-style.css' );
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
    wp_register_script( 'main.min.js', THEME_URL . 'js/main.min.js', false, '1.0', true );
    wp_enqueue_script( 'main.min.js' );
    /**
     * Font JS
     */
    wp_enqueue_script( 'font-js', 'http://fast.fonts.net/jsapi/16684d91-2f9f-4cac-85d5-08a0d2e33216.js', false, '1.0', false );
    /**
     * Picturefill
     */
    wp_register_script( 'picturefill', THEME_URL . 'js/picturefill.js', false, '1.0', false );
    wp_enqueue_script( 'picturefill' );
    /**
     * Masonry
     */
    wp_enqueue_script('masonry');

    
    
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
/*  Load CSS
===============================================================================*/
function load_css() {
    /**
     * Font CSS
     */
    wp_enqueue_style( 'style-name', 'http://fast.fonts.net/cssapi/16684d91-2f9f-4cac-85d5-08a0d2e33216.css' );
}
add_action( 'wp_enqueue_scripts', 'load_css' );

/* Custom Comments Layout
===============================================================================*/
/**
 * Custom Comments Template
 * @param  string $comment
 * @param  array $args
 * @param  int $depth
 * @global strins  $GLOBALS['comment']
 * @global int $user_ID
 */
function custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    global $user_ID; 
    ob_start(); ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class( 'comment-wrapper' ) ?> itemscope itemtype="http://schema.org/Comment">
      <?php if( $user_ID ) : if( current_user_can('administrator') ) : ?>
            <div class="comment-edit">
              <?php edit_comment_link( __( 'Edit', DOMAIN ),'','' ) ?>
            </div>
            <div class="comment-approval">
              <p>
                <?php 
                  if ( $comment->comment_approved == '0' ) 
                  _e( 'Your comment is awaiting moderation.', '' ) 
                ?>
              </p>
          </div>
      <?php endif; endif; ?>
    <article class="comment-container">
        <header class="comment-header comment-meta">
          <?php echo '<span itemprop="image">' . get_avatar( $comment, $size='50' ) . '</span>'; ?>
          <?php get_template_part( 'template-parts/comments/comment-meta/meta', 'author'); ?>
          <?php get_template_part( 'template-parts/comments/comment-meta/meta', 'date' ); ?>
        </header>
        <section class="comment-body" itemprop="comment">
            <?php comment_text(); ?>
        </section>
        <footer class="comment-footer">
            <p class="comment-reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </p>
        </footer>
    </article>
<?php echo ob_get_clean();
}

/* Sidebar Widget Area
===============================================================================*/
function register_custom_sidebars() {
    if( ! function_exists( register_sidebar() ) ) {
        register_sidebar( array(
            'name'          => __( 'Primary', DOMAIN ),
            'id'            => 'primary',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        ));
        register_sidebar( array(
            'name'          => __( 'Left Sidebar', DOMAIN ),
            'id'            => 'sidebar-left',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        ));
        register_sidebar( array(
            'name'          => __( 'Right Sidebar', DOMAIN ),
            'id'            => 'sidebar-right',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        ));
    }
}
add_action( 'widgets_init', 'register_custom_sidebars' );
/* Register Menus
===============================================================================*/
register_nav_menus( array(
    'primary' => 'Primary',
    'footer' => 'Mobile',
) );
/* Options Page
===============================================================================*/
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Theme Settings'
  ));
  
}
/* Clean Nav IDs
===============================================================================*/
function clean_nav_ids($id, $item) {
    $str = preg_replace('/[^a-zA-Z0-9s]/', '', $item->title);
    $str = strtolower(str_replace(' ', '-', $item->title));
    return 'nav-' . $str;
}
add_filter( 'nav_menu_item_id', 'clean_nav_ids', 10, 3);
/* Terms Classes
================================================================================*/
function terms_classes() {
    $terms = get_the_terms( get_the_ID(), 'portfolio_type' );
    $term_array = array();
    foreach ( $terms as $term ){
      $term_array[] = strtolower( str_replace( " ","-", $term->name ) );
    }
    return implode(" ", $term_array);
}
/* Truncated Text
================================================================================*/
function limit_text( $text, $args = array() ) {
    global $post;
    $defaults = array(
          'limit'    => 20,
          'ellipsis' => '...'
      );
    $args = array_merge( $defaults, $args );
    extract( $args );
    /**
     * Check if the text is longer than the character limit
     * If text is longer than limit trim the text with ellipsis
     */
    if( strlen( $text ) > $limit ) {
        $text = substr( $text, 0, $limit ) . $ellipsis;
    }
    echo $text;
}
/* Get the page slug
================================================================================*/
function kl_get_page_slug() {
    global $post;
    $page_slug = '';
    if ( is_single() || is_page() ) {
      $page_slug = $post->post_name;
    } else {
      $page_slug = "";
    }
    return $page_slug;
}
/* Get terms for featured posts
================================================================================*/
function kl_get_featured_post() {
    $page_slug = kl_get_page_slug();
    $tax = '';
    if( $page_slug == 'camps' ) {
      $tax = 'portfolio_type';
    } elseif( $page_slug == 'retreats' ) {
      $tax = 'portfolio_type';
    } elseif( $page_slug == 'conference-centers' ) {
      $tax = 'portfolio_type';
    } elseif( $page_slug == 'consulting-planning' ) {
      $tax = 'service';
    } elseif( $page_slug == 'master-site-planning' ) {
      $tax = 'service';
    } elseif( $page_slug == 'what-we-do' ) {
      $tax = 'service';
    } elseif( $page_slug == 'portfolios' ) {
      $tax = 'service';
    } else {
      $tax = '';
    }
    return $tax;
}
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

