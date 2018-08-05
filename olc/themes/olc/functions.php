<?php
/*---------------------------------------------------------
 * Constants
---------------------------------------------------------*/
$wp_theme = wp_get_theme();
// Theme Version
if (!defined('FCWP_VERSION')) {
	define('FCWP_VERSION', $wp_theme->get('Version'));
}
// Theme Prefix
if (!defined('FCWP_PREFIX')) {
	define('FCWP_PREFIX', 'fcwp');
}
// Theme Name
if (!defined('FCWP_NAME')) {
	define('FCWP_NAME', $wp_theme->get('Name'));
}
// Theme URI
if (!defined('FCWP_URI')) {
	define('FCWP_URI', esc_url(get_template_directory_uri()));
}
// Theme Stylesheet URI
if (!defined('FCWP_STYLESHEETURI')) {
	define('FCWP_STYLESHEETURI', esc_url(get_stylesheet_uri()));
}
// Theme Directory
if (!defined('FCWP_DIR')) {
	define('FCWP_DIR', get_template_directory());
}

/*---------------------------------------------------------
 * Theme Setup
---------------------------------------------------------*/
if (!function_exists('fcwp_theme_support')) :
	function fcwp_theme_support ()
	{
		// Load taxdomain
		load_theme_textdomain('fcwp', get_template_directory() . '/languages');
		// Automatic Feed Support
		// add_theme_support( 'automatic-feed-links' );
		// Title Tage Support
		add_theme_support('title-tag');
		// Post Thumbnails
		add_theme_support('post-thumbnails');
		// Post Formats
		$post_formats_args = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
		// add_theme_support( 'post-formats', $post_formats_args );
		// HTML5 Support
		$html5_args = array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption');
		// add_theme_support( 'html5', $html5_args );
		// Custom Background
		$custom_background_args = array(
			'default-color'          => '',
			'default-image'          => '',
			'default-repeat'         => '',
			'default-position-x'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);
		// add_theme_support( 'custom-background', $custom_background_args );
		// Custom Header
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
		// add_theme_support( 'custom-header', $custom_header_args );
		// Register Nav Menus*/
		register_nav_menus(array(
			                   'primary' => __('Primary', 'fcwp'),
		                   ));
	}

	add_action('after_setup_theme', 'fcwp_theme_support');
endif;

/*---------------------------------------------------------
 * Custom Nav Walker
---------------------------------------------------------*/
if (!class_exists('fcwp_walker_nav_menu')) :
	class fcwp_walker_nav_menu extends Walker_Nav_Menu
	{

		// add classes to ul sub-menus
		public function start_lvl (&$output, $depth = 0, $args = array())
		{
			// depth dependent classes
			$indent        = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
			$display_depth = ($depth + 1); // because it counts the first submenu as 0
			$classes       = array(
				'sub-menu',
				'menu-depth-' . $display_depth
			);
			$class_names   = implode(' ', $classes);

			// build html
			$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}

		// add main/sub classes to li's and links
		public function start_el (&$output, $item, $depth = 0, $args = array(), $id = 0)
		{
			$indent        = ($depth > 0 ? str_repeat("\t", $depth) : '');
			$display_depth = ($depth + 1);
			// depth dependent classes
			$depth_classes     = array(
				($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
				'menu-item-depth-' . $depth,
				'menu-item-' . strtolower(str_replace(' ', '-', $item->title))
			);
			$depth_class_names = esc_attr(implode(' ', $depth_classes));

			$classes     = empty($item->classes) ? array() : (array) $item->classes;
			$class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

			// build html
			$output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '" role="menuitem" aria-lable="' . apply_filters('the_title', $item->title, $item->ID) . '">';

			// link attributes
			$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
			$attributes .= ' class="menu-link ' . ($depth > 0 ? 'sub-menu-link' : 'main-menu-link') . '"';


			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			// build html
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}
	}
endif;

/*---------------------------------------------------------
 * Load Stylesheets
---------------------------------------------------------*/
if (!function_exists('fcwp_load_stylesheets')) :
	function fcwp_load_stylesheets ()
	{
		// Load the main stylesheet.
		wp_enqueue_style('fcwp-style', FCWP_STYLESHEETURI, array(), FCWP_VERSION, 'all');
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style('fcwp-ie8-style', FCWP_URI . '/css/ie8.style.css', array('fcwp-style'), FCWP_VERSION);
		wp_style_add_data('fcwp-ie8-style', 'conditional', 'IE 8');
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style('fcwp-ie9-style', FCWP_URI . '/css/ie9.style.css', array('fcwp-style'), FCWP_VERSION);
		wp_style_add_data('fcwp-ie9-style', 'conditional', 'IE 9');
		$dir = get_stylesheet_directory();
		if (filesize($dir . '/css/quickfix.css') != 0) {
			wp_enqueue_style('ohw-qf', FCWP_URI . '/css/quickfix.css', array(), FCWP_VERSION, 'all');
		}
	}

	add_action('wp_enqueue_scripts', 'fcwp_load_stylesheets');
endif;

/*---------------------------------------------------------
 * Load JavaScript
---------------------------------------------------------*/
if (!function_exists('fcwp_load_child_javascript')) :
	function fcwp_load_child_javascript ()
	{
		// jQuery
		wp_enqueue_script('jquery');
		// scripts.min.js
		wp_register_script('scripts.min.js', FCWP_URI . '/js/scripts.min.js', FALSE, FCWP_VERSION, TRUE);
		wp_enqueue_script('scripts.min.js');
		if (is_page_template('templates/template-board.php' || 'templates/template-staff.php')) {
			wp_enqueue_script('masonry');
			wp_register_script('masonry-init.js', FCWP_URI . '/js/lib/masonry/masonry-init.js', array('masonry'), FCWP_VERSION, TRUE);
			wp_enqueue_script('masonry-init.js');
		}
	}

	add_action('wp_enqueue_scripts', 'fcwp_load_child_javascript');
endif;
/*---------------------------------------------------------
 * IE Conditional JavaScript
---------------------------------------------------------*/
if (!function_exists('fcwp_load_ie')) :
	function fcwp_load_ie ()
	{
		ob_start(); ?>
		<!--[if (lt IE 9) & (!IEMobile)]>
		<script src="<?php echo FCWP_STYLESHEETURI; ?>/js/ie.min.js"></script><![endif]-->
		<?php
		echo ob_get_clean();
	}

	add_action('wp_head', 'fcwp_load_ie', 10);
endif;

/*---------------------------------------------------------
 * Sidebar Widget Area
---------------------------------------------------------*/
function fcwp_register_custom_sidebars ()
{
	register_sidebar(array(
		                 'name'          => __('Sidebar', 'fcwp'),
		                 'id'            => 'sidebar',
		                 'description'   => '',
		                 'class'         => '',
		                 'before_widget' => '<li id="%1$s" class="widget %2$s">',
		                 'after_widget'  => '</li>',
		                 'before_title'  => '<h2 class="widgettitle">',
		                 'after_title'   => '</h2>'
	                 ));
}

add_action('widgets_init', 'fcwp_register_custom_sidebars');

/*---------------------------------------------------------
 * Remove Tags Taxonomy
---------------------------------------------------------*/
function fcwp_remove_tags ()
{
	register_taxonomy('post_tag', array());
}

add_action('init', 'fcwp_remove_tags');

/*---------------------------------------------------------
 * New Listings
---------------------------------------------------------*/
function fcwp_news_listing ($slug, $title, $post_per_page = '2')
{
	?>
	<section class="entry__content content__entries">
		<h2 class="entry__category-title">
			<?php _e($title, 'fcwp') ?>
		</h2>
		<?php
		$paged     = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$uai_query = new WP_Query(array(
			                          'post_type'      => 'post',
			                          'posts_per_page' => $post_per_page,
			                          'paged'          => $paged,
			                          'category_name'  => $slug
		                          ));
		if ($uai_query->have_posts()) :
			while ($uai_query->have_posts()) :
				$uai_query->the_post();
				$category      = get_the_category(get_the_id());
				$category_link = get_category_link($category[0]->term_id);
				get_template_part('template-parts/content', 'excerpt');
			endwhile;
			?>
			<div class="entry__catagory-link">
				<a href="<?php echo $category_link; ?>">
					<?php _e('View more form ' . $title, 'fcwp'); ?>
				</a>
			</div>
			<?php
		else:
			get_template_part('template-parts/content', 'none');
		endif;
		wp_reset_postdata();
		?>
	</section>
	<?php
}

/*---------------------------------------------------------
 * Frontpage Boxes
---------------------------------------------------------*/
function fcwp_display_box ($name, $url, $image, $retina, $svg, $alt, $heading, $text)
{
	?>
	<a href="<?php echo $url; ?>" class="col__1-3 fp-boxes__url fp-boxes__<?php echo $name; ?>" rel="bookmark" aria-labelledby="<?php echo $name; ?>" role="link">
		<h3 id="advocacy" class="fp-boxes__heading">
			<?php echo $heading; ?>
		</h3>
		<p class="fp-boxes__text">
			<?php echo $text; ?>
		</p>
		<?php if (!empty($image) && !empty($retina) && !empty($svg)) : ?>
			<div class="fp-boxes__img-wrapper">
				<?php
				$box_paths = array(
					'image'  => $image,
					'retina' => $retina,
					'svg'    => $svg
				);
				fcwp_svg($box_paths, $alt, 'logo', 'svg fp-boxes__' . $name . '-svg');
				?>
			</div>
		<?php endif; ?>
	</a>
	<?php
}