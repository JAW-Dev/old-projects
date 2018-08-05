<?php
/*
Template Name: Board Of Directors
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
      <section id="post-<?php the_ID(); ?>" <?php post_class('entry__members'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
        <header class="entry__header">
            <?php fcwp_page_title(); ?>
          </header>
      </section>
      <?php
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; 
    wp_reset_postdata();
    ?>
    <div class="entry__content  content__default">
      <h3><?php _e('Officers', 'fcwp' ); ?></h3>
      <?php
        $members_query = new WP_Query( array(
            'post_type'      => 'members',
            'posts_per_page' => '99',
            'meta_key'       => 'olc_members_type',
            'meta_value'     => 'board',
            'no_found_rows'  => true
        ));
        if( have_posts() ) :
          ?>
          <section class="masonry">
          <?php
          while( $members_query->have_posts() ) :
            $members_query->the_post();
            get_template_part( 'template-parts/content', 'members' );
          endwhile;
          ?></section><?php
        endif; 
        wp_reset_postdata();
      ?>
    </div>
  </div>
  
  <div class="entry__content  content__default">
    <h3><?php _e( 'Members', 'fcwp' ); ?></h3>
      <?php
        $members_query = new WP_Query( array(
            'post_type'      => 'members',
            'posts_per_page' => '99',
            'meta_key'       => 'olc_members_type',
            'meta_value'     => 'members',
            'no_found_rows'  => true
        ));
        if( have_posts() ) :
          ?>
          <section class="masonry">
          <?php
          while( $members_query->have_posts() ) :
            $members_query->the_post();
            get_template_part( 'template-parts/content', 'members' );
          endwhile;
          ?></section><?php
        endif; 
        wp_reset_postdata();
      ?>
    </div>
    
    <div class="entry__content  content__default">
      <h3><?php _e( 'Other', 'fcwp' ); ?></h3>
      <?php
        $members_query = new WP_Query( array(
            'post_type'      => 'members',
            'posts_per_page' => '99',
            'meta_key'       => 'olc_members_type',
            'meta_value'     => 'other',
            'no_found_rows'  => true
        ));
        if( have_posts() ) :
          ?>
          <section class="masonry">
          <?php
          while( $members_query->have_posts() ) :
            $members_query->the_post();
            get_template_part( 'template-parts/content', 'members' );
          endwhile;
          ?></section><?php
        endif; 
        wp_reset_postdata();
      ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>