<?php
$kl_contact_label = ( get_field( 'kl_contact_label' ) ? get_field( 'kl_contact_label' ) : '' );
$kl_contact_location_label = ( get_field( 'kl_contact_location_label' ) ? get_field( 'kl_contact_location_label' ) : '' );
$kl_contact_phone_label = ( get_field( 'kl_contact_phone_label' ) ? get_field( 'kl_contact_phone_label' ) : '' );
$kl_contact_email_label = ( get_field( 'kl_contact_email_label' ) ? get_field( 'kl_contact_email_label' ) : '' );
$kl_address = ( get_field( 'kl_address', 'option' ) ? get_field( 'kl_address', 'option' ) : '' );
$kl_apt_num = ( get_field( 'kl_apt_num', 'option' ) ? get_field( 'kl_apt_num', 'option' ) : '' );
$kl_city = ( get_field( 'kl_city', 'option' ) ? get_field( 'kl_city', 'option' ) : '' );
$kl_state = ( get_field( 'kl_state', 'option' ) ? get_field( 'kl_state', 'option' ) : '' );
$kl_zip_code = ( get_field( 'kl_zip_code', 'option' ) ? get_field( 'kl_zip_code', 'option' ) : '' );
$kl_phone_number = ( get_field( 'kl_phone_number', 'option' ) ? get_field( 'kl_phone_number', 'option' ) : '' );
$kl_email_address = ( get_field( 'kl_email_address', 'option' ) ? get_field( 'kl_email_address', 'option' ) : '' );
?>
<div class="body__content pages-full contact">
	<div class="content__row">
		<div id="left-col" class="col col__two-third main-col">
			<div class="section__heading">
				<h2 class="heading"><?php echo $kl_contact_label;?></h2>
			</div>
			<div class="section__text">
			<?php echo do_shortcode( '[gravityform id=1 title=false description=false]' ); ?>
			</div>
		</div>
		<div id="right-col" class="col col__one-third side-col">
			<div>
				<div class="section__heading">
					<h3 class="heading"><?php echo $kl_contact_location_label;?></h3>
				</div>
				<div class="section__text second">
					<p>
						<?php echo $kl_address; ?>
						</br>
						<?php echo $kl_apt_num; ?>
						</br>
						<?php echo $kl_city; ?>,
						<?php echo $kl_state; ?></li>
						<?php echo $kl_zip_code; ?>
					</p>
				</div>
			</div>
			<div>
				<div class="section__heading sub">
					<h3 class="heading"><?php echo $kl_contact_phone_label;?></h3>
				</div>
				<div class="section__text second">
					<p><?php echo $kl_phone_number; ?></p>
				</div>
			</div>
			<div>
				<div class="section__heading sub">
					<h3 class="heading"><?php echo $kl_contact_email_label;?></h3>
				</div>
				<div class="section__text second">
					<p><a href="mailto:<?php echo $kl_email_address; ?>"><?php echo $kl_email_address; ?></a></p>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>