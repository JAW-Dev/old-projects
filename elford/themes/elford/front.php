<?php
/*
Template Name: Front Page
*/
get_header(); ?>
<div id="primary" role="main">
	<div class="content__wrapper">
	<?php
	while ( have_posts() ) :
		the_post();
		if( have_rows( 'elf_featured_posts' ) ):
		  while ( have_rows( 'elf_featured_posts' ) ) :
		  the_row();
			$image   = get_sub_field( 'elf_featued_posts_image' );
			$url     = $image['url'];
			$alt     = $image['alt'];
			$size    = 'featured-post';
			$thumb   = $image['sizes'][ $size ];
			$heading = get_sub_field( 'elf_featured_post_heading' );
			$text    = get_sub_field( 'elf_featured_post_text' );
			$link    = get_sub_field( 'elf_featured_post_link' );
			?>
			<div class="col col__1-3 hp-featured-posts">
				<span class="featured-posts__thumbnail">
					<a href="<?php echo $link; ?>">
						<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
					</a>
				</span>
				<h2 class="featured-posts__title">
					<a href="<?php echo $link; ?>">
						<?php echo $heading; ?>
					</a>
				</h2>
				<span class="featured-posts__excerpt">
					<?php echo $text; ?>
				</span>
			</div>
			<?php
		  endwhile;
		endif;
	endwhile;
	?>
	</div>
</div>
<?php get_footer(); ?>