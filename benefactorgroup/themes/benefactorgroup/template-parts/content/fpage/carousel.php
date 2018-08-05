<?php 
$bene_frontpage_slider = ( get_field( 'bene_frontpage_slider', 'option' ) ? get_field( 'bene_frontpage_slider', 'option' ) : '' );
if( !empty( $bene_frontpage_slider ) ) :
?>
<div class="hero-slider owl-carousel">
	<?php
	$slider_query = new WP_Query(array(
	    'post_type'         => 'slider',
	    'posts_per_page'    => -1,
	    'page_id'			=> $bene_frontpage_slider
	));
	if (have_posts()) : while ($slider_query->have_posts()) : $slider_query->the_post();
		if( have_rows('bene_add_slide') ): while( have_rows('bene_add_slide') ): the_row(); 
			$bene_slide_class = ( get_sub_field( 'bene_slide_class' ) ? get_sub_field( 'bene_slide_class') : '' );
			$bene_slide_text_type = ( get_sub_field( 'bene_slide_text_type' ) ? get_sub_field( 'bene_slide_text_type') : '' );
			$bene_slide_type = ( get_sub_field( 'bene_slide_type' ) ? get_sub_field( 'bene_slide_type') : '' );
			$bene_slide_title = ( get_sub_field( 'bene_slide_title' ) ? get_sub_field( 'bene_slide_title') : '' );
			$bene_slide_subtitle = ( get_sub_field( 'bene_slide_subtitle' ) ? get_sub_field( 'bene_slide_subtitle') : '' );
			$bene_slide_text = ( get_sub_field( 'bene_slide_text' ) ? get_sub_field( 'bene_slide_text') : '' );
			$bene_slide_button_text = ( get_sub_field( 'bene_slide_button_text' ) ? get_sub_field( 'bene_slide_button_text') : '' );
			$bene_slide_bottom_text = ( get_sub_field( 'bene_slide_bottom_text' ) ? get_sub_field( 'bene_slide_bottom_text') : '' );
			$bebe_slide_url_type = ( get_sub_field( 'bebe_slide_url_type' ) ? get_sub_field( 'bebe_slide_url_type') : '' );
			$bene_slide_url = ( get_sub_field( 'bene_slide_url' ) ? get_sub_field( 'bene_slide_url') : '' );
			$bene_slide_page_url = ( get_sub_field( 'bene_slide_page' ) ? get_sub_field( 'bene_slide_page') : '' );
			$slider_img = ( get_sub_field( 'bene_slider_image' ) ? get_sub_field( 'bene_slider_image' ) : '' );
			if( $slider_img ) :
			    $url = $slider_img['url'];
			    $alt = $slider_img['alt'];
			    $slider_large = $slider_img['sizes']['slide-large'];
			    $slider_large_retina = $slider_img['sizes']['slide-large@2'];
			    $slider_med = $slider_img['sizes']['slide-med'];
			    $slider_med_retina = $slider_img['sizes']['slide-med@2'];
			    $slider_small = $slider_img['sizes']['slide-small'];
			    $slider_small_retina = $slider_img['sizes']['slide-small@2'];
			endif;
	?>
		<div class="slider__container<?php echo $bene_slide_class; ?> <?php echo $bene_slide_text_type; ?>">
			<div class="slider__inner">
				<?php 
				if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
				echo '<a href="'. $bene_slide_url . $bene_slide_page_url .'">'; 
				endif; 
				?>
				<img src="<?php echo $slider_large ?>" alt="<?php echo $alt ?>" />
		        <?php 
		        if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
		        	echo '</a>'; 
		        endif;
		        if( $bene_slide_type == 'text' ) : ?>
			        <div class="slider__text-box">
				        <div class="slider__box-overlay"></div>
				        <div class="slider__box-text">
								<?php if( $bene_slide_title ) : ?>
									<h3 class="text-box__title">
										<?php 
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '<a href="'. $bene_slide_url . $bene_slide_page_url .'">'; 
										endif;
										echo $bene_slide_title;
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '</a>'; 
										endif; 
										?>
									</h3>
								<?php endif; ?>
								<?php if( $bene_slide_subtitle ) : ?>
									<h4 class="text-box__subtitle">
										<?php 
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '<a href="'. $bene_slide_url . $bene_slide_page_url .'">'; 
										endif;
										echo $bene_slide_subtitle;
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '</a>'; 
										endif;
										?>
									</h4>
								<?php endif; ?>
								<?php if( $bene_slide_text ) : ?>
									<div class="text-box__text">
										<?php 
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '<a href="'. $bene_slide_url . $bene_slide_page_url .'">'; 
										endif;
										echo $bene_slide_text;
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '</a>'; 
										endif; 
										?>
									</div>
								<?php endif; ?>

								<?php if( $bene_slide_bottom_text ) : ?>
									<h4 class="text-box__bottom-text">
										<?php 
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '<a href="'. $bene_slide_url . $bene_slide_page_url .'">'; 
										endif;
										echo $bene_slide_bottom_text;
										if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
											echo '</a>'; 
										endif; 
										?>
									</h4>
								<?php endif; ?>
								<?php if( $bene_slide_button_text ) : ?>
									<div class="text-box__button button">
										<?php 
										if( $bebe_slide_url_type == 'url' ) : 
											echo '<a href="'. $bene_slide_url .'">'; 
										endif;
										if( $bebe_slide_url_type == 'page' ) : 
											echo '<a href="'. $bene_slide_page_url .'">'; 
										endif; 
										echo $bene_slide_button_text;
										echo '</a>'; 
										?>
									</div>
								<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div style="clear: both"></div>
			<div class="slider__mobile-text">
				<?php 
				if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
					echo '<a href="'. $bene_slide_url . $bene_slide_page_url .'">'; 
				endif;
				if( $bene_slide_title ) : 
					echo '<span class="title">' . $bene_slide_title . '</span>'; 
				endif; 
				if( $bene_slide_subtitle ) : 
					echo '&nbsp;' . $bene_slide_subtitle; 
				endif;
				if( $bebe_slide_url_type == 'url' || $bebe_slide_url_type == 'page' ) : 
					echo '</a>'; 
				endif; 
				?>
			</div>
			<div style="clear: both"></div>
		</div>
	<?php endwhile; endif; endwhile; endif; wp_reset_postdata(); ?>
</div>
<?php endif; ?>