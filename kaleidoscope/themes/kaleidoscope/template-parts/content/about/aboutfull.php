<?php
$kl_about_page_title = ( get_field( 'kl_about_page_title' ) ? get_field( 'kl_about_page_title' ) : '' );
$kl_values_section_title = ( get_field( 'kl_values_section_title' ) ? get_field( 'kl_values_section_title' ) : '' );
$kl_vision_section_title = ( get_field( 'kl_vision_section_title' ) ? get_field( 'kl_vision_section_title' ) : '' );
$kl_vision_section = ( get_field( 'kl_vision_section' ) ? get_field( 'kl_vision_section' ) : '' );
?>
<div class="body__content full-about pages">
	<h1 class="page__title"><?php echo $kl_about_page_title; ?></h1>
	<div class="content__row top">
		<div class="col col__two-third">
			<?php get_template_part( 'template-parts/content/about/main' ); ?>
			<div class="values-title-full">
				<h2 class="section__heading">
					<?php echo $kl_values_section_title; ?>
				</h2>
			</div>
		</div>
		<div class="col col__one-third">
			<?php get_template_part( 'template-parts/content/about/team' ); ?>
			<?php get_template_part( 'template-parts/content/about/mission' ); ?>
			<div class="vision">
				<div class="section__text">
					<h2 class="section__heading">
						<?php echo $kl_vision_section_title; ?>
					</h2>
					<?php echo $kl_vision_section; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="content__row values">
		<?php get_template_part( 'template-parts/content/about/values' ); ?>
	</div>
</div>