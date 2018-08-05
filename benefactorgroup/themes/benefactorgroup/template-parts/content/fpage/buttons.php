<?php
$bene_button_1_title = ( get_field( 'bene_button_1_title', 'option' ) ? get_field( 'bene_button_1_title', 'option' ) : '' );
$bene_button_1_link = ( get_field( 'bene_button_1_link', 'option' ) ? get_field( 'bene_button_1_link', 'option' ) : '' );
$bene_button_2_title = ( get_field( 'bene_button_2_title', 'option' ) ? get_field( 'bene_button_2_title', 'option' ) : '' );
$bene_button_2_link = ( get_field( 'bene_button_2_link', 'option' ) ? get_field( 'bene_button_2_link', 'option' ) : '' );
$bene_button_3_title = ( get_field( 'bene_button_3_title', 'option' ) ? get_field( 'bene_button_3_title', 'option' ) : '' );
$bene_button_3_link = ( get_field( 'bene_button_3_link', 'option' ) ? get_field( 'bene_button_3_link', 'option' ) : '' );
$bene_button_4_title = ( get_field( 'bene_button_4_title', 'option' ) ? get_field( 'bene_button_4_title', 'option' ) : '' );
$bene_button_4_link = ( get_field( 'bene_button_4_link', 'option' ) ? get_field( 'bene_button_4_link', 'option' ) : '' );
$bene_button_5_title = ( get_field( 'bene_button_5_title', 'option' ) ? get_field( 'bene_button_5_title', 'option' ) : '' );
$bene_button_5_link = ( get_field( 'bene_button_5_link', 'option' ) ? get_field( 'bene_button_5_link', 'option' ) : '' );
$bene_button_6_title = ( get_field( 'bene_button_6_title', 'option' ) ? get_field( 'bene_button_6_title', 'option' ) : '' );
$bene_button_6_link = ( get_field( 'bene_button_6_link', 'option' ) ? get_field( 'bene_button_6_link', 'option' ) : '' );
?>
<div class="featured-buttons avernir">
	<div class="featured-buttons__links">
		<a href="<?php echo $bene_button_1_link; ?>">
			<?php echo $bene_button_1_title; ?>
		</a>
	</div>
	<div class="featured-buttons__links">
		<a href="<?php echo $bene_button_2_link; ?>">
			<?php echo $bene_button_2_title; ?>
		</a>
	</div>
	<div class="featured-buttons__links">
		<a href="<?php echo $bene_button_3_link; ?>">
			<?php echo $bene_button_3_title; ?>
		</a>
	</div>
	<div class="featured-buttons__links">
		<a href="<?php echo $bene_button_4_link; ?>">
			<?php echo $bene_button_4_title; ?>
		</a>
	</div>
	<div class="featured-buttons__links">
		<a href="<?php echo $bene_button_5_link; ?>">
			<?php echo $bene_button_5_title; ?>
		</a>
	</div>
	<div class="featured-buttons__links">
		<a href="<?php echo $bene_button_6_link; ?>">
			<?php echo $bene_button_6_title; ?>
		</a>
	</div>
</div>