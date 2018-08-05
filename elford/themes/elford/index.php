<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage elford
 */

require('page.php');
exit();

get_header();

$parents = get_post_ancestors($post->ID);
$highest_parent = ($parents) ? $parents[count($parents)-1]: $post->ID;

?>
		<!-- middle column -->
		<div id="primary">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
	
<?php
// PAGE SPECIFIC STUFF

// begin jobs 
if($in_template=="jobs") { ?>				
	<div class="open-jobs">
	<h2>Open Jobs</h2>

	<?php
	query_posts( array( 'post_type' => 'job' ) );
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	<div class="job-box">
	<div class="bike-meta">
	<a href="<?php the_permalink(); ?>">
	<h3><?php the_title(); ?></h3>
	</a>
	<?php echo get_the_term_list( get_the_ID(), 'job_types', "Job Type: " , ', ' ) ?>
	</div>
	<?php the_excerpt(); ?>
	</div>

	<?php endwhile; endif; wp_reset_query(); ?>
 </div>
<?php
} // end jobs 

// begin portfolio
else if($in_template == "portfolio") {
?>


                   <div class="open-jobs">
               <h2>Recent Portfolio Items</h2>
                
                <?php
  query_posts( array( 'post_type' => 'portfolio' ) );
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div class="portfolio-box">
<a href="<?php the_permalink(); ?>">
  <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
  </a>
  <div class="portfolio-meta">
  <a href="<?php the_permalink(); ?>">
  <h3><?php the_title(); ?></h3>
  </a>
<?php echo get_the_term_list( get_the_ID(), 'sectors', "Sector: " , ', ' ) ?><br />
<?php echo get_the_term_list( get_the_ID(), 'features', "Features & Innovations: " , ', ' ) ?>
</div>
  <?php the_excerpt(); ?>
  </div>

<?php endwhile; endif; wp_reset_query(); ?>

 </div>
 <?php
}
// end portfolio
?>
			</div><!-- #content -->
		</div><!-- #primary -->
		
        
	<!-- left column -->
	<div id="leftcolumn">
		<ul id="subnav"><?php 
		wp_list_pages("title_li=&child_of={$highest_parent}");
		?></ul>
	</div>
    
	
		
		<!-- right column -->
		<div id="rightcolumn">
		<?php get_sidebar(); ?>
		</div>

<?php get_footer(); ?>