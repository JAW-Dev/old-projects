<article id="post-<?php the_ID(); ?>" <?php post_class('excerpt excerpt row'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
  <?php if( is_search() ) : ?>
    <header class="excerpt__header">
      <?php the_title( sprintf( '<h1 class="excerpt__title" id="section-heading-<?php the_ID(); ?>"><a href="%s" rel="bookmark" role="link">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    </header>
    <div class="excerpt__content">
      <?php
      $args = array(
        'length'           => '20',
        'has_ellipsis'     => true,
        'ellipsis'         => '<span class="ellipsis__dots">...</span>',
        'is_ellipsis_link' => false,
        'has_link'         => true,
        'link_text'        => '[ <span class="more__dots">...</span> View Page <span class="more__dots">...</span> ]',
        'link_class'       => 'more__link',
        'link_attr'        => 'rel="bookmark" role="link"',
      );
      fcwp_custom_excerpt( $args );
      ?>
    </div>
  <?php else : ?>
  <div class="excerpt__date">
    <?php the_time('n/j/Y'); ?>
  </div>
  <div class="excerpt__content-wrapper">
    <header class="excerpt__header">
      <?php the_title( sprintf( '<h1 class="excerpt__title" id="section-heading-<?php the_ID(); ?>"><a href="%s" rel="bookmark" role="link">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    </header>
    <div class="excerpt__content">
      <?php
      $args = array(
        'length'           => '20',
        'has_ellipsis'     => true,
        'ellipsis'         => '<span class="ellipsis__dots">...</span>',
        'is_ellipsis_link' => false,
        'has_link'         => true,
        'link_text'        => '[ <span class="more__dots">...</span> Continue Reading <span class="more__dots">...</span> ]',
        'link_class'       => 'more__link',
        'link_attr'        => 'rel="bookmark" role="link"',
      );
      fcwp_custom_excerpt( $args );
      ?>
    </div>
  </div>
  <?php endif; ?>
</article>