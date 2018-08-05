<?php
$olc_company_name = fcwp_get_field( 'olc_company_name', true );
$olc_address      = fcwp_get_field( 'olc_address', true );
$olc_apt_suite    = fcwp_get_field( 'olc_apt_suite', true );
$olc_city         = fcwp_get_field( 'olc_city', true );
$olc_state        = fcwp_get_field( 'olc_state', true );
$olc_zip_code     = fcwp_get_field( 'olc_zip_code', true );
$olc_phone_number = fcwp_get_field( 'olc_phone_number', true );
$olc_facebook     = fcwp_get_field( 'olc_facebook', true );
$olc_linkedin     = fcwp_get_field( 'olc_linkedin', true );
$olc_twitter      = fcwp_get_field( 'olc_twitter', true );
$olc_vimeo        = fcwp_get_field( 'olc_vimeo', true );
?>
<div class="company">
  <div itemprop="name" class="company__name">
    <?php echo $olc_company_name; ?>
  </div>
  <div class="social-Links">
    <?php if( $olc_facebook ) : ?>
      <div class="social-links__icon facebook">
        <a href="<?php echo $olc_facebook; ?>">
          <i class="fa fa-facebook-square"></i>
        </a>
      </div>
    <?php
    endif;
    if( $olc_twitter ) :
    ?>
    <div class="social-links__icon twitter">
      <a href="<?php echo $olc_twitter; ?>">
        <i class="fa fa-twitter"></i>
      </a>
    </div>
    <?php endif;
    if( $olc_linkedin ) :
    ?>
    <div class="social-links__icon linkedin">
      <a href="<?php echo $olc_linkedin; ?>">
        <i class="fa fa-linkedin-square"></i>
      </a>
    </div>
    <?php
    endif;
    if( $olc_vimeo ) :
    ?>
    <div class="social-links__icon video">
      <a href="<?php echo $olc_vimeo; ?>">
        <i class="fa fa-vimeo"></i>
      </a>
    </div>
    <?php endif; ?>
  </div>
</div>
<address class="company__address" itemscope itemtype="http://schema.org/PostalAddress">
  <span itemprop="streetAddress">
    <?php echo $olc_address; ?><br />
    <?php echo $olc_apt_suite; ?>
  </span>
  <span itemprop="addressLocality" class="inline"><?php echo $olc_city; ?></span>
  <span itemprop="addressRegion" class="inline"><?php echo $olc_state; ?></span>
  <span itemprop="postalCode" class="inline"><?php echo $olc_zip_code; ?></span><br />
  <a href="tel:<?php echo $olc_phone_number; ?>" aria-lable="Phone Number" itemprop="telephone">
    <?php echo $olc_phone_number; ?>
  </a>
</address>