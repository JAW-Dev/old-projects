<?php
/**
 * Single
 *
 * @package BenefactorGroup
 */
get_header();
$do_not_duplicate = array();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<div class="body__content">
		<?php
		
		if(have_posts()) :
			while (have_posts()) :
				the_post();
					if( have_rows('bene_case_images') ) :
						while( have_rows('bene_case_images') ) :
							the_row();
							$slider_img = ( get_sub_field( 'bene_case_image' ) ? get_sub_field( 'bene_case_image' ) : '' );
						endwhile;
					endif;
			endwhile;
		endif;
		wp_reset_postdata();
		
		if( is_singular( 'clients' ) && $slider_img ) :
			get_template_part( 'template-parts/content/pages/slider' );
		elseif( is_singular( 'team_member' ) ):
			get_template_part( 'template-parts/content/pages/teamimage' );
		endif;
		
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				$do_not_duplicate[] = get_the_ID();
		?>
				<header>
					<h1 class="page-title"><?php the_title(); ?></h1>
					<div class="page-meta">
						<?php
						if( is_singular( 'team_member' ) ) :
							get_template_part( 'template-parts/content/pages/teaminfo' );
						else :
							get_template_part( 'template-parts/content/pages/singleterms' );
						endif;
						?>
					</div>
				</header>
		
				<div class="content__row">
					<div class="col col__two-third">
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="featured-image">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php
						endif;
						the_content();
						get_template_part( 'template-parts/content/pages/author' );
						?>
					</div>
					<div class="col col__one-third">
						<?php
						if ( is_singular( 'team_member' ) ) :
							get_sidebar('team');
						elseif ( is_singular( 'clients' ) ) :
							get_sidebar('clients');
						else :
							get_sidebar('home');
						endif;
						?>
					</div>
				</div>
		
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		
		if( is_singular( 'clients' ) ) :
		?>
			<div class="cs-featured-title">Related Case Studies</div>
				<div class="cs-featured-posts">
					<?php
					$post_term = $terms = wp_get_post_terms( get_the_ID(), 'client_categories');
					$cs_query = new WP_Query(array(
						'post_type'         => 'clients',
						'posts_per_page'    => '3',
						'featured'          => 'yes',
						'post__not_in'      => $do_not_duplicate,
						'tax_query' => array(
								array(
									'taxonomy' => 'client_categories',
									'field'    => 'slug',
									'terms'    => $post_term[0]->slug,
								),
							)
					));
					get_template_part( 'template-parts/content/featured/casestudies' );
					$cs_query = new WP_Query(array(
						'post_type'         => 'clients',
						'posts_per_page'    => '3',
						'featured'          => 'yes',
						'post__not_in'      => $do_not_duplicate,
						'tax_query' => array(
								array(
									'taxonomy' => 'client_categories',
									'field'    => 'slug',
									'terms'    => $post_term[0]->slug,
								),
							)
					));
					get_template_part( 'template-parts/content/featured/casestudies' );
					?>
				</div>
		<?php else : ?>
			
			<div class="cs-featured-title">Featured Case Studies</div>
				<div class="cs-featured-posts">
					<?php
					$cs_query = new WP_Query(array(
						'post_type'         => 'clients',
						'posts_per_page'    => '3',
						'featured'          => 'yes',
						'post__not_in'      => $do_not_duplicate
					));
					get_template_part( 'template-parts/content/featured/casestudies' );
					$cs_query = new WP_Query(array(
						'post_type'         => 'clients',
						'posts_per_page'    => '3',
						'featured'          => 'yes',
						'post__not_in'      => $do_not_duplicate
					));
					get_template_part( 'template-parts/content/featured/casestudies' );
					?>
				</div>
		<?php endif; ?>
		</div>
		
	</div>
</main>
<?php get_footer(); ?>
