<?php get_header(); ?>
<main id="main" class="main" role="main">
  <div class="content__wrapper">
    <?php if ( have_posts() ) : ?>
      <section id="post-<?php the_ID(); ?>" <?php post_class('entry__page'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
        <header class="entry__header">
          <?php fcwp_archive_title(); ?>
        </header>
        <div class="entry__content content__default">
          <?php
          while ( have_posts() ) : 
            the_post();
            get_template_part( 'template-parts/content', 'excerpt' );
          endwhile; 
        fcwp_pagination( 'split' );
      ?></div><?php
    else:
      get_template_part( 'template-parts/content', 'none' );
      ?></section><?php
    endif; 
    wp_reset_postdata();
    ?>
  </div>
</main>
<?php get_footer(); ?>