<!DOCTYPE html>
<!--[if IE 8 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
<?php wp_head(); ?>
<script>
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=245867275449045";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/d79e8bfd-5846-4313-8e1b-940e5c8f9d0f.css"/>
<?php
// Giving USA Attachments for Face Book
if( is_attachment() ) :
	$fb_url      = get_permalink( $post->id );
	$post_object = get_post( $post->id );
	$fc_content  = $post_object->post_content;
	$fb_att_url  = wp_get_attachment_url( $post->id );
	if( strpos ( $fb_url, 'giving-usa-2015' ) !== false ) :
	 $fb_url = 'Giving USA 2015 -' . get_the_title();
	endif;
?>
<meta property="og:description" content="<?php echo $fc_content; ?>">
<meta property="og:image" content="<?php echo $fb_att_url ?>">
<?php endif; ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<div class="container">
	<div id="body__overlay" class="body__overlay"></div>
	<a href="#main" class="skip-nav assistive-text"><?php _e('Skip to main Content', DOMAIN); ?></a>
	<header class="body__header" role="banner">
		<div class="body__content">
			<?php get_template_part( 'template-parts/content/header/logo' ); ?>
			<?php get_template_part( 'template-parts/content/header/menu' ); ?>
		</div>
	</header>
