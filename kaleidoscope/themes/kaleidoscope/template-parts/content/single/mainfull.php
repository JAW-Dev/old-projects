<?php
	$kl_projects_lable = ( get_field( 'kl_projects_lable', 'option' ) ? get_field( 'kl_projects_lable', 'option' ) : '' );
	$kl_location_lable = ( get_field( 'kl_location_lable', 'option' ) ? get_field( 'kl_location_lable', 'option' ) : '' );
	$kl_related_lable = ( get_field( 'kl_related_lable', 'option' ) ? get_field( 'kl_related_lable', 'option' ) : '' );
	$kl_resources_label = ( get_field( 'kl_resources_label', 'option' ) ? get_field( 'kl_resources_label', 'option' ) : '' );
	$kl_portfolio_location = ( get_field( 'kl_portfolio_location' ) ? get_field( 'kl_portfolio_location' ) : '' );
	$kl_portfolio_location = ( get_field( 'kl_portfolio_location' ) ? get_field( 'kl_portfolio_location' ) : '' );
	$kl_portfolio_description = ( get_field( 'kl_portfolio_description' ) ? get_field( 'kl_portfolio_description' ) : '' );
	$kl_portfolio_featured_information = ( get_field( 'kl_portfolio_featured_information' ) ? get_field( 'kl_portfolio_featured_information' ) : '' );
?>
<div class="body__content pages-full single">
	<div class="content__row">
		<div id="left-col" class="col col__two-third main-col">
			<div class="section__heading">
				<p><em><?php echo get_the_term_list( $post->ID, 'portfolio_type', $kl_projects_lable, ', ' ) ?></em></p>
				<h2 class="heading"><?php the_title(); ?></h2>
			</div>
			<div class="section__text">
				<?php echo $kl_portfolio_description; ?>
			</div>
		</div>
		<div id="right-col" class="col col__one-third side-col">
			<div>
				<div class="section__heading second">
					<p><em><?php echo $kl_location_lable; ?></em></p>
					<h3 class="heading"><?php echo $kl_portfolio_location; ?></h3>
				</div>
				<div class="section__text second">
					<?php echo $kl_portfolio_featured_information; ?>
				</div>

			</div>
			<div>
				<?php if( get_field( 'kl_portfolio_files' ) or get_field('kl_portfolio_ulr')) : ?>
				<div class="section__heading sub">
					<p><em><?php echo $kl_related_lable; ?></em></p>
					<h3 class="heading"><?php echo $kl_resources_label; ?></h3>
				</div>
				<div class="section__text">
					<ul>
					<?php 
					if( have_rows('kl_portfolio_files') ):
					    while ( have_rows('kl_portfolio_files') ) : the_row();
							$att = get_sub_field('kl_ir_file');
					?>
					        <li><a href="<?php echo $att['url']; ?>"><?php the_sub_field('kl_ir_file_text'); ?></a></li>
					<?php
					    endwhile;
					endif;
					if( have_rows('kl_portfolio_ulr') ):
					    while ( have_rows('kl_portfolio_ulr') ) : the_row();
					?>
					        <li><a href="<?php the_sub_field('kl_ir_url'); ?>"><?php the_sub_field('kl_ir_url_text'); ?></a></li>
					<?php
					    endwhile;
					endif;
					?>
					</ul>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>