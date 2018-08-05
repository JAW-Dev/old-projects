<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="body__content">
        <header>
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>
        <div class="content__row">
            <div class="col col__two-third">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="featured-image">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                } 
                ?>
                </div>
                <?php
                the_content();
                endwhile; endif; wp_reset_postdata();
                ?>
            </div>
            <div class="col col__one-third">
                <?php get_sidebar('home'); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>