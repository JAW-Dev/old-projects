<?php get_header(); ?>
<section id="main" itemprop="mainContentOfPage" role="main">
    <header>
        <h1 class="page-title">
            <?php
            if ( is_day() ) :
                printf( __( 'Daily Archives: %s', DOMAIN ), get_the_date() );
            elseif ( is_month() ) :
                printf( __( 'Monthly Archives: %s', DOMAIN ), get_the_date( 'F Y' ) );
            elseif ( is_year() ) :
                printf( __( 'Yearly Archives: %d', DOMAIN ), get_the_date( 'Y' ) );
            else :
                _e( 'Archives', DOMAIN );
            endif;
            ?>
        </h1>
    </header>
    <?php get_template_part( 'template-parts/content/content' ); ?>   
</section>
<?php get_footer(); ?>