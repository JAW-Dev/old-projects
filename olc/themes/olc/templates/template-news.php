<?php
/*
Template Name: News
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
          <?php fcwp_page_title( 'OLC News' ); ?>
        </header>
        <div class="entry__content content__default">
          <?php the_content(); ?>
          <?php
            endwhile; 
          else:
            get_template_part( 'template-parts/content', 'none' );
          endif; 
          wp_reset_postdata();
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $uai_query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => '10',
            'paged'          => $paged
          ));
          if( $uai_query->have_posts() ) :
            while( $uai_query->have_posts() ) : 
              $uai_query->the_post();
              get_template_part( 'template-parts/content', 'excerpt' );
            endwhile;
            ?>
              <div class="entry__catagory-link">
                <a href="<?php echo home_url(); ?>/resources/news/news-archive/">
                  <?php _e( 'Visit the News Archive' ); ?>
                </a>
              </div>
            <?php
          else:
            get_template_part( 'template-parts/content', 'none' );
          endif;
          wp_reset_postdata();
          ?>
      </div>
    </div>
</main>
<?php get_footer(); ?>