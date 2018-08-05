<?php
// disable admin bar
add_filter('show_admin_bar', '__return_false');

// remove twentyeleven templates we don't want used
add_action('admin_head', 'wpse_13671_script_enqueuer');
function wpse_13671_script_enqueuer() {
    global $current_screen;
    // /wp-admin/edit.php?post_type=page
    if('edit-page' == $current_screen->id)
    { ?>
        <script type="text/javascript">
        jQuery(document).ready( function($) {
            $("a.editinline").live("click", function () {
                var ilc_qe_id = inlineEditPost.getId(this);
                setTimeout(function() {
                        $('#edit-'+ilc_qe_id+' select[name="page_template"] option[value="showcase.php"]').remove();
                        $('#edit-'+ilc_qe_id+' select[name="page_template"] option[value="sidebar-page.php"]').remove();
                    }, 100);
            });

            $('#doaction, #doaction2').live("click", function () {
                setTimeout(function() {
                        $('#bulk-edit select[name="page_template"] option[value="showcase.php"]').remove();
                        $('#bulk-edit select[name="page_template"] option[value="sidebar-page.php"]').remove();
                    }, 100);
            });
        });
        </script>
    <?php }
    //  /wp-admin/post.php?post=21&action=edit
    if( 'page' == $current_screen->id )
    {
        ?>
        <script type="text/javascript">
        jQuery(document).ready( function($) {
            $('#page_template option[value="showcase.php"]').remove();
            $('#page_template option[value="sidebar-page.php"]').remove();
        });
        </script>
    <?php
    }
}


// Job Post Type Stuff
add_action( 'init', 'register_taxonomy_job_types' );

// Job Type Taxonomy
function register_taxonomy_job_types() {

    $labels = array(
        'name' => _x( 'Job Types', 'job_types' ),
        'singular_name' => _x( 'Job Type', 'job_types' ),
        'search_items' => _x( 'Search Job Types', 'job_types' ),
        'popular_items' => _x( 'Popular Job Types', 'job_types' ),
        'all_items' => _x( 'All Job Types', 'job_types' ),
        'parent_item' => _x( 'Parent Job Type', 'job_types' ),
        'parent_item_colon' => _x( 'Parent Job Type:', 'job_types' ),
        'edit_item' => _x( 'Edit Job Type', 'job_types' ),
        'update_item' => _x( 'Update Job Type', 'job_types' ),
        'add_new_item' => _x( 'Add New Job Type', 'job_types' ),
        'new_item_name' => _x( 'New Job Type', 'job_types' ),
        'separate_items_with_commas' => _x( 'Separate job types with commas', 'job_types' ),
        'add_or_remove_items' => _x( 'Add or remove job types', 'job_types' ),
        'choose_from_most_used' => _x( 'Choose from the most used job types', 'job_types' ),
        'menu_name' => _x( 'Job Types', 'job_types' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'job_types', array('job'), $args );
}

// Job Post Type Creation

add_action( 'init', 'register_cpt_job' );

function register_cpt_job() {

    $labels = array(
        'name' => _x( 'Jobs', 'job' ),
        'singular_name' => _x( 'Job', 'job' ),
        'add_new' => _x( 'Add New', 'job' ),
        'add_new_item' => _x( 'Add New Job', 'job' ),
        'edit_item' => _x( 'Edit Job', 'job' ),
        'new_item' => _x( 'New Job', 'job' ),
        'view_item' => _x( 'View Job', 'job' ),
        'search_items' => _x( 'Search Jobs', 'job' ),
        'not_found' => _x( 'No jobs found', 'job' ),
        'not_found_in_trash' => _x( 'No jobs found in Trash', 'job' ),
        'parent_item_colon' => _x( 'Parent Job:', 'job' ),
        'menu_name' => _x( 'Jobs', 'job' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Job Posting',
        'supports' => array( 'title', 'editor', 'excerpt' ),
        'taxonomies' => array( 'job_types' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        //'rewrite'=>false,
        'rewrite' => false,
        'capability_type' => 'page'
    );

    register_post_type( 'job', $args );
}

// End Job Listing Stuff

// Portfolio Post Type Stuff

// Sector Taxonomy

add_action( 'init', 'register_taxonomy_sectors' );

function register_taxonomy_sectors() {

    $labels = array(
        'name' => _x( 'Industries', 'sectors' ),
        'singular_name' => _x( 'Industry', 'sectors' ),
        'search_items' => _x( 'Search Industries', 'sectors' ),
        'popular_items' => _x( 'Popular Industries', 'sectors' ),
        'all_items' => _x( 'All Industries', 'sectors' ),
        'parent_item' => _x( 'Parent Industries', 'sectors' ),
        'parent_item_colon' => _x( 'Parent Industry:', 'sectors' ),
        'edit_item' => _x( 'Edit Industry', 'sectors' ),
        'update_item' => _x( 'Update Industry', 'sectors' ),
        'add_new_item' => _x( 'Add New Industry', 'sectors' ),
        'new_item_name' => _x( 'New Industry', 'sectors' ),
        'separate_items_with_commas' => _x( 'Separate industries with commas', 'sectors' ),
        'add_or_remove_items' => _x( 'Add or remove industries', 'sectors' ),
        'choose_from_most_used' => _x( 'Choose from the most used industries', 'sectors' ),
        'menu_name' => _x( 'Industries', 'sectors' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'sectors', array('portfolio'), $args );
}

// Features & Innovations Taxonomy

add_action( 'init', 'register_taxonomy_features' );

function register_taxonomy_features() {

    $labels = array(
        'name' => _x( 'Features', 'features' ),
        'singular_name' => _x( 'Feature', 'features' ),
        'search_items' => _x( 'Search Features', 'features' ),
        'popular_items' => _x( 'Popular Features', 'features' ),
        'all_items' => _x( 'All Features', 'features' ),
        'parent_item' => _x( 'Parent Feature', 'features' ),
        'parent_item_colon' => _x( 'Parent Feature:', 'features' ),
        'edit_item' => _x( 'Edit Feature', 'features' ),
        'update_item' => _x( 'Update Feature', 'features' ),
        'add_new_item' => _x( 'Add New Feature', 'features' ),
        'new_item_name' => _x( 'New Feature', 'features' ),
        'separate_items_with_commas' => _x( 'Separate features with commas', 'features' ),
        'add_or_remove_items' => _x( 'Add or remove Features', 'features' ),
        'choose_from_most_used' => _x( 'Choose from most used Features', 'features' ),
        'menu_name' => _x( 'Features', 'features' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => false,
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'features', array('portfolio'), $args );
}

// Portfolio Type

add_action( 'init', 'register_cpt_portfolio' );

function register_cpt_portfolio() {

    $labels = array(
        'name' => _x( 'Portfolio Entries', 'portfolio' ),
        'singular_name' => _x( 'Portfolio Entry', 'portfolio' ),
        'add_new' => _x( 'Add New', 'portfolio' ),
        'add_new_item' => _x( 'Add New Portfolio Entry', 'portfolio' ),
        'edit_item' => _x( 'Edit Portfolio Entry', 'portfolio' ),
        'new_item' => _x( 'New Portfolio Entry', 'portfolio' ),
        'view_item' => _x( 'View Portfolio Entry', 'portfolio' ),
        'search_items' => _x( 'Search Portfolio Entries', 'portfolio' ),
        'not_found' => _x( 'No portfolio entries found', 'portfolio' ),
        'not_found_in_trash' => _x( 'No portfolio entries found in Trash', 'portfolio' ),
        'parent_item_colon' => _x( 'Parent Portfolio Entry:', 'portfolio' ),
        'menu_name' => _x( 'Portfolio Entries', 'portfolio' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // required for wp_list_pages to work
        'description' => 'Construction Portfolio Entries',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        'taxonomies' => array( 'sectors', 'features' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false, // if this is true, we have to provide an archive template, and also need to change the slug for the "portfolio" landing page... or else delete it and change the navigation to link to the main archive page
        'query_var' => true,
        'can_export' => true,
		//'rewrite'=>false,
        'rewrite' => array(
			'slug'=>'portfolio',
			'ep_mask'=>'portfolio',
		),
        'capability_type' => 'page',
    );

    register_post_type( 'portfolio', $args );
}

add_rewrite_rule('^sectors/([^/]*)/?$' ,'index.php?sectors=$matches[1]','top');
add_rewrite_rule('^portfolio/([^/]*)/?$' ,'index.php?portfolio=$matches[1]','top');
add_rewrite_rule('^features/([^/]*)/?$' ,'index.php?features=$matches[1]','top');
add_rewrite_rule('^job_types/([^/]*)/?$' ,'index.php?job_types=$matches[1]','top');
flush_rewrite_rules();

// End Portfolio Type Stuff

// Image Size Stuff

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 210, 115 ); // default Post Thumbnail dimensions
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'full-width', 900, 430, true ); //(cropped)
    add_image_size( 'featured-post', 494, 260, array( 'center', 'top' ) );
}

//Grab Title for Feature Images

function the_post_thumbnail_title() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_title.'</span>';
  }
}


//// Grab Caption for Featured Images
//
//function the_post_thumbnail_caption() {
//  global $post;
//
//  $thumbnail_id    = get_post_thumbnail_id($post->ID);
//  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
//
//  if ($thumbnail_image && isset($thumbnail_image[0])) {
//    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
//  }
//}

// Create "is_child" for use in sidebar logic

function is_child($pageID) {
	global $post;
	if( is_page() && ($post->post_parent==$pageID) ) {
               return true;
	} else {
               return false;
	}
}

function get_sliding_gallery($id=false, $limit=10) {
	$gallery = '';
	if(!$id) {
		$id = get_the_ID();
	}
	if(!$id) {
		return $gallery;
	}

	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_type'      => 'attachment',
		'post_parent'    => $id,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => $limit,
	);
	$attachments = get_posts($args);
	$gallery .= "<div class='gallery-portfolio-slider' id='gallery-{$id}'>";
	if (!empty($attachments)) {
		$ct = 0;
		$tot = count($attachments);
		foreach($attachments as $a) {
			$ct++;
			$src = wp_get_attachment_url( $a->ID );
			$gallery .= "<img src='{$src}' class='img-{$ct}' />";
		}
	}
	$gallery .= "</div>";
	// see http://nivo.dev7studios.com/support/jquery-plugin-usage/ for options
	$options = array(
		'controlNav'=>true,
		'directionNav'=>false,
		'effect'=>'fade',
	);
	$options_json = json_encode($options);

	// this is ugly, but we're in a time crunch. make it better if we have time later.
	//$spacer = get_stylesheet_directory_uri() . "/img/spacer.png";
	$gallery .= "<script>
	jQuery('#gallery-{$id}').nivoSlider({$options_json});
	jQuery('.nivo-controlNav a').html('&nbsp;');
	</script>";

	return $gallery;
}

function elford_enqueue_scripts() {
	wp_enqueue_script('nivo-slider', get_stylesheet_directory_uri() . '/js/nivo-slider/jquery.nivo.slider.pack.js', array('jquery'));
	wp_enqueue_style('nivo-slider-css', get_stylesheet_directory_uri() . '/js/nivo-slider/nivo-slider.css');
}
add_action('wp_enqueue_scripts', 'elford_enqueue_scripts');


$filters = array('pre_term_description',
    'pre_link_description',
    'pre_link_notes',
    'pre_user_description'
);

foreach ( $filters as $filter ) {
    remove_filter($filter, 'wp_filter_kses');
}
remove_filter('term_description', 'wp_kses_data');



/**
 * This file provides additional functions for sharko's theme.
 */

 /**
 * Returns a "Continue Reading" link in BG for excerpts
 */
function elford_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( '...', 'twentyeleven' ) . '</a>';
}

/*
 * Removes the get_the_exerpt filter
 */
function elford_remove_excerpt_filter() {
   remove_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );
}
add_action( 'after_setup_theme', 'elford_remove_excerpt_filter' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 */

function elford_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= elford_continue_reading_link();
	}
	return $output;
}


add_filter( 'get_the_excerpt', 'elford_custom_excerpt_more' );



add_filter("manage_upload_columns", 'upload_columns');
add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);

function upload_columns($columns) {

	unset($columns['parent']);
	$columns['better_parent'] = "Parent";

	return $columns;

}

 function media_custom_columns($column_name, $id) {

	$post = get_post($id);

	if($column_name != 'better_parent')
		return;

		if ( $post->post_parent > 0 ) {
			if ( get_post($post->post_parent) ) {
				$title =_draft_or_post_title($post->post_parent);
			}
			?>
			<strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d')); ?>
			<br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach'); ?></a></td>

			<?php
		} else {
			?>
			<?php _e('(Unattached)'); ?><br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach'); ?></a>
			<?php
		}

}

/**--------------------------------------------------------
 * Add Social Links option page
 *---------------------------------------------------------*/
if( function_exists( 'acf_add_options_page') ) {
    acf_add_options_page( array(
        'page_title' => 'Social Network Links',
        'menu_title' => 'Social Links',
        'menu_slug'  => 'social_links',
    ) );
}
/**--------------------------------------------------------
 * Social Icons Widget
 *---------------------------------------------------------*/
 /**
 * Social Icons Widget Model
 *
 * @since 1.0.0
 */
class WidgetSocialIconsModel extends \WP_Widget {
    /**
     * Initialize the class
     *
     * @since 1.0.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname'     =>  'widget-social-icons',
            'description'   =>  __( 'A Widget to display social icons.', 'elf' ),
        );
        parent::__construct( 'social-icons-widget', __( 'Social Icons', 'elf' ), $widget_ops );
    } // end __construct

    /**
     * Outputs the content of the widget.
     *
     * @since  1.0.0
     * @uses   get_field()
     * @uses   esc_url
     * @param    array args The array of form elements
     * @param    array instance The current instance of the widget
     * @return void
     */
    public function widget( $args, $instance ) {
        $font_size        = get_field( 'elf_social_widget_font_size', 'widget_' . $args['widget_id'] );
        $link_color       = get_field( 'elf_social_widget_color', 'widget_' . $args['widget_id'] );
        $link_hover_color = get_field( 'elf_social_widget_hover_color', 'widget_' . $args['widget_id'] );
        $margins          = get_field( 'elf_social_widget_spacing', 'widget_' . $args['widget_id'] );
        echo $args['before_widget'];
        echo '<div class="widget__social-icons">';
            $repeater_field = 'elf_social_links';
            if( have_rows( $repeater_field, 'option' ) ):
                while ( have_rows( $repeater_field, 'option') ) :
                    the_row();
                    $link_name = get_sub_field( 'elf_social_link_name' );
                    $link_url  = get_sub_field( 'elf_social_link_urlprofile' );
                    $link_icon = get_sub_field( 'elf_social_link_icon' );
                    $name = esc_attr( strtolower( str_replace( array( ' ', '_' ) , '-', $link_name ) ) );
                    echo '<a href="' . esc_url( $link_url ) . '" class="' . $name . '">' . $link_icon . '</a>';
                endwhile;
            endif;
        echo '</div>';
        echo $args['after_widget'];
    } // end widget
}
add_action( 'widgets_init', function(){ register_widget( 'WidgetSocialIconsModel' ); });