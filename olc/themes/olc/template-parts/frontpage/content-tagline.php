<?php
$olc_tagline_heading = fcwp_get_field( 'olc_tagline_heading' );
$olc_tagline         = fcwp_get_field( 'olc_tagline' );
?>
<section class="content__wrapper tagline">
  <h2 class="tagline__heading">
    <?php echo $olc_tagline_heading; ?>
  </h2>
  <p class="taline__text">
    <?php echo $olc_tagline; ?>
  </p>
</section>