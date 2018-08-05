<?php global $fp_query, $do_not_duplicate; ?>
<div class="featured-posts">
<?php
if (have_posts()) : while ($fp_query->have_posts()) : $fp_query->the_post();
	$ft_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured' );
	$url = $ft_image[0];

	$ft_image_retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured@2' );
	$url_retina = $ft_image_retina[0];

	$ft_image_small = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post' );
	$url_small = $ft_image_small[0];

	$ft_image_small_retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post@2' );
	$url_small_retina = $ft_image_small[0];

	$ft_image = get_post( get_post_thumbnail_id() );
	$ft_image_alt = get_post_meta( $ft_image->ID, '_wp_attachment_image_alt', true );
	$ft_image_caption = $ft_image->post_excerpt;
	$kl_featured_projects_title = ( get_field( 'kl_featured_projects_title', 'option' ) ? get_field( 'kl_featured_projects_title', 'option' ) : '' );
	$kl_fp_more_text = ( get_field( 'kl_fp_more_text', 'option' ) ? get_field( 'kl_fp_more_text', 'option' ) : '' );
	$kl_portfolio_excerpt = ( get_field( 'kl_portfolio_excerpt' ) ? get_field( 'kl_portfolio_excerpt') : '' );
	$kl_portfolio_description = ( get_field( 'kl_portfolio_description' ) ? get_field( 'kl_portfolio_description') : '' );
	$do_not_duplicate[] = get_the_ID();
?>
	<div class="content__row <?php echo ($fp_query->current_post%2 == 0?'featured__left':'featured__right'); ?>">
		<div class="content__one-third <?php echo terms_classes(); ?>">
			<p class="featured-posts__text"><em><?php echo $kl_featured_projects_title; ?></em></p>
			<h2 class="featured-posts__title"><?php the_title(); ?></h2>
			<?php
			if( function_exists( 'get_field' ) ) :
				if( $kl_portfolio_excerpt ) :
					echo $kl_portfolio_excerpt;
				else :
					echo limit_text( $kl_portfolio_description, array( 'limit' => 285, 'ellipsis' => '...' ) );
				endif;
			endif;
			?>
			<div class="more-link">
				<a href="<?php echo the_permalink(); ?>">
					<span class="plus">+</span><?php echo $kl_fp_more_text; ?><span class="plus">+</span>
				</a>
			</div>
		</div>
		<div class="content__two-third">
			<picture>
				<!--[if IE 9]><video style="display: none;"><![endif]-->
	            <source srcset="<?php echo $url_retina; ?>"  media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi) and (min-width: 600px)">
	            <source srcset="<?php echo $url; ?>" media="(min-width: 600px)"/>
	            <source srcset="<?php echo $url_small_retina; ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)"/>
	            <img src="<?php echo $url_small; ?>" alt="<?php echo $ft_image_alt ?>" />
	            <!--[if IE 9]></video><![endif]-->
	        </picture>
	        <div class="content__caption caption__mobile <?php echo terms_classes(); ?>">
				<p class="featured-posts__text"><em><?php echo $kl_featured_projects_title; ?></em></p>
				<h2 class="featured-posts__title"><?php the_title(); ?></h2>
			</div>
			<a href="<?php echo the_permalink(); ?>"></a>
		</div>
	</div>
<?php endwhile; endif; wp_reset_postdata(); ?>
</div>