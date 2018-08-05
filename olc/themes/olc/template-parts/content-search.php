<?php if ( have_posts() ) : ?>
  <header id="entry__header" class="entry__header">
    <h1 id="section-heading-<?php the_ID(); ?>" class="entry__title">
      <?php printf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h1>
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
endif; 
wp_reset_postdata();
?>