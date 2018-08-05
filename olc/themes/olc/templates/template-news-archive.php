<?php
/*
Template Name: News Archive
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
          <?php fcwp_page_title( 'OLC News Archive' ); ?>
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
            'paged'          => $paged,
            'date_query'     => array(
                'column'  => 'post_date',
                'after'   => '- 256 days'
            )
          ));
          $tmp_query = $wp_query;
          $wp_query  = null;
          $wp_query = $uai_query;
          if( $uai_query->have_posts() ) :
            while( $uai_query->have_posts() ) : 
              $uai_query->the_post();
              get_template_part( 'template-parts/content', 'excerpt' );
            endwhile;
            echo dfw_pagination();
          else:
            get_template_part( 'template-parts/content', 'none' );
          endif;
          wp_reset_postdata();
          $wp_query = null;
          $wp_query = $tmp_query;
          ?>
      </div>
    </div>
</main>
<?php get_footer(); ?>