<?php
$posts_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-excerpt' );
$posts_image_url = $posts_image[0];
$posts_image_retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-excerpt@2' );
$posts_image_retina_url = $posts_image_retina[0];
$posts_image_data = get_post( get_post_thumbnail_id() );
$posts_image_alt = get_post_meta( $posts_image_data->ID, '_wp_attachment_image_alt', true );
$bene_is_case_study = ( get_field( 'bene_is_case_study' ) ? get_field( 'bene_is_case_study' ) : '' );

?>
<div class="posts <?php echo get_post_type( $post ) ?>">
	<?php if( $posts_image ) : ?>
	<div class="posts__excerpt-image">
		<a href="<?php echo the_permalink(); ?>">
			<div class="image-overlay"></div>
			<img src="<?php echo $posts_image_url ?>" alt="<?php echo $posts_image_alt ?>" />
        </a>
	</div>
	<?php 
	else : 
		$bene_post_default_image = ( get_field( 'bene_post_default_image' ) ? get_field( 'bene_post_default_image' ) : '' );
	?>
	<!-- <div class="posts__excerpt-image">
		<a href="<?php echo the_permalink(); ?>">
			<div class="image-overlay"></div>
			<picture> -->
	            <!--[if IE 9]><video style="display: none;"><![endif]-->
	            <!-- <source srcset="<?php echo z_taxonomy_image_url($bene_post_default_image, 'post-excerpt@2'); ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)">
	            <img src="<?php echo z_taxonomy_image_url($bene_post_default_image, 'post-excerpt'); ?>" alt="<?php the_title(); ?>" /> -->
	            <!--[if IE 9]></video><![endif]-->
	        <!-- </picture>
        </a> 
	</div>-->
	<?php endif; ?>
	<div class="posts__excerpt">
	<?php if( $post->post_content != "") : ?>
		<a href="<?php echo the_permalink(); ?>" class="posts__excerpt-title"><?php the_title(); if( $bene_is_case_study ) { echo ' <span class="is-case-study">Case Study</span>'; } ?></a>
	<?php else : ?>
		<span class="posts__excerpt-title"><?php the_title(); if( $bene_is_case_study ) { echo ' <span class="is-case-study">Case Study</span>'; } ?></span><br />
	<?php endif; ?>
		<span class="the_excerpt">&nbsp;<?php the_excerpt(); ?></span>
		
		<span class="cat__posts__meta">Categorized: <?php the_category(', '); ?></span>
	</div>
</div>
