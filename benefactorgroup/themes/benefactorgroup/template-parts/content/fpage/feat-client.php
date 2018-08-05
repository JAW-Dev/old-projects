<?php
$fc_query = new WP_Query(array(
  'post_type'      => 'clients',
  'posts_per_page' => '4',
  'featured'       => 'yes'
));
$posts_per_row = 2;
$post_counter = 0;
if( have_posts() ) :
  while( $fc_query->have_posts() ) : 
    $fc_query->the_post();
    $bene_post_subtitle = ( get_field( 'bene_post_subtitle' ) ? get_field( 'bene_post_subtitle' ) : '' );
    $bene_is_case_study = ( get_field( 'bene_is_case_study' ) ? get_field( 'bene_is_case_study' ) : '' );
    $case_study         = ( $bene_is_case_study ? ': Case Study' : '' );
    $get_terms          = get_the_terms( get_the_ID(), 'tasks' );
    $terms              = ( is_array( $get_terms ) ) ? array_pop( $get_terms ) : '';
    $term               = ( $terms != '' ) ? $terms->name : '';
    if( ( ++$post_counter % $posts_per_row ) == 1  || $posts_per_row == 1 ) :
      if( $post_counter > 1 ) :
        echo '</div>';
      endif;
      echo '<div class="featured-row">';
    endif;
    ?>
    <div class="featured-cs">
      <figure class="featured-cs__image">
        <a href="<?php echo the_permalink(); ?>">
          <?php the_post_thumbnail( 'case_study' );?>
        </a>
      </figure>
      <h3 class="featured-cs__title avernir">
        <a href="<?php echo the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h3>
      <h4 class="featured-cs__subtitle rockwell">
        <a href="<?php echo the_permalink(); ?>">
          <?php echo $term . ' ' . $bene_post_subtitle . $case_study; ?>
        </a>
      </h4>
    </div>
    <?php endwhile; ?>
  </div>
<?php
endif; 
wp_reset_postdata();