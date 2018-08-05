<nav id="header__nav--main" class="header__nav--main avernir">
    <?php 
    wp_nav_menu( array( 
            'theme_location'    => 'primary',
            'menu'				=> 'Main Menu',
            'container'         => '', 
            'menu_class'        => 'main-nav-list', 
            'menu_id'           => 'main-nav-list', 
            'link_before'       => '<span itemprop="name">', 
            'link_after'        => '</span>'
        ) );
    ?>
</nav>