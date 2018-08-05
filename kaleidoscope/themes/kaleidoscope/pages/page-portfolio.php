<?php
/*
Template Name: Portfolio Listings
*/
get_header(); 
$page_slug = kl_get_page_slug();
$tax = kl_get_featured_post();
$do_not_duplicate = array();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="body__content portfolio-listings <?php echo $page_slug;?> <?php echo $tax; ?>">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="page__title pages <?php echo $page_slug;?>"><?php the_title(); ?></h1>
            <div class="page__text">
				<?php the_content(); ?>
			</div>
        <?php endwhile; endif; rewind_posts(); ?>
        <?php
			$fp_query = new WP_Query(array(
			    'post_type'         =>'portfolio',
			    'posts_per_page'    => '1',
			    'featured'			=> 'yes',
			    'tax_query' => array(
					array(
						'taxonomy' => $tax,
						'field'    => 'slug',
						'terms'    => $page_slug,
					),
				)
			));
		?>
		<?php get_template_part( 'template-parts/content/portfolio/featuredpost' ); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		<?php
			$kl_listings_amount = ( get_field( 'kl_listings_amount', 'option' ) ? get_field( 'kl_listings_amount', 'option' ) : '9' );
			$kl_enable_pagination = ( get_field( 'kl_enable_pagination', 'option' ) ? get_field( 'kl_enable_pagination', 'option' ) : '0' );
			$kl_next_text = ( get_field( 'kl_next_text', 'option' ) ? get_field( 'kl_next_text', 'option' ) : 'Next' );
			$kl_previous_text = ( get_field( 'kl_previous_text', 'option' ) ? get_field( 'kl_previous_text', 'option' ) : 'Previous' );
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$port_query = new WP_Query(array(
			    'post_type'         =>'portfolio',
			    'posts_per_page'    => $kl_listings_amount,
			    'paged'           	=> $paged,
			    'post__not_in' 		=> $do_not_duplicate,
			    'tax_query' => array(
					array(
						'taxonomy' => $tax,
						'field'    => 'slug',
						'terms'    => $page_slug,
					),
				)
			));
		?>
		<?php get_template_part( 'template-parts/content/portfolio/portitem' ); ?>
    </div>
</main>
<?php get_footer(); ?>