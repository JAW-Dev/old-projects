<?php
$kl_values_section_title = ( get_field( 'kl_values_section_title' ) ? get_field( 'kl_values_section_title' ) : '' );
$kl_values_section = ( get_field( 'kl_values_section' ) ? get_field( 'kl_values_section' ) : '' );
?>
<div class="values">
	<h2 class="section__heading values-title-mobile">
		<?php echo $kl_values_section_title; ?>
	</h2>
	<div class="content__row">
		<?php
		if( have_rows('kl_values_section') ):
			while ( have_rows('kl_values_section') ) : the_row();
		?>
		<div class="values-col">
			<h3 class="values-title">
				<em><?php echo the_sub_field('kl_value_title'); ?></em>
			</h3>
			<div class="values-text">
				<?php echo the_sub_field('kl_value_text'); ?>
			</div>
		</div>
		<?php
			endwhile;
		endif;
		?>
	</div>
</div>