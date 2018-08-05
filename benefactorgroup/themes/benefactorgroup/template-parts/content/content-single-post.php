<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
        <div class="entry__edit">
            <?php edit_post_link( 'Edit' ); ?> 
        </div>
        <header class="entry__header">
            <?php get_template_part( 'template-parts/entry/meta/title' ); ?>
        </header>
        <section class="entry__meta">
            <?php get_template_part( 'template-parts/entry/meta/author', 'link'); ?>
            <?php get_template_part( 'template-parts/entry/meta/date' ); ?>
            <?php get_template_part( 'template-parts/entry/meta/categories' ); ?>
            <?php get_template_part( 'template-parts/entry/meta/tags' ); ?>
        </section>
        <section class="entry__content" itemprop="articleBody">
            <?php get_template_part( 'template-parts/entry/thumbnail'); ?>
            <?php the_content(); ?>
        </section>
        <footer>
            <?php get_template_part( 'template-parts/entry/comment-count'); ?>
        </footer>
    </article>
<?php endwhile; ?>
    <?php get_template_part( 'template-parts/entry/linkpages'); ?>
<?php else : ?>
    <?php get_template_part( 'template-parts/content/content', 'none'); ?>
<?php endif; wp_reset_postdata(); ?>