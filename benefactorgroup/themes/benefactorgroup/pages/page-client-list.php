<?php
/*
Template Name: Client List
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
				<?php
				$cats = get_terms( 'client_categories' );
				foreach( $cats as $cat ) {
					$cat_id= $cat->term_id;
					echo '<h2 style="padding-top: 1em;">'.$cat->name.'</h2>';
					add_filter('posts_fields', 'fcwp_create_temp_column');
					add_filter('posts_orderby', 'fcwp_sort_by_temp_column');
					$client_query = new WP_Query(array(
							'post_type'         => 'clients',
							'posts_per_page'    => '999',
							'tax_query'			=> array(
									array(
										'taxonomy' 	=> 'client_categories',
										'field'		=> 'term_id',
										'terms'		=> $cat_id,
										),
								),
							'no_found_rows' 	=> true,
						'orderby'			=> 'title',
						'order'				=> 'DESC'
					));
					remove_filter('posts_fields','fcwp_create_temp_column');
					remove_filter('posts_orderby', 'fcwp_sort_by_temp_column');
					if (have_posts()) : while ($client_query->have_posts()) : $client_query->the_post();
					?>
								<div class="posts__excerpt">
						<a href="<?php echo the_permalink(); ?>" class="posts__excerpt-title"><?php the_title(); ?></a>
					</div>
					<?php
					endwhile; endif; wp_reset_postdata();
				}
				
				?>
			</div>
			<div class="col col__one-third">
				<?php get_sidebar('home'); ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
