<?php
$olc_header_logo        = fcwp_get_field( 'olc_header_logo', true );
$olc_header_logo_retina = fcwp_get_field( 'olc_header_logo_retina', true );
$olc_header_logo_svg    = fcwp_get_field( 'olc_header_logo_svg', true );
?>
<h1>
  <a href="<?php echo home_url(); ?>">
    <?php
      $logo_paths = array(
        'image'  => $olc_header_logo['url'],
        'retina' => $olc_header_logo_retina['url'],
        'svg'    => $olc_header_logo_svg['url']
      ); 
      fcwp_svg( $logo_paths, $olc_header_logo['alt'], 'logo', 'svg logo__svg' );
    ?>
  </a>
  <span class="ir">
    <?php echo bloginfo('name'); ?>
  </span>
</h1>