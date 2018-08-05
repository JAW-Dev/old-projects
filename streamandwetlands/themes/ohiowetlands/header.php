<?php if( isset ( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) { header( 'X-UA-Compatible: IE=edge,chrome=1' ); } ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
<meta name="msapplication-TileColor" content="#3f93ab">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#3f93ab">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="#main" class="skip-nav assistive-text"><?php _e('Skip to main Content', DOMAIN); ?></a>
<?php
$slug = get_page_template_slug( get_the_ID() );
?>
<header class="header<?php if( $slug == 'pages/template-mitigation.php' || is_404() || is_single() || is_archive() ) { echo ' mit-map'; } ?> " itemscope itemtype="http://schema.org/WPHeader" role="banner">
	<div class="header__content">
		<?php get_template_part( 'template-parts/header/logo' ); ?>
	  </div>
	  <?php get_template_part( 'template-parts/header/heroimage' ); ?>
</header>
<nav class="nav-primary" itemscope itemtype="http://schema.org/SiteNavigationElement" role="navigation">
	<div class="nav-primary__content">
		<?php get_template_part( 'template-parts/menu/fullmenu' ); ?>
		<?php get_template_part( 'template-parts/menu/mobilemenu' ); ?>
	</div>
</nav>
