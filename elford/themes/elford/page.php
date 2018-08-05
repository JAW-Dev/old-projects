<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Twenty_Eleven
 * @since      Twenty Eleven 1.0
 */

get_header();

$parents        = get_post_ancestors($post->ID);
$highest_parent = ($parents) ? $parents[count($parents) - 1] : $post->ID;
$id             = ($post->ID);

?>
	<!-- middle column -->
	<div id="primary">

		<div id="content" role="main">

			<?php if (!empty($before_content))
				echo "<div id='before_content'>{$before_content}</div>" ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('content', 'page'); ?>

				<?php // comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php if (!empty($after_content))
				echo "<div id='after_content'>{$after_content}<div class='clear'>&nbsp;</div></div>" ?>

			<?php if ('portfolio' == get_post_type()) {
				//echo do_shortcode('[gallery id="' . $post->ID . '" columns="2" link="file"]');
				echo apply_filters('the_content', '[gallery id="' . $post->ID . '" columns="2" link="file"]');
			} ?>

			<?php if ('job' == get_post_type()) { ?>

				<div class="equal-opp">Elford, Inc. is proud to be an Equal Opportunity Employer and an Equal Opportunity Employer of individuals with disabilities and veteran status.</div>

				<?php if (!is_tax() && !is_category() && !is_archive()) : ?>

					<div class="job-app">
					<?php echo do_shortcode('[gravityform id="1" name="Apply Online"]') ?>

				<?php endif; ?>

				</div>

			<?php } ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<!-- left column -->


	<div id="leftcolumn">

		<?php if ((is_page('81')) or ('portfolio' == get_post_type()) or (is_tax('sectors'))) { ?>


			<?php
			require('sidebar-portfolio.php');
			?>


		<?php }
		elseif ((is_page('11')) or ('job' == get_post_type($id)) or (is_tax('job_types'))) { ?>


			<?php
			$taxonomy     = 'job_types';
			$orderby      = 'name';
			$show_count   = 1;      // 1 for yes, 0 for no
			$pad_counts   = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no
			$title        = '<h2>Available Jobs</h2>';


			$args = array(
				'taxonomy'         => $taxonomy,
				'orderby'          => $orderby,
				'show_count'       => $show_count,
				'pad_counts'       => $pad_counts,
				'hierarchical'     => $hierarchical,
				'title_li'         => $title,
				'show_option_none' => __('No Jobs Currently Available'),
			);
			?>

			<ul>
				<?php wp_list_categories($args); ?>
			</ul>

		<?php }
		elseif (is_single() || is_home() || is_archive()) { ?>

			<h2>News Archives:</h2>
			<?php wp_get_archives('type=monthly'); ?>


		<? }
		else { ?>


			<?php if (!empty($extra_nav)) {
				echo $extra_nav;
			} ?>
			<ul id="subnav"><?php
				wp_list_pages("title_li=&child_of={$highest_parent}");
				if (is_page('about-us')) :
					echo '<li class="page_item page-item-111">
				<a href="' . home_url() . '/news/">News</a>
			</li>';
				endif;
				?></ul> <?php } ?>
	</div>


	<!-- right column -->
	<div id="rightcolumn">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>