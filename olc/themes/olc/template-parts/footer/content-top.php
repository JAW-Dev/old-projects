<a href="#top" id="backtotop" class="top">
  <?php
    $chevron_paths = array(
      'image'  => FCWP_URI . '/images/chevron.png',
      'retina' => FCWP_URI . '/images/chevron@2.png',
      'svg'    => FCWP_URI . '/images/chevron.svg',
    ); 
    fcwp_svg( $chevron_paths, 'Back to Top', 'chevron', 'svg top__svg' );
  ?>
</a> 