<?php
/*
Template Name: Case Studies
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<div class="body__content">
		<header>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
		<div class="posts content__row">
			<div class="col col__two-third">
				<div id="masonry-loop">
					<?php
					$cs_query = new WP_Query(array(
							'post_type'      => 'clients',
							'posts_per_page' => '4',
							'meta_key'       => 'bene_is_case_study',
							'meta_value'     => true,
							'featured'       => 'yes',
					));
					if (have_posts()) : while ($cs_query->have_posts()) : $cs_query->the_post();
					$term = wp_get_post_terms( get_the_ID(), 'client_categories' );
					$term_link = get_term_link( $term[0]->term_id, 'client_categories' );
					?>
						<div class="col__one-half masonry">

							<?php if ( has_post_thumbnail() ) : ?>
								<div class="featured-image case-st">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('page-small'); ?>
								</a>
								</div>
								<?php
								endif;
							?>
							<div class="posts__excerpt">
								<a href="<?php echo the_permalink(); ?>" class="posts__excerpt-title"><?php the_title(); ?></a>
							</div>
							<div class="fcs__excerpt">
								<?php the_excerpt(); ?>
							</div>
							<div class="fcs__meta">
								<div class="fcs__more buttons">
									<a href="<?php the_permalink(); ?>">Read More</a>
								</div>
								<div class="fcs__catlink buttons">
									<a href="<?php echo $term_link ?>">View More <?php echo $term[0]->name; ?></a>
								</div>
							</div>
						</div>
					<?php
					endwhile; endif; wp_reset_postdata();
					?>
				</div>
				<div style="clear:both"></div>
				<div class="general buttons">
					<a href="<?php echo home_url() . '/clients-list/' ?>"><?php _e('View Complete Client List', DOMAIN ); ?></a>
				</div>
			</div>

			<div class="col col__one-third">
				<?php
				if ( is_page( 'clients' ) ) :
					get_sidebar('clients');
				else :
					get_sidebar('home');
				endif;
				?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
