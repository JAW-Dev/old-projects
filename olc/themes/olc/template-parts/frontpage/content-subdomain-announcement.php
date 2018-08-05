<?php
$olc_special_announcement = fcwp_get_field( 'olc_special_announcement' );
if( $olc_special_announcement != '' ) :
?>
<section class="content__wrapper subdomain-announcement">
  <?php echo $olc_special_announcement; ?>
</section>
<?php endif; ?>