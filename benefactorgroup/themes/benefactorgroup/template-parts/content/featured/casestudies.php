<?php global $cs_query, $do_not_duplicate; ?>
<div class="case-studies">
	<div class="content__row">
		<?php 
		if (have_posts()) : while ($cs_query->have_posts()) : $cs_query->the_post();
		$ft_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'case_study' );
		$do_not_duplicate[] = get_the_ID();
		$ft_image_url = $ft_image[0];
		$ft_image_retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'case_study@2' );
		$ft_image_retina_url = $ft_image_retina[0];
		$ft_image_data = get_post( get_post_thumbnail_id() );
		$ft_image_alt = get_post_meta( $ft_image_data->ID, '_wp_attachment_image_alt', true );
		$bene_post_subtitle = ( get_field( 'bene_post_subtitle' ) ? get_field( 'bene_post_subtitle' ) : '' );
		$bene_fcs_label = ( get_field( 'bene_fcs_label', 'option' ) ? get_field( 'bene_fcs_label', 'option' ) : '' );
		$get_terms = get_the_terms( get_the_ID(), 'tasks' );
		$bene_is_case_study = ( get_field( 'bene_is_case_study' ) ? get_field( 'bene_is_case_study' ) : '' );
		$case_study = ( $bene_is_case_study ? ': Case Study' : '' );
		$terms = ( is_array( $get_terms ) ) ? array_pop( $get_terms ) : '';
		$term = ( $terms != '' ) ? $terms->name : '';
		$terms = ( is_array( $get_terms ) ) ? array_pop( $get_terms ) : '';
		$term = ( $terms != '' ) ? $terms->name : '';
		?>
		<div class="col col__one-third featured__wrapper">
			<div class="featured__sm-image">
				<a href="<?php echo the_permalink(); ?>">
					<div class="image-overlay"></div>
					<img src="<?php echo $ft_image_url ?>" alt="<?php echo $ft_image_alt ?>" />
		        </a>
			</div>
			<div class="featured__title">
				<h3 class="ft-title">
					<a href="<?php echo the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<h4 class="ft-subtitle">
					<a href="<?php echo the_permalink(); ?>">
						<span class="label"><?php echo $term; ?></span><?php echo ' ' . $bene_post_subtitle; ?><?php echo $case_study; ?>
					</a>
				</h4>
			</div>
		</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>