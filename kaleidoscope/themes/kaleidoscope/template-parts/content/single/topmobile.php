<?php
global $do_not_duplicate, $rows;
// first image
$first_row = $rows[0];
$first_row_image = $first_row['kl_gallery_image'];
$first_row_cap = $first_row['kl_gallery_caption'];
$first_row_id = $first_row['kl_gallery_image']['id'];
$first_row_alt = $first_row['kl_gallery_image']['alt'];
$do_not_duplicate[] = $first_row_id;
$first_row_post_lrg_image = $first_row['kl_gallery_image']['sizes']['post'];
$first_row_post_lrg_image_retina = $first_row['kl_gallery_image']['sizes']['post@2'];
$first_row_full_image = $first_row['kl_gallery_image']['sizes']['large'];
// second image
$second_row = $rows[1];
$second_row_image = $second_row['kl_gallery_image'];
$second_row_cap = $second_row['kl_gallery_caption'];
$second_row_id = $second_row['kl_gallery_image']['id'];
$second_row_alt = $second_row['kl_gallery_image']['alt'];
$do_not_duplicate[] = $second_row_id;
$second_row_post_lrg_image = $second_row['kl_gallery_image']['sizes']['post'];
$second_row_post_lrg_image_retina = $second_row['kl_gallery_image']['sizes']['post@2'];
$second_row_full_image = $second_row['kl_gallery_image']['sizes']['large'];
// third image
$third_row = $rows[2];
$third_row_image = $third_row['kl_gallery_image'];
$third_row_cap = $third_row['kl_gallery_caption'];
$third_row_id = $third_row['kl_gallery_image']['id'];
$third_row_alt = $third_row['kl_gallery_image']['alt'];
$do_not_duplicate[] = $third_row_id;
$third_row_post_lrg_image = $third_row['kl_gallery_image']['sizes']['post'];
$third_row_post_lrg_image_retina = $third_row['kl_gallery_image']['sizes']['post@2'];
$third_row_full_image = $third_row['kl_gallery_image']['sizes']['large'];
?>
<div class="body__content portfolio__top-mobile">
	<div class="content__row">
		<div class="masonry js-masonry"  data-masonry-options='{ "gutter": 11, "isFitWidth": true }'>
			<div class="content__one-third masonry-item">
			<a href="<?php echo $first_row_full_image; ?>" title="<?php echo $first_row_cap; ?>" class="lightbox">
				<picture>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
			        <source srcset="<?php echo $first_row_post_lrg_image_retina; ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)"/>
			        <img src="<?php echo $first_row_post_lrg_image; ?>" alt="<?php echo $first_row_alt ?>" />
			        <!--[if IE 9]></video><![endif]-->
			    </picture>
			</div>
			</a>
			<!-- <div class="content__one-third masonry-item">
			<a href="<?php echo $first_row_full_image; ?>" title="<?php echo $first_row_cap; ?>" class="lightbox">
				<picture> -->
					<!--[if IE 9]><video style="display: none;"><![endif]-->
			        <!-- <source srcset="<?php echo $second_row_post_lrg_image_retina; ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)"/>
			        <img src="<?php echo $second_row_post_lrg_image; ?>" alt="<?php echo $second_row_alt ?>" /> -->
			        <!--[if IE 9]></video><![endif]-->
			    <!-- </picture>
			</a>
			</div>
			<div class="content__one-third masonry-item">
			<a href="<?php echo $first_row_full_image; ?>" title="<?php echo $first_row_cap; ?>" class="lightbox">
				<picture> -->
					<!--[if IE 9]><video style="display: none;"><![endif]-->
			        <!-- <source srcset="<?php echo $third_row_post_lrg_image_retina; ?>" media="(-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi)"/>
			        <img src="<?php echo $third_row_post_lrg_image; ?>" alt="<?php echo $third_row_alt ?>" /> -->
			        <!--[if IE 9]></video><![endif]-->
			    <!-- </picture>
			</a>
			</div> -->
		</div>
	</div>
</div>