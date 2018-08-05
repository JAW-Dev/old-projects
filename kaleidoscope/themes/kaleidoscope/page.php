<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="body__content full-about">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="page__title"><?php the_title(); ?></h1>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</main>
<?php get_footer(); ?>