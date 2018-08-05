<?php
$olc_box_one_icon          = fcwp_get_field( 'olc_box_one_icon' );
$olc_box_one_icon_retina   = fcwp_get_field( 'olc_box_one_icon_retina' );
$olc_box_one_icon_svg      = fcwp_get_field( 'olc_box_one_icon_svg' );
$olc_box_one_heading       = fcwp_get_field( 'olc_box_one_heading' );
$olc_box_one_text          = fcwp_get_field( 'olc_box_one_text' );
$olc_box_one_url           = fcwp_get_field( 'olc_box_one_url' );
$olc_box_two_icon          = fcwp_get_field( 'olc_box_two_icon' );
$olc_box_two_icon_retina   = fcwp_get_field( 'olc_box_two_icon_retina' );
$olc_box_two_icon_svg      = fcwp_get_field( 'olc_box_two_icon_svg' );
$olc_box_two_heading       = fcwp_get_field( 'olc_box_two_heading' );
$olc_box_two_text          = fcwp_get_field( 'olc_box_two_text' );
$olc_box_two_url           = fcwp_get_field( 'olc_box_two_url' );
$olc_box_three_icon        = fcwp_get_field( 'olc_box_three_icon' );
$olc_box_three_icon_retina = fcwp_get_field( 'olc_box_three_icon_retina' );
$olc_box_three_icon_svg    = fcwp_get_field( 'olc_box_three_icon_svg' );
$olc_box_three_heading     = fcwp_get_field( 'olc_box_three_heading' );
$olc_box_three_text        = fcwp_get_field( 'olc_box_three_text' );
$olc_box_three_url         = fcwp_get_field( 'olc_box_three_url' );
?>
<section class="content__wrapper row fp-boxes">
  <?php
	fcwp_display_box(
		'advocacy',
		$olc_box_one_url,
		(!empty($olc_box_one_icon['url']) ? $olc_box_one_icon['url'] : NULL),
		(!empty($olc_box_one_icon_retina['url']) ? $olc_box_one_icon_retina['url'] : NULL),
		(!empty($olc_box_one_icon_svg['url']) ? $olc_box_one_icon_svg['url'] : NULL),
		(!empty($olc_box_one_icon['alt']) ? $olc_box_one_icon['alt'] : NULL),
		$olc_box_one_heading,
		$olc_box_one_text
	);
	fcwp_display_box(
		'education',
		$olc_box_two_url,
		(!empty($olc_box_two_icon['url']) ? $olc_box_two_icon['url'] : NULL),
		(!empty($olc_box_two_icon_retina['url']) ? $olc_box_two_icon_retina['url'] : NULL),
		(!empty($olc_box_two_icon_svg['url']) ? $olc_box_two_icon_svg['url'] : NULL),
		(!empty($olc_box_two_icon['alt']) ? $olc_box_two_icon['alt'] : NULL),
		$olc_box_two_heading,
		$olc_box_two_text
	);
	fcwp_display_box(
		'membership',
		$olc_box_three_url,
		(!empty($olc_box_three_icon['url']) ? $olc_box_three_icon['url'] : NULL),
		(!empty($olc_box_three_icon_retina['url']) ? $olc_box_three_icon_retina['url'] : NULL),
		(!empty($olc_box_three_icon_svg['url'] ) ? $olc_box_three_icon_svg['url'] : NULL),
		(!empty($olc_box_three_icon['alt']) ? $olc_box_three_icon['alt'] : NULL),
		$olc_box_three_heading,
		$olc_box_three_text
	);
  ?>
</section>