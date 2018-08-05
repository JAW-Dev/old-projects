<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
 
 // get highest_parent for building navigation
 if(!empty($post) && isset($post->ID) && !is_home()) {
	$parents = get_post_ancestors($post->ID);
	$highest_parent = ($parents) ? $parents[count($parents)-1]: $post->ID;
}

wp_register_style('lightbox', '/wp-content/themes/elford/js/lightbox/css/lightbox.css');
wp_enqueue_style('lightbox');
/*
wp_register_style('lightbox-screen', '/wp-content/themes/elford/js/lightbox/css/screen.css');
wp_enqueue_style('lightbox-screen');
*/
wp_register_script('lightbox', '/wp-content/themes/elford/js/lightbox/js/lightbox.js', array('jquery'));
wp_enqueue_script('lightbox');

wp_register_script('elford', '/wp-content/themes/elford/js/elford.js', array('jquery','lightbox'));
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


<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />


<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/style-responsive.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript" src="http://fast.fonts.com/jsapi/fe2a6441-03d9-45a8-b12c-0b7002130a9f.js"></script>



<?php
	//gravity_form_enqueue_scripts($form_id, $is_ajax);
?>


<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

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
	
	<div id="featured-image" style="display:none">
		<?php
		   $prev_post = $post;
		   
			global $wp_query;
			$id = $wp_query->post->ID;
			$post_type = get_post_type();
	
			$is_front_page = is_front_page();
			$is_home = is_home();
			$is_page_portfolio = is_page("portfolio");
		   $show_red_box = true; //!$is_home && !$highest_parent;
		   $title = wp_title("", false);
		   
			// this whole featured-image div is only here to show very small screens instead of the gallery. 
			// it's an unfortunate waste but saves a ton of work in doing it right
		  query_posts( array( 'post_type' => 'portfolio', 'posts_per_page' => 1 ) );
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			echo get_the_post_thumbnail($post->ID, 'large');
			endwhile; endif; wp_reset_query();
			
			setup_postdata($prev_post);
		  ?>
	</div>
	
	<header id="branding" class="centering-container" role="banner">
		<div id="access-cont">
			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<div id="nav-main">
                <?php wp_nav_menu( array('menu' => 'Primary Navigation' )); ?>
				</div>
				<div class="clear"></div>
			</nav><!-- #access -->
		</div>
	</header><!-- #branding -->
	
	<div id="portfolio-slider" class="centering-container">
    
    <?php
	
		//top image loading "featured portfolio entry" only for home and portfolio
		if ( $is_front_page or $is_page_portfolio) {
		
		if ( $is_front_page ) {
			$tax = 	array(
						array(
							'taxonomy' => 'sectors',
							'field' => 'id',
							'terms' => 20,
						 )
					); 
					
					} elseif ($is_page_portfolio) {
			$tax = 	array(
						array(
							'taxonomy' => 'sectors',
							'field' => 'id',
							'terms' => 22,
						 )
					); 
					
					 }
					 
			$args = array (	
						'tax_query' => $tax,											
						'orderby' => 'rand',
						'showposts' => 1, 
					);	
			$rand_query = new WP_Query($args);
			while ($rand_query->have_posts()) : $rand_query->the_post(); ?>
                
		<div class="portfolio-item">
			<div class="portfolio-img-cont">
		
				<?php if ( $is_front_page ) { ?>
		
				<?php // if ( function_exists('nivoslider4wp_show') ) { nivoslider4wp_show(); } ?>
				<div class="gallery">
				<?php //echo get_the_post_thumbnail($post->ID, 'full-width'); ?>
				<?php
				$limit = (($is_front_page) ? 4 : 10);
				echo get_sliding_gallery($post->ID, $limit); ?>
				</div>
				
				<?php } elseif ($is_page_portfolio) { 
				
					echo get_the_post_thumbnail($id, 'full-width'); 
				
				 } ?>
				
			</div>
			<div id="portfolio-img-angle-cont"><div id="portfolio-img-angle"></div></div>
			
			<?php //if($is_front_page) { ?>
			<div class="centering-container absolute mode1">
				<div class="portfolio-meta">
					<div class="portfolio-meta-content">
						<h2><a href="<?php the_permalink(); ?>">Featured Projects</a></h2>
						<a href="<?php the_permalink(); ?>">
						<h3><?php the_title(); ?></h3>
						</a>
					</div>
				</div>
			</div>
			<?php //} ?>
            
            <?php endwhile; wp_reset_query(); setup_postdata($prev_post); ?>
                
            <?php } // End homepage image stuff, begin pages with real featured image; if a featured image is set on a page we'll display it
	
			elseif (has_post_thumbnail($id)) { ?>
                 
                 	<div class="portfolio-item">
			<div class="portfolio-img-cont">
				<?php echo get_the_post_thumbnail($id, 'full-width'); ?>
			</div>
			<div id="portfolio-img-angle-cont"><div id="portfolio-img-angle"></div></div>
			<?php // if(HAS CAPTION) { ?>
			<div class="centering-container absolute mode2">
				<div class="portfolio-meta" id="page-feat">
					<div class="portfolio-meta-content">
						<h2><?php  the_post_thumbnail_title($id); ?></h2>
						<h3><?php  the_post_thumbnail_caption($id); ?></h3>
					</div>
				</div>
			</div>
	       
             <?php } 
				// End pulling in featured images for posts, begin pulling in random thumbnail images for pages without a featured image, these link to the respective portfolio entries
				else { ?>
                
                <?php 
				$wpq = array (	'post_type' =>'portfolio',
								'showposts' => 1,
								'orderby' => 'rand'
				);
				$rand_query = new WP_Query($wpq);
				while ($rand_query->have_posts()) : $rand_query->the_post(); ?>

<div class="portfolio-item">
			<div class="portfolio-img-cont">
				<?php echo get_the_post_thumbnail($post->ID, 'full-width'); ?>
			</div>
			<div id="portfolio-img-angle-cont"><div id="portfolio-img-angle"></div></div>
			
			<?php if(true) { ?>
			<div class="centering-container absolute mode3">
				<div class="portfolio-meta" id="page-feat">
					<div class="portfolio-meta-content">
						<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
						<h3><?php  the_post_thumbnail_caption(); ?></h3>
						</a>
					</div>
				</div>
			</div>
			<?php } ?>


<?php endwhile; wp_reset_query(); setup_postdata($prev_post); ?>
                
                <?php } ?>
			
			<?php if($show_red_box) { ?>
			<div class="absolute">
				<div class="red-box">
					<div class="content">
					<?php 
					
					if($is_front_page) { 
						$section_title = "Contact Us";
						$section_link  = "/contact/";
					} 
					else if (('job' == $post_type) || (is_tax('job_types'))) { 
                        $section_title = "Careers";
						$section_link = "/careershr/";
                    }
					else if (('portfolio' == $post_type) || (is_tax('sectors')) || (is_search())) { 
                        $section_title = "Portfolio";
						$section_link = "/portfolio/";
					}
					
					
					
					else if(is_single() || is_archive()) {
						$section_title = "News";
						$section_link = "/news/";
					}
					else { 
						if($highest_parent) {
							$section_title = get_the_title($highest_parent);
							$section_link = get_permalink($highest_parent);
						}
						else {
							$section_title = $title;
						}
					}
						?>
						<a href='<?php echo $section_link ?>'><?php  echo $section_title; ?></a></div><br>
                        
                        
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	</div> <!-- header-wrapper -->

	<div id="main" class="centering-container">
    
 