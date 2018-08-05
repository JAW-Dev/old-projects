<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package    WordPress
 * @subpackage Twenty_Eleven
 * @since      Twenty Eleven 1.0
 */
// get highest_parent for building navigation
if (!empty($post) && isset($post->ID) && !is_home()) {
	$parents        = get_post_ancestors($post->ID);
	$highest_parent = ($parents) ? $parents[count($parents) - 1] : $post->ID;
}
wp_register_style('lightbox', '/wp-content/themes/elford/js/lightbox/css/lightbox.css');
wp_enqueue_style('lightbox');
wp_register_script('lightbox', '/wp-content/themes/elford/js/lightbox/js/lightbox.js', array('jquery'));
wp_enqueue_script('lightbox');
wp_register_script('elford', '/wp-content/themes/elford/js/elford.js', array('jquery', 'lightbox'));
wp_enqueue_script('elford');
//only loading image size specific classes for sub-pages
if (!is_front_page()) {
	wp_register_script('elford-image', '/wp-content/themes/elford/js/elford-image-class.js', array('elford'));
	wp_enqueue_script('elford-image');
}
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<script>document.cookie = 'resolution=' + Math.max(screen.width, screen.height) + '; path=/';</script>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title('|', TRUE, 'right');

		// Add the blog name.
		bloginfo('name');

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) {
			echo " | $site_description";
		}

		// Add a page number if necessary:
		if ($paged >= 2 || $page >= 2) {
			echo ' | ' . sprintf(__('Page %s', 'twentyeleven'), max($paged, $page));
		}

		?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>?v=5" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/style-responsive.css?v=2" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript" src="http://fast.fonts.com/jsapi/fe2a6441-03d9-45a8-b12c-0b7002130a9f.js"></script>
	<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
	?>
	<!--[if lt IE 9]>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/respond.js" type="text/javascript"></script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
<div id="left-bg"></div>

<div id="page" class="hfeed">

	<div id="logo-cont" class="centering-container">
		<div id="logo-img-cont">
			<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/elford_logo.png"></a>
		</div>
		<div id="logo-cont-bg">
			&nbsp;
		</div>
	</div>

	<div id="header-wrapper">

		<header id="branding" class="centering-container main-header" role="banner">
			<div class="inner">
				<a href="<?php echo home_url(); ?>" class="logo">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/elford_logo.png">
				</a>
				<div id="access-cont">
					<nav id="access" role="navigation">
						<h3 class="assistive-text"><?php _e('Main menu', 'twentyeleven'); ?></h3>
						<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
						<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e('Skip to primary content', 'twentyeleven'); ?>"><?php _e('Skip to primary content', 'twentyeleven'); ?></a></div>
						<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e('Skip to secondary content', 'twentyeleven'); ?>"><?php _e('Skip to secondary content', 'twentyeleven'); ?></a></div>
						<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
						<div id="nav-main">
							<?php wp_nav_menu(array('menu' => 'Primary Navigation')); ?>
						</div>
						<div class="clear"></div>
					</nav><!-- #access -->
				</div>
			</div>
		</header><!-- #branding -->

		<?php include_once('header-image.php'); ?>

	</div>

	<div class="yellow-bar">
		<div class="content__wrapper">
			<div class="yellow-bar__heading">
				<h2>
					<?php if (get_field('elf_heading_link')) : ?>
					<a href="<?php echo get_field('elf_heading_link'); ?>">
						<?php endif; ?>
						<?php
						if (get_field('elf_add_custom_heading')) :
							echo get_field('elf_custom_heading');
						else :
							the_title();
						endif;
						?>
						<span class="chevron"><i class="fa fa-play"></i></span>
						<?php if (get_field('elf_heading_link')) : ?>
					</a>
				<?php endif; ?>
				</h2>
			</div>
		</div>
	</div>
	<div id="main" class="centering-container">

