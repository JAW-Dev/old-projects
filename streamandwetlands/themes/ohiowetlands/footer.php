<?php
$swf_phone_number = ( get_field( 'swf_phone_number', 'option' ) ? get_field( 'swf_phone_number', 'option' ) : '' );
$swf_email_address = ( get_field( 'swf_email_address', 'option' ) ? get_field( 'swf_email_address', 'option' ) : '' );
$swf_address = ( get_field( 'swf_address', 'option' ) ? get_field( 'swf_address', 'option' ) : '' );
$swf_po_box = ( get_field( 'swf_po_box', 'option' ) ? get_field( 'swf_po_box', 'option' ) : '' );
$swf_city = ( get_field( 'swf_city', 'option' ) ? get_field( 'swf_city', 'option' ) : '' );
$swf_state = ( get_field( 'swf_state', 'option' ) ? get_field( 'swf_state', 'option' ) : '' );
$swf_zip_code = ( get_field( 'swf_zip_code', 'option' ) ? get_field( 'swf_zip_code', 'option' ) : '' );
$swf_facebook = ( get_field( 'swf_facebook', 'option' ) ? get_field( 'swf_facebook', 'option' ) : '' );
$swf_linkedin = ( get_field( 'swf_linkedin', 'option' ) ? get_field( 'swf_linkedin', 'option' ) : '' );
$swf_twitter = ( get_field( 'swf_twitter', 'option' ) ? get_field( 'swf_twitter', 'option' ) : '' );

$swf_phone_number = ( get_field( 'swf_phone_number', 'option' ) ? get_field( 'swf_phone_number', 'option' ) : '' );
$swf_fax_number = ( get_field( 'swf_fax_number', 'option' ) ? get_field( 'swf_fax_number', 'option' ) : '' );

$dots = '<span class="info__dots">.</span>';
?>
<footer itemscope itemtype="http://schema.org/WPFooter" class="body__footer" role="contentinfo">
	<div class="footer__top">
		<ul>
			<li class="footer__col">
				<ul>
					<li class="connect-heading"><?php _e( 'Connect', DOMAIN ); ?></li>
					<ul class="social-links">
						<li><a href="<?php echo $swf_facebook; ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo $swf_twitter; ?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo $swf_linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</ul>
			</li>
			<li class="footer__col">
				<ul class="footer__contact">
					<li class="connect-heading"><?php _e( 'Contact', DOMAIN ); ?></li>
					<?php if( $swf_phone_number != '' ) : ?>
					<li class="connect-phone">
						<a href="tel:+<?php echo $swf_phone_number; ?>"><?php echo $swf_phone_number; ?></a>
					</li>
					<?php 
				    endif; 
				    if( $swf_email_address !== '' ) : 
				    ?>
					<li class="button yellow absolute">
						<?php _e( 'Email Us', DOMAIN ); ?>
						<a href="mailto:<?php echo $swf_email_address; ?>"></a>
					</li>
					<?php endif; ?>
				</ul>
			</li>
			<li class="footer__col">
				<ul class="footer__signup">
					<li class="connect-heading"><?php _e( 'Join our mailing list', DOMAIN ); ?></li>
					<li><?php echo do_shortcode('[gravityform id=2 name=ContactUs title=false description=false]'); ?>
</li>
				</ul>
			</li>
		</ul>
	</div>
	<footer class="footer__bottom">
		<nav class="footer__nav">
			<?php 
	        wp_nav_menu( array( 
	                'theme_location'    => 'primary', 
	                'container'         => '', 
	                'menu_class'        => 'footer-nav-list', 
	                'menu_id'           => 'footer-nav-list', 
	                'link_before'       => '<span itemprop="name">', 
	                'link_after'        => '</span>'
	            ) );
	        ?>
		</nav>
		<div class="footer__info">
		<span class="footer__copyright" itemprop="copyrightHolder">
	        &copy; <?php bloginfo( 'name' ); ?> <span itemprop="copyrightYear"><?php echo date('Y'); ?></span>
	    </span>
	    <?php if( $swf_address != '' ) : ?>
	    <address class="footer__address">
	    	<?php echo $dots . ' ' . $swf_address . '  ' . $dots . ' ' . $swf_po_box . ' ' . $dots . ' ' . $swf_city . ', ' . $swf_state . ' ' . $swf_zip_code; ?> | Office: <?php echo $swf_phone_number ?> | Fax: <?php echo $swf_fax_number ?>
	    </address>
	    <?php endif; ?>
	    </div>
	</footer>
</footer>
<?php wp_footer(); ?>
</body>
</html>