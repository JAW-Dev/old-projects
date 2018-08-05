<div class="header__logo">
    <a href="<?php echo home_url(); ?>">
        <h1 class="ir"><?php echo bloginfo('name'); ?></h1>
        <?php 
        $swf_header_logo = ( get_field( 'swf_header_logo', 'option' ) ? get_field( 'swf_header_logo', 'option' ) : '' );
        if( !empty( $swf_header_logo ) ) :
            $url = $swf_header_logo['url'];
            $alt = $swf_header_logo['alt'];
            $logo_base = $swf_header_logo['sizes']['logo'];
            $logo_retina = $swf_header_logo['sizes']['logo@2'];
        ?>
        <img src="<?php echo $logo_base ?>" alt="<?php echo $alt ?>" />
    	<?php endif; ?>
    </a>
</div>