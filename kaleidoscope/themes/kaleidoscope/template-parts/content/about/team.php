<?php
$kl_team_section_title = ( get_field( 'kl_team_section_title' ) ? get_field( 'kl_team_section_title' ) : '' );
$kl_team_section = ( get_field( 'kl_team_section' ) ? get_field( 'kl_team_section' ) : '' );
$kl_team_section_url = ( get_field( 'kl_team_section_link' ) ? get_field( 'kl_team_section_link' ) : '' );
?>
<div class="team">

	<h2 class="section__heading">
		<a href="<?php echo $kl_team_section_url; ?>"> <?php echo $kl_team_section_title; ?></a>
	</h2>
	<div class="section__text">
		<?php echo $kl_team_section; ?> 
		<a href="<?php echo $kl_team_section_url; ?>">+ View Our Team +</a>
		

	</div>
</a>
</div>