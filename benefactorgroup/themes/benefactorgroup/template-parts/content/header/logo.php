<div class="header__logo">
    <a href="<?php echo home_url(); ?>">
        <h1 class="ir"><?php echo bloginfo('name'); ?></h1>
        <?php 
            if( function_exists('get_field')) : 
                $ben_header_logo = ( get_field( 'ben_header_logo', 'option' ) ? get_field( 'ben_header_logo', 'option' ) : '' );
                $url = $ben_header_logo['url'];
                $alt = $ben_header_logo['alt'];
                $logo_base = $ben_header_logo['sizes']['logo'];
                $logo_retina = $ben_header_logo['sizes']['logo@2'];
        ?>
        <img src="<?php echo $logo_base ?>" alt="<?php echo $alt ?>" />
        <?php endif; ?>
    </a>
</div>