<?php
$kl_main_section_title = ( get_field( 'kl_main_section_title' ) ? get_field( 'kl_main_section_title' ) : '' );
$kl_main_section = ( get_field( 'kl_main_section' ) ? get_field( 'kl_main_section' ) : '' );
?>
<div class="about-us">
	<h2 class="section__heading">
		<?php echo $kl_main_section_title; ?>
	</h2>
	<div class="section__text">
		<?php echo $kl_main_section; ?>
	</div>
</div>