<div class="portfolio-tax-list">
	<h2>Industries</h2>

	<?php
	//list sectors

	$taxonomy     = 'sectors';
	$orderby      = 'name';
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$exclude      = '20,22'; // excluding the "featured" sector, it's used to classify posts for display on the front page

	$args = array(
		'taxonomy'     => $taxonomy,
		'orderby'      => $orderby,
		'show_count'   => $show_count,
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'exclude'      => $exclude
	);
	?>

	<ul>
		<?php wp_list_categories($args); ?>
	</ul>
</div><!-- <div class="portfolio-tax-list">
<h2>Top Features</h2>

        <?php
//list features

$taxonomy     = 'features';
$orderby      = 'count';
$order        = 'DESC';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$number       = 5;

$args = array(
	'taxonomy'     => $taxonomy,
	'orderby'      => $orderby,
	'show_count'   => $show_count,
	'pad_counts'   => $pad_counts,
	'hierarchical' => $hierarchical,
	'title_li'     => $title,
	'number'       => $number,
	'order'        => $order
);
?>

<ul>
<?php wp_list_categories($args); ?>
</ul>
</div> -->
<form action="<?php echo get_home_url(); ?>" method="get">
	<fieldset>
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
<!--		<input type="hidden" name="post_type" value="portfolio" />-->
		<input type="submit" id="searchsubmit" value="Search" />
	</fieldset>
</form>

