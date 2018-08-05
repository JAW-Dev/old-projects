<?php
/*
Template Name: Home
*/
get_header(); 
?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<?php 
	get_template_part( 'template-parts/content/fpage/hero' );
	get_template_part( 'template-parts/content/fpage/buttons' );
	get_template_part( 'template-parts/content/fpage/body' );
	?>
</main>
<?php get_footer(); ?>