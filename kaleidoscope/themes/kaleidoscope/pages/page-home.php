<?php
/*
Template Name: Homepage
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<div class="body__content">
		<?php get_template_part( 'template-parts/content/content', 'fpimage' ); ?>
		<?php
		$fp_query = new WP_Query(array(
		    'post_type'         =>'portfolio',
		    'posts_per_page'    => '3',
		    'featured'			=> 'yes'
		));
		?>
		<?php get_template_part( 'template-parts/content/portfolio/featuredpost' ); ?>
    </div>
</main>
<?php
get_footer();
?>