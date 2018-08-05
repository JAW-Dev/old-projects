<?php
/*
Template Name: Services
*/
get_header();
$do_not_duplicate = array();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="body__content">
        <header>
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>
        <div class="content__row">
            <div class="col col__two-third">
                <?php 
                if (have_posts()) : while (have_posts()) : the_post();
                ?>
                <div class="featured-image">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                } 
                ?>
                </div>
                <?php
                the_content();
                ?>
                <h2 class="faq__heading">Resources</h2>
                <div class="faq accordion-content">
                <?php
                if( have_rows('bene_faq') ):
                	while ( have_rows('bene_faq') ) : the_row();
                		$bene_question = ( get_sub_field( 'bene_question' ) ? get_sub_field( 'bene_question' ) : '' );
                		$bene_answer = ( get_sub_field( 'bene_answer' ) ? get_sub_field( 'bene_answer' ) : '' );
                        $do_not_duplicate[] = get_the_ID();
                		?>
                		<h3 class="faq__question accordion-header">
                			<div class="question__wrap"><?php echo $bene_question; ?></div>
                		</h3>
                		<div class="faq__answer accordion-content">
                			<?php echo $bene_answer; ?>
                		</div>
                		<?php
                	endwhile;
                endif;
                ?>
                </div>
                <?php
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