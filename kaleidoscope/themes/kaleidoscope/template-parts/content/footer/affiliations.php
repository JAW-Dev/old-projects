<?php if( have_rows('kl_affiliations', 'option') ): ?>

	<ul class="affiliations">

	<?php while( have_rows('kl_affiliations', 'option') ): the_row(); 
		$image = get_sub_field('kl_affiliation_logo', 'option');
		
		// thumbnail
		$size = 'footer-logo';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
		
		
		
		?>

		<li class="listing">

		

				<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt'] ?>" />


		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>