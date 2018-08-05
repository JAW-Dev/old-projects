<div id="nav-mobile" class="nav-mobile">
    <?php 
    wp_nav_menu( array( 
            'theme_location'    => 'mobile', 
            'menu'				=> 'Mobile Menu',
            'container'         => '', 
            'menu_class'        => 'main-nav-list', 
            'menu_id'           => 'main-nav-list-mobile', 
            'link_before'       => '<span itemprop="name">', 
            'link_after'        => '</span>'
        ) );
    ?>
</div>