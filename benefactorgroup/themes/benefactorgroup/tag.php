<?php get_header(); ?>
<section id="main" itemprop="mainContentOfPage" role="main">
    <header>
        <h1 class="page-title"><?php printf( __( 'Tag: %s', DOMAIN ),  single_tag_title( '', false ) ); ?></h1>
    </header>
    <?php get_template_part( 'template-parts/content/content' ); ?>
</section>

<?php get_footer(); ?>