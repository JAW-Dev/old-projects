<?php
/*
Template Name: Featured Projects
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="main__content">
    		<div class="col__half  post__left-content">
    			<?php 
                if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile; endif; wp_reset_postdata(); 
                ?>
	    	</div>
	    	<div class="col__half">
                <?php
                $fproject_query = new WP_Query(array(
                    'post_type'         =>'featured_project',
                    'posts_per_page'    => '999',
                    'no_found_rows'     => true
                ));
                if (have_posts()) : while ($fproject_query->have_posts()) : $fproject_query->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post__excerpt'); ?> role="article">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post__excerpt--image">
                            <?php the_post_thumbnail('post-excerpt'); ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="post__excerpt--title featured-project">
                        <?php the_title(); ?>
                    </h3>
                    <?php the_content(); ?>
                </article>
                <?php endwhile; endif; wp_reset_postdata(); ?>
	    	</div>
    </div>
</main>
<?php get_footer(); ?>