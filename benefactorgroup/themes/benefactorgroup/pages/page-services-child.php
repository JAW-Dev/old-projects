<?php
/*
Template Name: Services Child
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<div class="body__content">
		<?php
		$bene_resources_post_category = ( get_field( 'bene_resources_post_category' ) ? get_field( 'bene_resources_post_category' ) : '' );
		$posts_query = new WP_Query(array(
			'post_type'         => 'post',
			'category__in' 		=> $bene_resources_post_category,
			'post_per_page'		=> '3'
		));
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		<div class="content__row">
			<div class="col col__two-third">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					the_content();
				endwhile; endif; wp_reset_postdata();
				$cat_name = get_cat_name( $bene_resources_post_category );
				if( !empty( $bene_resources_post_category ) ) :
				?>
				<h3 class="subpost-title"><?php echo $cat_name; _e(' Posts'); ?></h3>
				<hr />
				<?php
					if (have_posts()) : while ($posts_query->have_posts()) : $posts_query->the_post();
						get_template_part( 'template-parts/content/posts' );
					endwhile; endif; wp_reset_postdata();
				endif;
				?>
			<div class="posts">
				<div class="button small">
					<a href="<?php echo home_url(); ?>/category/nonprofit-resources/"><?php _e("View All Resources"); ?></a>
				</div>
			</div>
			</div>
			<div class="col col__one-third">
				<?php get_sidebar('services-child'); ?>
			</div>
		</div>

	</div>
</main>
<?php get_footer(); ?>
