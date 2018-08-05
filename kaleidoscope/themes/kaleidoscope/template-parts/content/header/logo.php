<div class="header__logo">
    <a href="<?php echo home_url(); ?>">
        <h1 class="ir"><?php echo bloginfo('name'); ?></h1>
        <?php 
            if( function_exists('get_field')) : 
                $kl_logo_image = ( get_field( 'kl_logo_image', 'option' ) ? get_field( 'kl_logo_image', 'option' ) : '' );
                $url = $kl_logo_image['url'];
                $alt = $kl_logo_image['alt'];
                $logo_base = $kl_logo_image['sizes']['logo'];
                $logo_retina = $kl_logo_image['sizes']['logo@2'];
        ?>
        <picture>
            <!--[if IE 9]><video style="display: none;"><![endif]-->
            <source srcset="<?php echo $logo_retina ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)">
            <img src="<?php echo $logo_base ?>" alt="<?php echo $alt ?>" />
            <!--[if IE 9]></video><![endif]-->
        </picture>
        <?php endif; ?>
    </a>
</div>