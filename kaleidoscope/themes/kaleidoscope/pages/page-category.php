<?php
/*
Template Name: General
*/
get_header();
$page_slug = kl_get_page_slug();
$tax = kl_get_featured_post();
$do_not_duplicate = array();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="body__content categories <?php echo $page_slug;?>">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="page__title pages <?php echo $page_slug;?>"><?php the_title(); ?></h1>
            <div class="page__text">
				<?php the_content(); ?>
			</div>
        <?php endwhile; endif; rewind_posts(); ?>
        <?php
        if( $page_slug == 'what-we-do' ) {
			$fp_query = new WP_Query(array(
			    'post_type'         =>'portfolio',
			    'posts_per_page'    => '1',
			    'featured'			=> 'yes',
			    'tax_query' => array(
					array(
						'taxonomy' => $tax,
						'field'    => 'slug',
						'terms'    => array('consulting-planning', 'master-site-planning'),
					)
				)
			));
		} elseif( $page_slug == 'portfolios' ) {
			$fp_query = new WP_Query(array(
			    'post_type'         =>'portfolio',
			    'posts_per_page'    => '1',
			    'featured'			=> 'yes',
			));
		}
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
			    'post_type'         => 'portfolio',
			    'posts_per_page'    => '3',
			    'paged'           	=> $paged,
			    'post__not_in' 		=> $do_not_duplicate,
			));
		?>
		<?php get_template_part( 'template-parts/content/portfolio/portitem' ); ?>
		
		<?php
		$port_query = new WP_Query(array(
		    'post_type'         =>'portfolio',
		    'posts_per_page'    => '3',
		    'post__not_in' 		=> $do_not_duplicate,
		));
		$num = $port_query->post_count;
		if ( $num > 0 ) :
		?>
		<div class="body__content more-projects">
			<div class="more-projects__heading">
				<?php $kl_more_projects_text = ( get_field( 'kl_more_projects_text', 'option' ) ? get_field( 'kl_more_projects_text', 'option' ) : 'More Projects' ); ?>
				<h3><em><?php echo $kl_more_projects_text; ?></em></h3>
			</div>
			<?php get_template_part( 'template-parts/content/portfolio/portitem' ); ?>
		</div>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
?>