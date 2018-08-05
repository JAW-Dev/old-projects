<?php

$bg_img_url = NULL;

if ($elf_image = get_field('elf_image')) {
	$bg_img_url = $elf_image['url'];
}
elseif (has_post_thumbnail($post)) {
	$image_src  = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full-width');
	$bg_img_url = $image_src[0];
}
else {
	$args = array(
		'post_type'   => 'portfolio',
		'post_status' => 'publish',
		'numberposts' => -1,
		'orderby'     => 'rand'
	);

	$clients = get_posts($args);

	foreach ($clients as $index => $client) {
		if (has_post_thumbnail($client)) {
			$image_src  = wp_get_attachment_image_src(get_post_thumbnail_id($client->ID), 'full-width');
			$bg_img_url = $image_src[0];
			break;
		}
		else {
			continue;
		}
	}
}

if (!empty($bg_img_url)) { ?>
	<div class="hero-image" style="background-image: url('<?php echo $bg_img_url; ?>')">
		<img src="<?php echo $bg_img_url; ?>" />
	</div>
	<?php
}
else {
	echo ' NO IMAGE! ';
}
