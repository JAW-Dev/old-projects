<?php
/*
Template Name: Show jobs list below content
*/

$in_template = "jobs";


// get jobs list as $after_content
ob_start();
?>
	<div class="open-jobs">
	<h2>Open Jobs</h2>

	<?php
	query_posts( array( 'post_type' => 'job' ) );
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		$elf_featured_image = ( get_field( 'elf_featured_image' ) ? get_field( 'elf_featured_image' ) : '' );
	?>
	<div class="job-box">
	<div class="job-meta">
	<a href="<?php the_permalink(); ?>">
		<h3><?php the_title(); ?></h3>
	</a>
	<?php if( $elf_featured_image ) : ?>
		<img class="jobs-img" src="<?php echo $elf_featured_image['url']; ?>" alt="<?php echo $elf_featured_image['alt']; ?>" />
		<?php endif; ?>
	<?php echo get_the_term_list( get_the_ID(), 'job_types', "Job Type: " , ', ' ) ?>
	</div>
	<?php the_excerpt(); ?>
	</div>

	<?php endwhile; endif; wp_reset_query(); ?>
 </div>
<?php
$after_content = ob_get_clean();

require('page.php');
