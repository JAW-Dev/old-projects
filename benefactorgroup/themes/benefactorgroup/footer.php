<?php
$bene_address = ( get_field( 'bene_address', 'option' ) ? get_field( 'bene_address', 'option' ) : '' );
$bene_phone_1 = ( get_field( 'bene_phone_1', 'option' ) ? get_field( 'bene_phone_1', 'option' ) : '' );
$bene_phone_2 = ( get_field( 'bene_phone_2', 'option' ) ? get_field( 'bene_phone_2', 'option' ) : '' );
$bene_email = ( get_field( 'bene_email', 'option' ) ? get_field( 'bene_email', 'option' ) : '' );
$ben_footer_logo = ( get_field( 'ben_footer_logo', 'option' ) ? get_field( 'ben_footer_logo', 'option' ) : '' );
$footer_alt = $ben_footer_logo['alt'];
$footer_logo_base = $ben_footer_logo['sizes']['logo'];
$footer_logo_retina = $ben_footer_logo['sizes']['logo@2'];
$bene_giving_inst_logo = ( get_field( 'bene_giving_inst_logo', 'option' ) ? get_field( 'bene_giving_inst_logo', 'option' ) : '' );
$ginst_alt = $bene_giving_inst_logo['alt'];
$ginst_logo_base = $bene_giving_inst_logo['sizes']['logo'];
$ginst_logo_retina = $bene_giving_inst_logo['sizes']['logo@2'];
$bene_giving_inst_url = ( get_field( 'bene_giving_inst_url', 'option' ) ? get_field( 'bene_giving_inst_url', 'option' ) : '' );
$bene_privacy_page_link = ( get_field( 'bene_privacy_page_link', 'option' ) ? get_field( 'bene_privacy_page_link', 'option' ) : '' );
$bene_terms_page_link = ( get_field( 'bene_terms_page_link', 'option' ) ? get_field( 'bene_terms_page_link', 'option' ) : '' );
$bene_privacy_label = ( get_field( 'bene_privacy_label', 'option' ) ? get_field( 'bene_privacy_label', 'option' ) : '' );
$bene_terms_label = ( get_field( 'bene_terms_label', 'option' ) ? get_field( 'bene_terms_label', 'option' ) : '' );
$bene_facebook_link = ( get_field( 'bene_facebook_link', 'option' ) ? get_field( 'bene_facebook_link', 'option' ) : '' );
$bene_linkedin_link = ( get_field( 'bene_linkedin_link', 'option' ) ? get_field( 'bene_linkedin_link', 'option' ) : '' );
$bene_twitter_link = ( get_field( 'bene_twitter_link', 'option' ) ? get_field( 'bene_twitter_link', 'option' ) : '' );
?>
<footer class="body__footer" role="contentinfo">
<div class="body__content">
	<div class="content__row">
		
		<div class="footer__logo">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo $footer_logo_base ?>" alt="<?php echo $footer_alt ?>" /></picture>
			</a>
		</div>
		<div class="footer__copy">
			<div class="copy__top">
				<div itemprop="copyrightHolder">&copy; <span itemprop="copyrightYear"><?php echo date('Y'); ?></span> <?php bloginfo( 'name' ); ?></div>
				<div class="footer__links">
					<a href="<?php echo $bene_privacy_page_link; ?>">
						<?php echo $bene_privacy_label; ?>
					</a> |
					<a href="<?php echo $bene_terms_page_link; ?>">
						<?php echo $bene_terms_label; ?>
					</a>
				</div>
			</div>
			<div class="copy__bottom">
				<ul>
					<li class="address">
						<?php echo $bene_address; ?>
					</li>
					<li class="phone">
						<div class="phone1">
							<a href="tel:<?php echo $bene_phone_1; ?>"><?php echo $bene_phone_1; ?></a>
						</div>
						<div class="phone2">
							<a href="tel:<?php echo $bene_phone_2; ?>"><?php echo $bene_phone_2; ?></a>
						</div>
					</li>
					<li class="email">
						<a href="mailto:<?php echo $bene_email; ?>">
							<?php echo $bene_email; ?>
						</a>
					</li>
				</ul>
			</div>
			<div class="social-links social-links__full">
				<div class="facebook">
					<a href="<?php echo $bene_facebook_link; ?>"></a>
				</div>
				<div class="twitter">
					<a href="<?php echo $bene_twitter_link; ?>"></a>
				</div>
				<div class="linkedin">
					<a href="<?php echo $bene_linkedin_link; ?>"></a>
				</div>
			</div>
			
		</div>
		<div class="ginst">
			<a href="<?php echo $bene_giving_inst_url; ?>">
				<img src="<?php echo $ginst_logo_base ?>" alt="<?php echo $ginst_alt ?>" /></picture>
			</a>
		</div>
		<div class="social-links social-links__mobile">
			<div class="facebook">
				<a href="<?php echo $bene_facebook_link; ?>"></a>
			</div>
			<div class="twitter">
				<a href="<?php echo $bene_twitter_link; ?>"></a>
			</div>
			<div class="linkedin">
				<a href="<?php echo $bene_linkedin_link; ?>"></a>
			</div>
		</div>
	</div>
	
   </div>
</footer>
<?php wp_footer(); ?>
<script>
var ut_params = ut_params || [];ut_params.push("UT-736573600");//version:0.4
(function() {
var ut = document.createElement('script');
ut.type = 'text/javascript'; ut.async = true;
ut.src = (("https:" == document.location.protocol) ? "https://" : "http://") + 'pixel.claritytag.com/javascripts/clarity.js';
var script = document.getElementsByTagName('script')[0]; script.parentNode.insertBefore(ut, script);}
)();
var _ss = _ss || [];
_ss.push(['_setDomain', 'https://koi-3Q7IOW6C2Q.marketingautomation.services/net']);
_ss.push(['_setAccount', 'KOI-1NUZQCBDU']);
_ss.push(['_trackPageView']);
(function() {
var ss = document.createElement('script');
ss.type = 'text/javascript'; ss.async = true;

ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3Q7IOW6C2Q.marketingautomation.services/client/ss.js?ver=1.1.1';
var scr = document.getElementsByTagName('script')[0];
scr.parentNode.insertBefore(ss, scr);
})();
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '207772239583979');
fbq('track', "PageView");
fbq('track', 'Lead');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=207772239583979&ev=PageView&noscript=1"
/></noscript>
</div>
</body>
</html>
