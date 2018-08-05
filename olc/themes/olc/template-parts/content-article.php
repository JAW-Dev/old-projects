<article id="post-<?php the_ID(); ?>" <?php post_class('entry article'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry__featured-image">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php endif ?>
  <header id="section-heading-<?php the_ID(); ?>" class="entry__header">
    <?php the_title( sprintf( '<h1 class="entry__title" id="section-heading-<?php the_ID(); ?>"><a href="%s" rel="bookmark" role="link">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
  </header>
  <div class="entry__content content__default">
    <?php the_content(); ?>
  </div>
</article>