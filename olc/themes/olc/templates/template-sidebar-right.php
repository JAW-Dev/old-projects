<?php
/*
Template Name: Sidebar Right
*/
get_header();
?>
<main id="main" class="main" role="main">
  <div class="content__wrapper">
    <?php 
    if ( have_posts() ) : 
      while ( have_posts() ) : 
        the_post();
        ?>
        <section id="post-<?php the_ID(); ?>" <?php post_class('entry__page'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
          <header class="entry__header">
            <?php fcwp_page_title(); ?>
          </header>
          <div class="entry__content content__sidebar content__sidebar--right">
            <div class="sidebar__main">
              <?php the_content(); ?>
            </div>
            <div class="sidebar__aside">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </section>
        <?php
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; 
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?>