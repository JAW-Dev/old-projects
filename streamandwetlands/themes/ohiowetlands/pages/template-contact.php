<?php 
/*
Template Name: Contact
*/
?>
<?php if( isset ( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) { header( 'X-UA-Compatible: IE=edge,chrome=1' ); } ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9 ]><html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="icon" type="image/x-icon" />
<link href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" rel="apple-touch-icon" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="#main" class="skip-nav assistive-text"><?php _e('Skip to main Content', DOMAIN); ?></a>
<header class="header header__contact" itemscope itemtype="http://schema.org/WPHeader" role="banner">
    <div class="header__content">
        <?php get_template_part( 'template-parts/header/logo' ); ?>
    </div>
    <?php 
    $header_bg_id = get_post_meta( get_the_ID(), 'swf_header_background' );
    $header_bg = wp_get_attachment_url( $header_bg_id[0] );
    $swf_header_text_heading = ( get_field( 'swf_header_text_heading' ) ? get_field( 'swf_header_text_heading' ) : '' );
    $swf_header_text_body = ( get_field( 'swf_header_text_body' ) ? get_field( 'swf_header_text_body' ) : '' );
    $swf_header_url = ( get_field( 'swf_header_url' ) ? get_field( 'swf_header_url' ) : '' );
    $swf_header_link_text = ( get_field( 'swf_header_link_text' ) ? get_field( 'swf_header_link_text' ) : '' );
    if( !empty( $header_bg_id ) ) :
    ?>
    <figure class="header__bg" style="background-image: url(<?php echo $header_bg; ?>); background-size: cover;">
        <!-- <img src="<?php echo $header_bg; ?>" alt="Background Image"> -->
        <figcaption class="header__text contact-page">
            <?php if( $swf_header_text_heading != '' ) : ?>
            <span class="header__text--heading">
                <h2><?php echo $swf_header_text_heading; ?></h2>
            </span>
            <?php
            endif;
            if (have_posts()) : while (have_posts()) : the_post();
            ?>
            <div class="main__content">
            <?php the_content(); ?>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </figcaption>
    </figure>
    <?php endif; ?>
</header>
<nav class="nav-primary" itemscope itemtype="http://schema.org/SiteNavigationElement" role="navigation">
    <div class="nav-primary__content">
        <?php get_template_part( 'template-parts/menu/fullmenu' ); ?>
        <?php get_template_part( 'template-parts/menu/mobilemenu' ); ?>
    </div>
</nav>
<?php get_footer(); ?>