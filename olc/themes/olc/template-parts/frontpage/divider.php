<?php
$olc_fp_divider_text = fcwp_get_field( 'olc_fp_divider_text' );
$olc_fp_divider_url  = fcwp_get_field( 'olc_fp_divider_url' );
?>
<div class="content__wrapper section-divider" role="divider">
  <a href="<?php echo $olc_fp_divider_url; ?>">
    <p class="section-divider__text">
      <?php echo $olc_fp_divider_text; ?>
    </p>
  </a>
</div>