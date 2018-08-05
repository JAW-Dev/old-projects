<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="main__content single">
        <header>
            <h1 class="page__heading"><?php the_title(); ?></h1>
        </header>
        <div class="content__row">
            <div class="col__full">
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
        </div>
    </div>
</main>
<?php get_footer(); ?>