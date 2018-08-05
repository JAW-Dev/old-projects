<?php
/* Required Files
===============================================================================*/
include(get_template_directory() . '/includes/constant-variables.php');

/* Content Width
===============================================================================*/
if (!isset($content_width)) {
	$content_width = 1000;
}

/* Theme Support and Registers
===============================================================================*/
function theme_support () {
	/**
	 * Automatic Feed Support
	 */
	add_theme_support('automatic-feed-links');
	/**
	 * Title Tage Support
	 */
	add_theme_support('title-tag');
	/**
	 * Post Thumbnails
	 */
	add_theme_support('post-thumbnails');

	add_image_size('logo', 294, 120);
	add_image_size('logo@2', 588, 240);

	add_image_size('slide-large', 1200, 565, array('center', 'top'));
	add_image_size('slide-large@2', 2400, 1130, array('center', 'top'));

	add_image_size('slide-med', 768, 362, array('center', 'top'));
	add_image_size('slide-med@2', 1536, 724, array('center', 'top'));

	add_image_size('slide-small', 480, 226, array('center', 'top'));
	add_image_size('slide-small@2', 960, 452, array('center', 'top'));

	add_image_size('case_study', 380, 186, array('center', 'top'));
	add_image_size('case_study@2', 760, 372, array('center', 'top'));

	add_image_size('post-excerpt', 783, 186, array('center', 'top'));
	add_image_size('post-excerpt@2', 1566, 372, array('center', 'top'));

	add_image_size('page-large', 1200, 734, array('center', 'top'));
	add_image_size('page-large@2', 2400, 744, array('center', 'top'));

	add_image_size('page-med', 768, 470, array('center', 'top'));
	add_image_size('page-med@2', 1536, 940, array('center', 'top'));

	add_image_size('page-small', 480, 294, array('center', 'top'));
	add_image_size('page-small@2', 960, 588, array('center', 'top'));

	add_image_size('author-small', 141, 141, array('center', 'top'));
	add_image_size('author-small@2', 282, 282, array('center', 'top'));

	/**
	 * Post Formats
	 */
	$post_formats_args = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	// add_theme_support( 'post-formats', $post_formats_args );
	/**
	 * HTML5 Support
	 */
	$html5_args = array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption');
	add_theme_support('html5', $html5_args);
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
	add_theme_support('custom-background', $custom_background_args);
	/**
	 * Custom Header
	 */
	$custom_header_args = array(
		'default-image'          => '',
		'random-default'         => FALSE,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => FALSE,
		'flex-width'             => FALSE,
		'default-text-color'     => '',
		'header-text'            => TRUE,
		'uploads'                => TRUE,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support('custom-header', $custom_header_args);
	/**
	 * Register Nav Menus
	 */
	register_nav_menus(array(
							 'primary' => __('Primary', 'benefactorgroup'),
						 ));
}

add_action('after_setup_theme', 'theme_support');

function theme_styles ()
{
	wp_enqueue_style('fcwp-style', get_template_directory_uri() . '/style.css', array(), '2.1.0', 'all');
}

add_action('wp_enqueue_scripts', 'theme_styles');

/* Editor Styles
===============================================================================*/
if (file_exists('editor-style.css')) {
	add_editor_style('editor-style.css');
}

/* Load Stylesheets
================================================================================*/
if (!function_exists('fcwpf_load_stylesheets')) :
	function fcwpf_load_stylesheets ()
	{
		wp_enqueue_style('fcwp-style', FCWP_STYLESHEETURI, array(), '2.1.0', 'all');
		//wp_enqueue_style( 'fast-fonts','http://fast.fonts.net/cssapi/d79e8bfd-5846-4313-8e1b-940e5c8f9d0f.css', array(), FCWP_VERSION, 'all' );
		wp_enqueue_style('fc-wp-ie8-style', get_template_directory_uri() . '/css/ie8.style.css', array('fc-wp-style'), '1.0.0');
		wp_style_add_data('fc-wp-ie8-style', 'conditional', 'IE 8');
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style('fc-wp-ie9-style', get_template_directory_uri() . '/css/ie9.style.css', array('fc-wp-style'), '1.0.0');
		wp_style_add_data('fc-wp-ie9-style', 'conditional', 'IE 9');
	}

	add_action('wp_enqueue_scripts', 'fcwpf_load_stylesheets');
endif;

/*  Load JavaScript
===============================================================================*/
function load_javascript ()
{
	/**
	 * jQuery
	 */
	wp_enqueue_script('jquery');
	/**
	 * main.js
	 */
	wp_register_script('main.min.js', get_template_directory_uri() . '/js/main.min.js', FALSE, '1.0', TRUE);
	wp_enqueue_script('main.min.js');
	// Nice Select
	wp_register_script('nice-select.js', get_template_directory_uri() . '/js/lib/jquery.nice-select.js', FALSE, '1.0', TRUE);
	wp_enqueue_script('nice-select.js');
	if (!is_admin()) {
		wp_enqueue_script('masonry');
	}
	/*
	 * Removed on client request
	wp_register_script( 'masonry-init.js', THEME_URL . 'js/masonry-init.js', array( 'masonry' ), '1.0', true );
	wp_enqueue_script( 'masonry-init.js' );*/
}

add_action('wp_enqueue_scripts', 'load_javascript');

/* IE Conditional JavaScript
===============================================================================*/
function load_ie ()
{
	ob_start(); ?>
	<!--[if (lt IE 9) & (!IEMobile)]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/ie.min.js"></script><![endif]-->
	<?php
	echo ob_get_clean();
}

add_action('wp_head', 'load_ie', 10);



/* Sidebar Widget Area
===============================================================================*/
function register_custom_sidebars () {
	register_sidebar(array(
		'name'          => __('Main Sidebar', 'benefactorgroup'),
		'id'            => 'home-sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => __('Short Sidebar', 'benefactorgroup'),
		'id'            => 'short-sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => __('Services Child Sidebar', 'benefactorgroup'),
		'id'            => 'services-child-sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => __('Team Sidebar', 'benefactorgroup'),
		'id'            => 'team-sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => __('Clients Sidebar', 'benefactorgroup'),
		'id'            => 'clients-sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => __('Resources Sidebar', 'benefactorgroup'),
		'id'            => 'resources-sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => __('Contact Sidebar', 'benefactorgroup'),
		'id'            => 'contact-sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	));
}

add_action('init', 'register_custom_sidebars');


/* Register Menus
===============================================================================*/
register_nav_menus(array(
	'primary' => 'Primary',
	'mobile'  => 'Mobile',
	'footer'  => 'Footer',
));

/* Custom Excerpt Length and More Link
================================================================================*/
// custom length
function custom_excerpt_length ($length) {
	$bene_fp_excerpt_length         = (get_field('bene_fp_excerpt_length', 'option') ? get_field('bene_fp_excerpt_length', 'option') : '');
	$bene_case_study_excerpt_length = (get_field('bene_case_study_excerpt_length', 'option') ? get_field('bene_case_study_excerpt_length', 'option') : '');
	if (get_post_type() == 'clients') {
		$length = $bene_case_study_excerpt_length;
	} else {
		$length = $bene_fp_excerpt_length;
	}

	return $length;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Replaces the excerpt "more" text by a link
function new_excerpt_more ($more) {
	$bene_fp_ellipse         = (get_field('bene_fp_ellipse', 'option') ? get_field('bene_fp_ellipse', 'option') : '');
	$bene_case_study_ellipse = (get_field('bene_case_study_ellipse', 'option') ? get_field('bene_case_study_ellipse', 'option') : '');
	global $post;
	if (get_post_type() == 'clients') {
		$ellipse = $bene_case_study_ellipse;
	} else {
		$ellipse = $bene_fp_ellipse;
	}

	return '<a class="moretag" href="' . get_permalink($post->ID) . '"> ' . $ellipse . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

/* Add placeholer feild for gravity forms
===============================================================================*/
function my_standard_settings($position, $form_id) {
	if ($position == 25) { ?>
		<li class="admin_label_setting field_setting" style="display: list-item; ">
			<label for="field_placeholder">Placeholder Text
			<a href="javascript:void(0);" class="tooltip tooltip_form_field_placeholder" tooltip="&lt;h6&gt;Placeholder&lt;/h6&gt;Enter the placeholder/default text for this field.">(?)</a>
			</label>
			<input type="text" id="field_placeholder" class="fieldwidth-3" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
		</li>
	<?php
	}
}
add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);


function my_gform_editor_js () {
	?>
	<script>
		jQuery(document).bind("gform_load_field_settings", function (event, field, form) {
			jQuery("#field_placeholder").val(field["placeholder"]);
		});
	</script>
	<?php
}
add_action("wp_footer", "my_gform_editor_js");


function my_gform_enqueue_scripts ($form, $is_ajax = FALSE) {
	if ( isset( $form['fields'] ) ) {
	?>
		<script>
			jQuery(function () {
				<?php
				foreach($form['fields'] as $i=>$field){
					if(isset($field['placeholder']) && !empty($field['placeholder'])){
						?>jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder', '<?php echo $field['placeholder']?>');<?php
					}
				}
				?>
			});
		</script>
	<?php
	}
}
add_action('wp_footer', "my_gform_enqueue_scripts", 10, 2);

/* Custom post listing
================================================================================*/
function custom_post_type_listings ($query) {
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	if (is_tax('client_categories')) {
		$query->set('posts_per_page', -1);
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');

		return;
	}
}

add_action('pre_get_posts', 'custom_post_type_listings', 1);

/* Disable comment on attachment pages
================================================================================*/
function filter_media_comment_status ($open, $post_id) {
	$post = get_post($post_id);
	if ($post->post_type == 'attachment') {
		return FALSE;
	}

	return $open;
}

add_filter('comments_open', 'filter_media_comment_status', 10, 2);

/* Ignore "the" in query order by title
================================================================================*/
if (!function_exists('fcwp_create_temp_column')) :
	function fcwp_create_temp_column ($fields) {
		global $wpdb;
		$matches = 'The';
		$has_the = " CASE
		WHEN $wpdb->posts.post_title regexp( '^($matches)[[:space:]]' )
			THEN trim(substr($wpdb->posts.post_title from 4))
		ELSE $wpdb->posts.post_title
			END AS title2";
		if ($has_the) {
			$fields .= (preg_match('/^(\s+)?,/', $has_the)) ? $has_the : ", $has_the";
		}

		return $fields;
	}

	add_filter('posts_fields', 'fcwp_create_temp_column');
endif;

if (!function_exists('fcwp_sort_by_temp_column')) :
	function fcwp_sort_by_temp_column ($orderby) {
		$custom_orderby = " UPPER(title2) ASC";
		if ($custom_orderby) {
			$orderby = $custom_orderby;
		}

		return $orderby;
	}

	add_filter('posts_orderby', 'fcwp_sort_by_temp_column');
endif;

/* Form tab fix
================================================================================*/
if (!function_exists('fcwp_gform_tabindexer')) {
	function fcwp_gform_tabindexer ($tab_index, $form = FALSE) {
		$starting_index = 1000; // if you need a higher tabindex, update this number
		if ($form) {
			add_filter('gform_tabindex_' . $form['id'], 'fcwp_gform_tabindexer');
		}

		return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
	}

	add_filter('gform_tabindex', 'fcwp_gform_tabindexer', 10, 2);
} // end fcwp_gform_tabindexer

/* If Has Link
================================================================================*/
if (!function_exists('fcwp_if_has_link')) {
	function fcwp_if_has_link( $link, $content ) {
		if ( isset( $link ) && $link != '') {
			$content = '<a href="' . $link . '">' . $content . '</a>';
		}
		echo $content;
	}
} // end fcwp_if_has_link

/* Giving USA 2016 body class
================================================================================*/
if (!function_exists('fcwp_custom_body_class')) {
	function fcwp_custom_body_class ($classes) {
		$posts = array(
			'giving-usa-2016',
			'giving-usa-2016-2',
			'giving-usa-2016-3',
		);
		foreach ($posts as $the_posts) {
			$the_post = get_page_by_path($the_posts, OBJECT, 'post');
			if ( isset( $the_post->ID ) && is_single($the_post->ID)) {
				$classes[] = 'full-page__post';
			}
		}
		$cats = array(
			'nonprofit-resources',
		);
		
		if ( is_single() && has_category( $cats ) ) {
			$classes[] = 'full-page__post';
		}

		return $classes;
	}

	add_filter('body_class', 'fcwp_custom_body_class');
} // end fcwp_custom_body_class

/* SharpSpring Forms
================================================================================*/
function post_to_third_party_18( $entry, $form ) {

	$post_url = 'https://app-3Q7IOW6C2Q.marketingautomation.services/webforms/receivePostback/MzYwNzE1NzAyBwA/564dfb06-2a7a-4d13-abc8-66717ff7ce99';

	$body = array(
		'First Name' => rgar( $entry, '1.3' ),
		'Last Name' => rgar( $entry, '1.6' ),
		'Email' => rgar( $entry, '2' ),
				'Company Name' => rgar( $entry, '3'),
		'Phone Number' => rgar( $entry, '6'),
				'trackingid__sb' => $_COOKIE['__ss_tk']
		);

	$request = new WP_Http();
	$response = $request->post( $post_url, array( 'body' => $body ) );
}
add_action( 'gform_after_submission_18', 'post_to_third_party_18', 10, 2 );


/* Is child page
================================================================================*/
function is_child_page( $parent_slug ) {
	$page = get_page_by_path( $parent_slug );
	
	if ( $page ) {
		return $page->ID;
	} else {
		return null;
	}
}


/* Remove Widgets
================================================================================*/
function disable_download_widgets( $sidebars_widgets ) {
	
	$pages = array(
		'services',
		'digital-fundraising',
		'general-development',
	);
	
	$remove_widgets = array(
		'download_widget',
		'custom_html',
		'reallysimpletwitterwidget',
		'facebook',
		'linkedin',
		'text',
	);

	if ( is_page( $pages ) ) {
		foreach ( $sidebars_widgets['services-child-sidebar'] as $key => $value ) {
			
			foreach ( $remove_widgets as $remove_widget ) {
				if ( strpos( $value, $remove_widget ) !== false ) {
					unset( $sidebars_widgets['services-child-sidebar'][ $key ] );
				}
			}
		}
		foreach ( $sidebars_widgets['home-sidebar'] as $key => $value ) {
			
			foreach ( $remove_widgets as $remove_widget ) {
				if ( strpos( $value, $remove_widget ) !== false ) {
					unset( $sidebars_widgets['home-sidebar'][ $key ] );
				}
			}
		}
	}

	return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'disable_download_widgets' );

function disable_newsletter_widget( $sidebars_widgets ) {
	
	$remove_widgets = array(
		'gform_widget',
	);

	if ( in_category('42')  ) {
		foreach ( $sidebars_widgets['home-sidebar'] as $key => $value ) {
			
			foreach ( $remove_widgets as $remove_widget ) {
				if ( strpos( $value, $remove_widget ) !== false ) {
					unset( $sidebars_widgets['home-sidebar'][ $key ] );
				}
			}
		}
	}

	return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'disable_newsletter_widget' );
