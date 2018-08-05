<?php $kl_footer_text = ( get_field( 'kl_footer_text', 'option' ) ? get_field( 'kl_footer_text', 'option' ) : '' ); ?>
<div class="footer__text">
	<?php 
		if( function_exists( 'get_field' ) && !empty( $kl_footer_text ) ) :
			echo $kl_footer_text;
		endif; 
	?>
</div>