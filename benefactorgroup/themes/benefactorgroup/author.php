<?php get_header(); ?>
<section id="main" itemprop="mainContentOfPage" role="main">
    <header>
        <?php if ( have_posts() ) : the_post(); ?>
            <h1 class="page-title entry-meta-author byline vcard author">
                <span class="fn" itemprop="author" rel="author"><?php printf( __( 'Author: %s', DOMAIN ),  get_the_author() ); ?></span>
            </h1>
            <?php if ( get_the_author_meta( 'description' ) ) : ?>
                <div class="entry-meta-author-desc">
                    <?php the_author_meta( 'description' ); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php rewind_posts(); ?>
    </header>
    <?php get_template_part( 'template-parts/content/content' ); ?>
</section>
<?php get_footer(); ?>