<?php
/*
Template Name: Sub-Page
*/
get_header();

?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="body__content categories <?php echo $page_slug;?>">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="page__title pages <?php echo $page_slug;?>"><?php the_title(); ?></h1>
            
            <div class="page__text">
				<?php the_content(); ?>
			</div>
			
		<? endwhile; endif; ?> 
		
    </div>
</main>
<?php
get_footer();
?>