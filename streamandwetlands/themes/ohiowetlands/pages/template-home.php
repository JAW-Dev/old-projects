<?php
/*
Template Name: Home
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="main__content">
    	<div class="col__half">
    		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    		<h2 class="page__heading"><?php _e( 'Quality Service', 'swf' ); ?></h2>
    		<?php the_content(); ?>
    		<?php endwhile; endif; wp_reset_postdata(); ?>
    		
    	</div>
    	<div class="col__half dotted">
	    	<h2 class="page__heading"><?php _e( 'Current News', 'swf' ); ?></h2>
    		<?php
	    	$fpnews_query = new WP_Query(array(
			    'post_type'         =>'post',
			    'posts_per_page'    => '4',
			    'no_found_rows'     => true
			));
			if (have_posts()) : while ($fpnews_query->have_posts()) : $fpnews_query->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('post__excerpt'); ?> role="article">
				<time datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date('n/j/Y', $post->ID) ; ?></time>
				<h3 class="post__excerpt--title">
				    <a href="<?php the_permalink(); ?>" itemprop="significantLink" rel="bookmark">
				        <span itemprop="name"><?php the_title(); ?></span>
				    </a>
				</h3 >
				<?php the_excerpt(); ?>
				<div class="button yellow excerpt">
		    		<a href="<?php echo the_permalink(); ?>"><?php _e( 'Read More', 'swf' ); ?></a>
		    	</div>
			</article>
			<?php endwhile; endif; wp_reset_postdata(); ?>
    	</div>
    </div>
</main>
<?php get_footer(); ?>