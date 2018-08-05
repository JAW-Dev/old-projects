<?php global $port_query, $page_slug, $tax, $kl_enable_pagination, $kl_next_text, $kl_previous_text, $paged, $do_not_duplicate;  ?>
<div class="content__row">
	<div class="masonry js-masonry"  data-masonry-options='{ "gutter": 11, "isFitWidth": true }'>
		<?php
		if (have_posts()) : while ($port_query->have_posts()) : $port_query->the_post();

		$post_image_small = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post' );
		$url_small = $post_image_small[0];

		$post_image_small_retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post@2' );
		$url_small_retina = $post_image_small[0];

		$post_image = get_post( get_post_thumbnail_id() );
		$post_image_alt = get_post_meta( $post_image->ID, '_wp_attachment_image_alt', true );

		$kl_portfolio_excerpt = ( get_field( 'kl_portfolio_excerpt' ) ? get_field( 'kl_portfolio_excerpt') : '' );
		$kl_portfolio_description = ( get_field( 'kl_portfolio_description' ) ? get_field( 'kl_portfolio_description') : '' );
		$post_image = get_post( get_post_thumbnail_id() );
		$post_image_alt = get_post_meta( $post_image->ID, '_wp_attachment_image_alt', true );
		$post_image_caption = $post_image->post_excerpt;
		$kl_fp_more_text = ( get_field( 'kl_fp_more_text', 'option' ) ? get_field( 'kl_fp_more_text', 'option' ) : '' );
		$kl_portfolio_excerpt = ( get_field( 'kl_portfolio_excerpt' ) ? get_field( 'kl_portfolio_excerpt') : '' );
		$kl_portfolio_description = ( get_field( 'kl_portfolio_description' ) ? get_field( 'kl_portfolio_description') : '' );
		$terms = get_the_terms( $post->ID, 'portfolio_type' );
		$do_not_duplicate[] = get_the_ID();
		?>
		
		<div class="content__one-third masonry-item <?php echo $page_slug;?>">
			<picture>
				<!--[if IE 9]><video style="display: none;"><![endif]-->
		        <source srcset="<?php echo $url_small_retina; ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)"/>
		        <img src="<?php echo $url_small; ?>" alt="<?php echo $post_image_alt ?>" />
		        <!--[if IE 9]></video><![endif]-->
		    </picture>
		    <div class="content__caption <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
				<!-- <p class="posts__text"><em>project: <?php echo $page_slug; ?></em></p> -->
				<h2 class="posts__title"><?php the_title(); ?></h2>
			</div>
			<a href="<?php echo the_permalink(); ?>"></a>
		</div>
			
		<?php endwhile; ?>
	</div>
</div>
<?php 
if( $kl_enable_pagination == '1' ) :
	if (  $port_query->max_num_pages > 1 ) : 
?>
<nav class="pagination">
    <div class="nav-next">
        <?php next_posts_link( $kl_next_text, $port_query->max_num_pages ); ?>
    </div>
    <div class="nav-prev">
        <?php previous_posts_link( $kl_previous_text ); ?>
    </div>
</nav>
<?php
	endif;
endif;
?>
<?php endif; wp_reset_postdata(); ?>