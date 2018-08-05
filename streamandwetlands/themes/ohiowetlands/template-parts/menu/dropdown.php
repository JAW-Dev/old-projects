<div class="nav__col">
	<?php 
    wp_nav_menu( array( 
            'theme_location'    => 'about', 
            'container'         => '', 
            'menu_class'        => 'about-nav-list', 
            'menu_id'           => 'about-nav-list', 
            'link_before'       => '<span itemprop="name">', 
            'link_after'        => '</span>'
        ) );
    ?>
</div>
<div class="nav__col">
	<?php 
    wp_nav_menu( array( 
            'theme_location'    => 'mitigation-banks', 
            'container'         => '', 
            'menu_class'        => 'mit-nav-list', 
            'menu_id'           => 'mit-nav-list', 
            'link_before'       => '<span itemprop="name">', 
            'link_after'        => '</span>'
        ) );
    ?>
</div>
<div class="nav__col">
	<?php 
    wp_nav_menu( array( 
            'theme_location'    => 'in-leiu-mitigation', 
            'container'         => '', 
            'menu_class'        => 'il-mit-nav-list', 
            'menu_id'           => 'il-mit-nav-list', 
            'link_before'       => '<span itemprop="name">', 
            'link_after'        => '</span>'
        ) );
    ?>
</div>
<div class="nav__col">
	<?php 
    wp_nav_menu( array( 
            'theme_location'    => 'resources', 
            'container'         => '', 
            'menu_class'        => 'resources-nav-list', 
            'menu_id'           => 'resources-nav-list', 
            'link_before'       => '<span itemprop="name">', 
            'link_after'        => '</span>'
        ) );
    ?>
</div>
<?php
$swf_address = ( get_field( 'swf_address', 'option' ) ? get_field( 'swf_address', 'option' ) : '' );
$swf_po_box = ( get_field( 'swf_po_box', 'option' ) ? get_field( 'swf_po_box', 'option' ) : '' );
$swf_city = ( get_field( 'swf_city', 'option' ) ? get_field( 'swf_city', 'option' ) : '' );
$swf_state = ( get_field( 'swf_state', 'option' ) ? get_field( 'swf_state', 'option' ) : '' );
$swf_zip_code = ( get_field( 'swf_zip_code', 'option' ) ? get_field( 'swf_zip_code', 'option' ) : '' );
$swf_phone_number = ( get_field( 'swf_phone_number', 'option' ) ? get_field( 'swf_phone_number', 'option' ) : '' );
$swf_email_address = ( get_field( 'swf_email_address', 'option' ) ? get_field( 'swf_email_address', 'option' ) : '' );
$swf_fax_number = ( get_field( 'swf_fax_number', 'option' ) ? get_field( 'swf_fax_number', 'option' ) : '' );
?>
<div class="nav__col contact">
	<ul id="resources-nav-list" class="resources-nav-list">
	<li class="nav-item__heading">
		<a href="<?php echo home_url(); ?>/contact/">
		<?php _e( 'contact', DOMAIN ); ?>
		</a>
	</li>
    <?php if( $swf_address != '' ) : ?>
	<li class="">
		<address>
		<?php echo $swf_address; ?></br>
		<?php echo $swf_po_box; ?></br>
		<?php echo $swf_city . ', ' .$swf_state . ' ' . $swf_zip_code; ?></br>
		</address>
	</li>
    <?php 
    endif; 
    if( $swf_phone_number != '' ) : 
    ?>
	<li>
		<a href="tel:+<?php echo $swf_phone_number; ?>">Office: <?php echo $swf_phone_number; ?></a>
	</li>
    <?php 
    endif; 
    if( $swf_fax_number != '' ) : 
    ?>
	<li>
		<a href="fax:+<?php echo $swf_phone_number; ?>">Fax: <?php echo $swf_fax_number; ?></a>
	</li>
    <?php 
    endif; 
    if( $swf_email_address != '' ) : 
    ?>
	<li class="button yellow">
		<a href="mailto:<?php echo $swf_email_address; ?>">
        <?php _e( 'Email Us', DOMAIN ); ?>
		</a>
	</li>
    <?php endif; ?>
	</ul>
</div>