<?php
    if( function_exists('get_field')) : 
        $fp_img = ( get_field( 'kl_frontpage_image' ) ? get_field( 'kl_frontpage_image' ) : '' );
        $fp_img_caption = ( get_field( 'kl_frontpage_caption' ) ? get_field( 'kl_frontpage_caption' ) : '' );
        $fp_img_sub_caption = ( get_field( 'kl_frontpage_sub_caption' ) ? get_field( 'kl_frontpage_sub_caption' ) : '' );
        $fp_text_1 = ( get_field( 'kl_frontpage_text_line_1' ) ? get_field( 'kl_frontpage_text_line_1' ) : '' );
        $fp_text_2 = ( get_field( 'kl_frontpage_text_line_2' ) ? get_field( 'kl_frontpage_text_line_2' ) : '' );
        $url = $fp_img['url'];
        $alt = $fp_img['alt'];
        $fp_base = $fp_img['sizes']['hero-image'];
        $fp_retina = $fp_img['sizes']['hero-image@2'];
?>
	<div class="fp_image image">
        <picture>
            <source srcset="<?php echo $fp_retina ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)">
            <img src="<?php echo $fp_base ?>" alt="<?php echo $alt ?>" />
        </picture>
        <div class="fp_image__text">
        	<p class="text-1"><?php echo $fp_text_1; ?></p>
        	<p class="text-2"><?php echo $fp_text_2; ?></p>
        </div>
        <div class="fp_image__caption image__caption">
        	<div class="caption__overlay"></div>
        	<div class="caption__text">
        		<span class="mobile-plus">+&nbsp;</span><?php echo $fp_img_caption; ?><span class="mobile-plus">&nbsp;+</span>
        		<span class="full-cap"> | <em><?php echo $fp_img_sub_caption; ?></em></span>
        	</div>
        </div>
    </div>
<?php endif; ?>