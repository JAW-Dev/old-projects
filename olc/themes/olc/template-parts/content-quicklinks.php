<div class="quick-links row">
	<div class="col__1-2 quick-links__news">
		<a href="<?php echo home_url(); ?>/resources/news/">
			<?php _e('News', 'fcwp'); ?>
		</a>
	</div>
	<div class="col__1-2 quick-links__my-olc">
		<a href="http://myolc.olc.org/QCommerceNet/Index.aspx">
			<?php
			$btn_my_olc_paths = array(
				'image'  => FCWP_URI . '/images/btn-my-olc.png',
				'retina' => FCWP_URI . '/images/btn-my-olc@2.png',
				'svg'    => FCWP_URI . '/images/btn-my-olc.svg',
			);
			fcwp_svg($btn_my_olc_paths, 'Back to Top', 'btn-my-olc', 'svg btn-my-olc__svg');
			?>
		</a>
	</div>
	<div class="quick-links__contact">
		<a href="#contact-from" class="fancybox">
			<?php _e('Contact', 'fcwp'); ?>
		</a>
	</div>
</div>