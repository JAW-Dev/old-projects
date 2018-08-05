<?php
/*
Template Name: Home
*/
get_header();
?>
<main id="main" class="main" role="main">
  <?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      get_template_part( 'template-parts/frontpage/content', 'tagline' );
      get_template_part( 'template-parts/frontpage/content', 'announcement' );
      get_template_part( 'template-parts/frontpage/content', 'boxes' );
      get_template_part( 'template-parts/frontpage/divider' );
    endwhile; 
  else:
    get_template_part( 'template-parts/content', 'none' );
  endif; 
  wp_reset_postdata();
  get_template_part( 'template-parts/frontpage/content', 'news' );
  ?>
</main>
<?php get_footer(); ?>