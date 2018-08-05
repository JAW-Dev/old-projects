<?php
$kl_twitter_url = ( get_field( 'kl_twitter_url', 'option' ) ? get_field( 'kl_twitter_url', 'option' ) : '#' );
$kl_facebook_url = ( get_field( 'kl_facebook_url', 'option' ) ? get_field( 'kl_facebook_url', 'option' ) : '#' );
$kl_linkedin_url = ( get_field( 'kl_linkedin_url', 'option' ) ? get_field( 'kl_linkedin_url', 'option' ) : '#' );
$kl_pinterest_url = ( get_field( 'kl_pinterest_url', 'option' ) ? get_field( 'kl_pinterest_url', 'option' ) : '#' );
?>
<ul class="footer_social">
	<li class="icon-twitter"><a href="<?php echo $kl_twitter_url; ?>" target="_blank"></a></li>
	<li class="icon-facebook"><a href="<?php echo $kl_facebook_url; ?>" target="_blank"></a></li>
	<li class="icon-pinterest"><a href="<?php echo $kl_pinterest_url; ?>" target="_blank"></a></li>
	
<li class="icon-linkedin"><a href="<?php echo $kl_linkedin_url; ?>" target="_blank"></a></li>
</ul>