<?php
/*
Template Name: About
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main" class="about-page">
	<?php get_template_part( 'template-parts/content/about/aboutfull' ); ?>
	<?php get_template_part( 'template-parts/content/about/aboutmobile' ); ?>
</main>
<?php get_footer(); ?>