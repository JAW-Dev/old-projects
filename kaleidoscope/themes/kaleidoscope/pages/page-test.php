<?php
/*
Template Name: Test
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<div class="body__content">
		<div style="padding-bottom: 5em"></div>
		<div class="content__row">
			<div class="featured__left">
				<div class="test content__two-third" style="background-color: #ccc"></div>
				<div class="test content__one-third" style="background-color: #ccc"></div>
			</div>
		</div>
		<div class="content__row">
			<div class="featured__right">
				<div class="test content__one-third" style="background-color: #ccc"></div>
				<div class="test content__two-third" style="background-color: #ccc"></div>
			</div>
		</div>
		<div class="content__row">
			<div class="masonry js-masonry"  data-masonry-options='{ "gutter": 11, "isFitWidth": true }'>
				<div class="test content__one-third masonry-item" style="background-color: #ccc"></div>
				<div class="test content__one-third masonry-item" style="background-color: #ccc"></div>
				<div class="test content__one-third masonry-item" style="background-color: #ccc"></div>
				<div class="test content__one-third masonry-item" style="background-color: #ccc"></div>
				<div class="test content__one-third masonry-item" style="background-color: #ccc"></div>
				<div class="test content__one-third masonry-item" style="background-color: #ccc"></div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>