<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">

			<div id="content" role="main">
            
            <? $posts = query_posts($query_string . '&orderby=title&order=asc&posts_per_page=-1'); ?>

			<?php if ( have_posts() ) : ?>
					
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
    
     <div id="page-title"><h1>
					
					<?php if (is_tax('features')) { ?>
                    
                    <?php
						printf( __( 'Projects Featuring: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?>
					
					<?php } elseif (is_search()) { ?>
					
					 <?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?>
                    
                    <?php  } else { ?>
					<?php
						printf( __( '%s Projects', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?>
                    
                    <?php } ?>
                    
                    </h1>
                   </div>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

				
                
                <div class="portfolio-box">
<a href="<?php the_permalink(); ?>">
  <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
  </a>
  <div class="portfolio-meta">
  <a href="<?php the_permalink(); ?>">
  <h3><?php the_title(); ?></h3>
  </a>
</div>
  <?php // the_excerpt(); ?>
  </div>


				<?php endwhile; ?>
                
                </div>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

					<div class="entry-content">
    
     <div id="page-title"><h1>Nothing Found For: "<?php echo get_search_query(); ?>"</h1>
					</div>
					
						<p><?php _e( 'Apologies, but no results were found for the requested term. Perhaps trying another term will help find a related project.', 'twentyeleven' ); ?></p>
						<?php // get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<!-- left column -->
<div id="leftcolumn">
<?php
require('sidebar-portfolio.php');
?>
</div>
		
		
		<!-- right column -->
		<div id="rightcolumn">
		<?php get_sidebar(); ?>
		</div>

<?php get_footer(); ?>