<?php
/*
Template Name: News Full
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="main__content">
    	<div class="col__two-third">
    		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    		<h2 class="page__heading"><?php the_title(); ?></h2>
    		<?php the_content(); ?>
    		<?php endwhile; endif; wp_reset_postdata(); ?>
    		<?php
    		$swf_news_display_amount = ( get_field( 'swf_news_display_amount', 'option' ) ? get_field( 'swf_news_display_amount', 'option' ) : '' );
    		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	    	$wp_query = new WP_Query(array(
			    'post_type'         =>'post',
			    'posts_per_page'    => $swf_news_display_amount,
			    'paged'           => $paged
			));
			if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
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
			<?php endwhile; ?>
				<nav class="post__pagination">
				    <?php
				    global $wp_query;
				    if ( $wp_query->max_num_pages > 1 ) :
				    ?>
				        <?php // Single Line
				        $sep = ' - ';
				        $prelabel =  __( '&laquo; Previous', DOMAIN );
				        $nextlabel =  __( 'Next &raquo;', DOMAIN );
				        ?>
				        <?php // Numbered Pagination
				        $paginate_links_args = array(
				                'base'          => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				                'format'        => '?paged=%#%',
				                'total'         => $wp_query->max_num_pages,
				                'current'       => max( 1, get_query_var( 'paged' ) ),
				                'show_all'      => false,
				                'end_size'      => 1,
				                'mid_size'      => 2,
				                'prev_next'     => True,
				                'prev_text'     => $prelabel,
				                'next_text'     => $nextlabel,
				                'type'          => 'plain',
				                'add_args'      => False,
				                'add_fragment'  => ''
				            );
				        echo paginate_links( $paginate_links_args );
				        ?>
				<?php endif; ?>
				</nav>
			<?php endif; wp_reset_postdata(); ?>
    	</div>
    	<div class="col__one-third">
    		<?php get_sidebar(); ?>
    	</div>
    </div>
</main>
<?php get_footer(); ?>