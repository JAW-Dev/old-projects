<?php
/*
Template Name: Page Full
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="main__content">
    	<div class="col__full">
    		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    		<!-- <h2 class="page__heading"><?php the_title(); ?></h2> -->
    		<?php the_content(); ?>
    		<?php endwhile; endif; wp_reset_postdata(); ?>
    	</div>
    </div>
</main>
<?php get_footer(); ?>