<?php 
$bene_frontpage_slider = ( get_field( 'bene_frontpage_slider', 'option' ) ? get_field( 'bene_frontpage_slider', 'option' ) : '' );
if( !empty( $bene_frontpage_slider ) ) :
?>
<div class="pages-slider owl-carousel">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
        if( have_rows('bene_case_images') ): while( have_rows('bene_case_images') ): the_row(); 
            $slider_img = ( get_sub_field( 'bene_case_image' ) ? get_sub_field( 'bene_case_image' ) : '' );
            if( $slider_img ) :
            $url = $slider_img['url'];
            $alt = $slider_img['alt'];
            $slider_large = $slider_img['sizes']['page-large'];
            $slider_large_retina = $slider_img['sizes']['page-large@2'];
            $slider_med = $slider_img['sizes']['page-med'];
            $slider_med_retina = $slider_img['sizes']['page-med@2'];
            $slider_small = $slider_img['sizes']['page-small'];
            $slider_small_retina = $slider_img['sizes']['page-small@2'];
    ?>
        <div class="pages-slider__container">
            <div class="slider__inner">
                <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" />
            </div>
        </div>
    <?php endif; endwhile; endif; endwhile; endif; wp_reset_postdata(); ?>
</div>
<?php endif; ?>