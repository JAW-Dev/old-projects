<?php
/*
Template Name: Executive Search
*/
get_header();

?>
<main id="main" itemprop="mainContentOfPage" role="main">
	
	<div class="body__content">
		<header>
			  <h1 class="page-title"><?php the_title(); ?></h1>
		</header>
		<div class="content__row">
			<div class="col-9">
				<?php the_content(); ?>
		</div>
	</div><!-- /.body__content -->
	
	<div class="posts">
		  <?php
		$cats = get_terms([
			'taxonomy' => 'search_categories',
			'orderby' => 'term_id',
			'order' => 'DSC',
		]);

		foreach ($cats as $cat) :
			$cat_id = $cat->term_id;
			?>

			<section class="exec-section row clearfix">
				<h2 class="rockwell-light exec-title"><?php echo $cat->name; ?></h2>';
				<?php
				$exec_query = new WP_Query([
					'post_type'      => 'executive_searches',
					'posts_per_page' => '999',
					'tax_query'      => array(
						array(
							'taxonomy' => 'search_categories',
							'field'    => 'term_id',
							'terms'    => $cat_id,
						),
					),
					'no_found_rows'  => true,
					'orderby'        => 'date',
					'order'          => 'ASC',
				]);

				if ($exec_query->have_posts()) :
					while ($exec_query->have_posts()) :
						$exec_query->the_post();
						
						$company  = get_field('exec_search_company');
						$position = get_field('exec_search_position');
						$location = get_field('exec_search_location');
						$pdf_url  = get_field('exec_search_pdf');
						?>
						<div class="col-4 col-12-sm exec-col">
							
							<div class="exec-content">
								
								<div>
									<?php if ($cat->slug != 'completed-searches'): ?>
										<a class="exec-top" href="<?= $pdf_url; ?>">
											<?php
											if (has_post_thumbnail()):
												the_post_thumbnail();
											endif;
											?>
										</a>
									<?php else: ?>
										<div class="exec-top">
											<?php
											if (has_post_thumbnail()):
												the_post_thumbnail();
											endif;
											?>
										</div>
									<?php endif; ?>
								</div><!-- / div -->
								
								<div class="posts__excerpt">
									<h3 class="averin-next-lt uppercase"><?= $company; ?></h3>
									<?php if ($cat->slug != 'completed-searches'): ?>
										<a href="<?= $pdf_url; ?>"><h4 class="rockwell-light"><?= $position ?></a><small class="averin-next-thin uppercase"><?= $location; ?></small></h4>
									<?php else: ?>
										<div class="position"><h4 class="rockwell-light blue"><?= $position ?></div><small class="averin-next-thin uppercase"><?= $location; ?></small></h4>
									<?php endif; ?>
								</div><!-- / .posts__excerpt -->
							
							</div><!-- / .exec-content -->
							
						</div><!-- / .exec-col -->
					<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</section>
		<?php endforeach; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
