<?php
$kl_address = ( get_field( 'kl_address', 'option' ) ? get_field( 'kl_address', 'option' ) : '' );
$kl_apt_num = ( get_field( 'kl_apt_num', 'option' ) ? get_field( 'kl_apt_num', 'option' ) : '' );
$kl_city = ( get_field( 'kl_city', 'option' ) ? get_field( 'kl_city', 'option' ) : '' );
$kl_state = ( get_field( 'kl_state', 'option' ) ? get_field( 'kl_state', 'option' ) : '' );
$kl_zip_code = ( get_field( 'kl_zip_code', 'option' ) ? get_field( 'kl_zip_code', 'option' ) : '' );

if( function_exists( 'get_field' ) && !empty( $kl_address ) ) : 
?>
<div class="footer__address">
		<p>
			<?php echo $kl_address; ?>
			<span class="add_spacer">|</span>
			<?php echo $kl_apt_num; ?>
			<span class="add_spacer no_spacer">|</span>
			<?php echo $kl_city; ?>,
			<?php echo $kl_state; ?></li>
			<?php echo $kl_zip_code; ?>
		</p>
</div>
<?php endif; ?>