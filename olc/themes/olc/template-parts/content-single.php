<?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      $category   = get_the_category( get_the_id() );
      $category_link = get_category_link( $category[0]->term_id );
      get_template_part( 'template-parts/content', 'article' );
    endwhile; 
  else:
    get_template_part( 'template-parts/content', 'none' );
  endif; 
  wp_reset_postdata();
  ?>
  <div class="section-divider" role="divider">
    <a href="<?php echo home_url(); ?>/resources/news/">
      <p class="section-divider__text">
        <?php _e( 'In Circulation: More News', 'fcwp' ) ?>
      </p>
    </a>
  </div>
</div>