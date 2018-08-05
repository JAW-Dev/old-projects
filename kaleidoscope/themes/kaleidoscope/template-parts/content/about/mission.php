<?php
$kl_mission_section_title = ( get_field( 'kl_mission_section_title' ) ? get_field( 'kl_mission_section_title' ) : '' );
$kl_mission_section = ( get_field( 'kl_mission_section' ) ? get_field( 'kl_mission_section' ) : '' );
?>
<div class="mission">
	<h2 class="section__heading">
		<?php echo $kl_mission_section_title; ?>
	</h2>
	<div class="section__text">
		<?php echo $kl_mission_section; ?>
	</div>
</div>