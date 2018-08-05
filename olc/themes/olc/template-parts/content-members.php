<?php
$olc_members_type = fcwp_get_field( 'olc_members_type' );
$olc_members_email = fcwp_get_field( 'olc_members_email' );
?>
<div class="masonry__entry">
  <h4 class="members__name">
    <?php the_title(); ?>
  </h4>
  <?php 
  the_content();
  if( $olc_members_email != '' ) :
  ?>
    <a href="mailto:<?php echo $olc_members_email; ?>" class="members__email">
    <?php
      $btn_my_olc_paths = array(
        'image'  => FCWP_URI . '/images/icon-email.png',
        'retina' => FCWP_URI . '/images/icon-email@2.png',
        'svg'    => FCWP_URI . '/images/icon-email.svg',
      ); 
      fcwp_svg( $btn_my_olc_paths, 'Back to Top', 'icon-email', 'svg icon-email__svg' );
    ?>
    </a>
  <?php endif; ?>
</div>