<?php
if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){
    header('X-UA-Compatible: IE=edge,chrome=1');
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="icon" type="image/x-icon" />
<link href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" rel="apple-touch-icon" />
<link href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet" media="screen" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="#main" class="skip-nav assistive-text"><?php _e('Skip to main Content', DOMAIN); ?></a>
<header class="body__header" itemscope itemtype="http://schema.org/WPHeader" role="banner">
    <div class="body__content">
        <?php get_template_part( 'template-parts/content/header/logo' ); ?>
        <?php get_template_part( 'template-parts/content/header/navfull' ); ?>
        <?php get_template_part( 'template-parts/content/header/navmobile' ); ?>
    </div>
	<div class="zigzag"></div>
	<div class="shadow"></div>
</header>
