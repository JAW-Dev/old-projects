<?php
$olc_mobile_logo        = fcwp_get_field( 'olc_mobile_logo', true );
$olc_mobile_logo_retina = fcwp_get_field( 'olc_mobile_logo_retina', true );
$olc_mobile_logo_svg    = fcwp_get_field( 'olc_mobile_logo_svg', true );
?>
<h1>
  <a href="<?php echo home_url(); ?>">
    <?php
      $mobile_logo_paths = array(
        'image'  => $olc_mobile_logo['url'],
        'retina' => $olc_mobile_logo_retina['url'],
        'svg'    => $olc_mobile_logo_svg['url']
      ); 
      fcwp_svg( $mobile_logo_paths, $olc_mobile_logo['alt'], 'logo', 'svg mobile-logo__svg' );
    ?>
    <picture>
    <!--[if IE 9]><video style="display: none;"><![endif]-->
      <img src="<?php echo $olc_mobile_logo_svg['url'];?>" alt="<?php echo $olc_mobile_logo_svg['alt']; ?>" class="svg" type="image/svg"/>
    <!--[if IE 9]></video><![endif]-->
    <img src="<?php echo $olc_mobile_logo['url']; ?>" srcset="<?php echo $olc_mobile_logo['url'] . ' 1x, ' . $olc_mobile_logo_retina['url'] . ' 2x'; ?>" alt="<?php echo $olc_mobile_logo['alt']; ?>" />
    </picture>
  </a>
  <span class="ir">
    <?php echo bloginfo('name'); ?>
  </span>
</h1>