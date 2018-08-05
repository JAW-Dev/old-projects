<?php get_template_part( 'template-parts/head' ); ?>
<header id="top" class="header" role="banner">
	<div class="content__wrapper">
    <div class="header__logo--full">
      <?php get_template_part( 'template-parts/logo', 'full' ); ?>
    </div>
    <div class="header__logo--mobile">
      <?php get_template_part( 'template-parts/logo', 'mobile' ); ?>
    </div>
      <div class="menu">
    <?php get_template_part( 'template-parts/menu/menu', 'primary' ); ?>
  </div>
	</div>

</header>