<?php
/*
Template Name: Portfolio nav and recent items
*/

$in_template = "portfolio";

// get portfolio navigation as $replacement_nav
$extra_nav = "<ul id='portfolio-nav'>";
$extra_nav .= wp_list_pages(array(
		"echo"=>0,
		"post_type"=>"portfolio",
		"title_li"=>null,
));
$extra_nav .= "</ul>";

// get recent portfolio items as $after_content
ob_start();
?>
<!-- <div class="recent-portfolio">
               <h2>Recent Portfolio Items</h2>
                
                <?php
  query_posts( array( 'post_type' => 'portfolio', 'posts_per_page'=> 6 ) );
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
<?php echo get_the_term_list( get_the_ID(), 'sectors', "<div class='meta-title'>Sector:</div> " , ', ' ) ?><br />
<?php echo get_the_term_list( get_the_ID(), 'features', "<div class='meta-title'>Features & Innovations:</div> " , ', ' ) ?>
</div>
  <?php the_excerpt(); ?>
  </div>
<?php endwhile; endif; wp_reset_query(); ?>
 </div> -->
 <?php
$after_content = ob_get_clean();

require('page.php');