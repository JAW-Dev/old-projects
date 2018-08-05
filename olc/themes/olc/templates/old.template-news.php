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
          fcwp_news_listing( 'updates-and-information', 'Updates and Information' );
          fcwp_news_listing( 'olc-activities', 'OLC Activities' );
          fcwp_news_listing( 'government-relations', 'Government Relations' );
          fcwp_news_listing( 'professional-development', 'Professional Development' );
          fcwp_news_listing( 'public-library-funding', 'Public Library Funding' );
          fcwp_news_listing( 'miscellaneous', 'Miscellaneous' ); 
          ?>
      </div>
    </div>
</main>
<?php get_footer(); ?>