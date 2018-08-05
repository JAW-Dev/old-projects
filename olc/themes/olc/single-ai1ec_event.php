<?php get_header(); ?>
<main id="main" class="main" role="main">
  <div class="content__wrapper">
    <?php 
    if ( have_posts() ) : 
      while ( have_posts() ) : 
        the_post();
        get_template_part( 'template-parts/content', 'article' );
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; 
    wp_reset_postdata();
    ?>
</main>
<?php get_footer(); ?>