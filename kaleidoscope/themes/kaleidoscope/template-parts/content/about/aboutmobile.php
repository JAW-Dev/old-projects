<?php
$kl_about_page_title = ( get_field( 'kl_about_page_title' ) ? get_field( 'kl_about_page_title' ) : '' );
$kl_vision_section_title = ( get_field( 'kl_vision_section_title' ) ? get_field( 'kl_vision_section_title' ) : '' );
$kl_vision_section = ( get_field( 'kl_vision_section' ) ? get_field( 'kl_vision_section' ) : '' );
?>
<div class="body__content mobile-about">
	<h1 class="section__heading values-title-mobile"><?php echo $kl_about_page_title; ?></h1>
	<?php get_template_part( 'template-parts/content/about/main' ); ?>
	<?php get_template_part( 'template-parts/content/about/mission' ); ?>
	<div class="vision">
		<h2 class="section__heading">
			<?php echo $kl_vision_section_title; ?>
		</h2>
		<div class="section__text">
			<?php echo $kl_vision_section; ?>
		</div>
	</div>
	<?php get_template_part( 'template-parts/content/about/values' ); ?>
</div>