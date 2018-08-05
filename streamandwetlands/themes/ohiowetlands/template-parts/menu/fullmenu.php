<div class="nav__full">
	<!-- <ul class="nav__menu">
		<?php 
        /*wp_nav_menu( array( 
                'theme_location'    => 'primary', 
                'container'         => '', 
                'menu_class'        => 'primary-nav-list', 
                'menu_id'           => 'primary-nav-list', 
                'link_before'       => '<span itemprop="name">', 
                'link_after'        => '</span>'
            ) );*/
        ?>
	</ul> -->
    <div class="mobile__button menu__full">Menu</div>
	<div style="clear:both"></div>
	<div class="nav__dropdown">
		<?php get_template_part( 'template-parts/menu/dropdown' ); ?>
	</div>
</div>