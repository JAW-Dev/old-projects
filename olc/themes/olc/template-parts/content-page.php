<?php 
if ( have_posts() ) : 
  while ( have_posts() ) : 
    the_post();
    ?>
    <section id="post-<?php the_ID(); ?>" <?php post_class('entry__page'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <header id="section-heading-<?php the_ID(); ?>" class="entry__header">
        <?php fcwp_page_title(); ?>
      </header>
      <div class="entry__content content__default">
        <?php the_content(); ?>
      </div>
    </section>
    <?php
  endwhile; 
else:
  get_template_part( 'template-parts/content', 'none' );
endif; 
wp_reset_postdata();
?>