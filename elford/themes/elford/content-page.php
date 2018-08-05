<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
       <?php
	   
	   $parents = array (5, 7,  9, 11, 13);
	   
	 if (is_page($parents))
			 { ?>
            
            <?php } else { ?>
			
             <a href="<?php echo get_permalink(); ?>"><div id="page-title"><h1><?php the_title(); ?></h1></div></a>
             
             <?php } 
             
             if('portfolio' == $post_type) { ?>
             
           <div class="portfolio-meta"><?php echo get_the_term_list( get_the_ID(), 'sectors', "<h2>Sector:</h2> " , ', ' ) ?><br />
		   <?php echo get_the_term_list( get_the_ID(), 'features', "<h2>Features & Innovations:</h2> " , ', ' ) ?></div>
             
             <?php } ?>
             
             <?php if ( is_home() || is_archive()) { ?>
             <div class="news-meta"><?php the_date(); ?> | <?php the_category(', '); ?></div>
             <?php the_excerpt(); ?>
             
             <?php } else { ?> 
    
		<?php the_content(); ?>
		
		<?php } ?>
		
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->


