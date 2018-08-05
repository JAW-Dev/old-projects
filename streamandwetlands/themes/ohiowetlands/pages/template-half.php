<?php
/*
Template Name: Page Half
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="main__content">
    		<?php 
    		if (have_posts()) : while (have_posts()) : the_post(); 
    		$swf_half_lead_content = ( get_field( 'swf_half_lead_content' ) ? get_field( 'swf_half_lead_content' ) : '' );
    		?>
    		<div class="col__half  post__left-content">
    			<?php echo $swf_half_lead_content; ?>
	    	</div>
	    	<div class="col__half">
	    		<?php the_content(); ?>
	    	</div>
    	<?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</main>
<?php get_footer(); ?>