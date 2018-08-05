<?php 
get_header(); 
$page_slug = kl_get_page_slug();
$do_not_duplicate = array();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php
		$do_not_duplicate[] = $post->ID;
		$terms = wp_get_post_terms( $post->ID, 'portfolio_type' );
		$rows = get_field('kl_portfolio_image_gallery' );
		get_template_part( 'template-parts/content/single/topfull' );
		get_template_part( 'template-parts/content/single/topmobile' );
		get_template_part( 'template-parts/content/single/mainfull' );
		get_template_part( 'template-parts/content/single/mainmobile' );
	?>
	<?php endwhile; endif; wp_reset_postdata(); ?>

	<div class="body__content gallery-rest">
		<div class="content__row">
			<?php $kl_gallery_lable = ( get_field( 'kl_gallery_lable', 'option' ) ? get_field( 'kl_gallery_lable', 'option' ) : 'More Projects' ); ?>
			<h3><em>More Images</em></h3>
			<div class="masonry js-masonry"  data-masonry-options='{ "gutter": 11, "isFitWidth": true }'>
			<?php
			if( have_rows('kl_portfolio_image_gallery') ):
			    while ( have_rows('kl_portfolio_image_gallery') ) : the_row();
					$image = get_sub_field('kl_gallery_image');
					$caption = get_sub_field('kl_gallery_caption');
					$id = $image['id'];
					$url = $image['url'];
					$alt = $image['alt'];
					$img_post = $image['sizes']['post'];
					$img_post_retina = $image['sizes']['post@2'];
					$img_full = $image['sizes']['large'];
					if( !in_array( $id, $do_not_duplicate ) ) {
						?>
						<div class="content__one-third masonry-item">
							<a href="<?php echo $img_full; ?>" class="lightbox" title="<?php echo $caption; ?>">
							<picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
						        <source srcset="<?php echo $img_post_retina; ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)"/>
						        <img src="<?php echo $img_post; ?>" alt="<?php echo $alt ?>" />
						        <!--[if IE 9]></video><![endif]-->
						    </picture>
						    </a>
						</div>
						<?php
					}
					?>
					<?php
			    endwhile;
			endif;
			?>
			</div>
		</div>
	</div>

	<?php
	$the_list = $terms[0];
	$port_query = new WP_Query(array(
	    'post_type'         =>'portfolio',
	    'posts_per_page'    => '3',
	    'post__not_in' 		=> $do_not_duplicate,
	    'tax_query' => array(
			array(
				'taxonomy' => $the_list->taxonomy,
				'field'    => 'slug',
				'terms'    => $the_list->slug,
			),
		),
	));
	$num = $port_query->post_count;
	if ( $num > 0 ) :
		?>
	<div class="body__content more-projects">
		<div class="more-projects__heading">
			<?php $kl_more_projects_text = ( get_field( 'kl_more_projects_text', 'option' ) ? get_field( 'kl_more_projects_text', 'option' ) : 'More Projects' ); ?>
			<?php if( is_single() ) : ?>
				<h3><em>More <?php echo wp_strip_all_tags( get_the_term_list( $post->ID, 'portfolio_type', ' ' ) ); ?> Projects</em></h3>
			<?php else: ?>
			<h3><em>More Projects</em></h3>
			<?php endif; ?>
		</div>
		<?php get_template_part( 'template-parts/content/portfolio/portitem' ); ?>
	</div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>