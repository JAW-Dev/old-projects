<?php get_header(); ?>
<main id="main" class="main" role="main">
  <div class="content__wrapper">
    <section id="post-<?php the_ID(); ?>" <?php post_class('entry__page'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <header class="entry__header">
        <?php fcwp_page_title( '404: Page Not Found'); ?>
      </header>
      <div id="section-heading-<?php the_ID(); ?>" class="entry__content content__default">
        <p><?php _e('Sorry, but the page you requested has not been found', 'fcwp'); ?></p>
        <p><?php _e('Check the spelling of the URL or try the search below', 'fcwp'); ?></p>
        <?php get_search_form(); ?>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>