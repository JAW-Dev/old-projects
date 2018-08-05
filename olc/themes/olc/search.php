<?php get_header(); ?>
	<main id="main" class="main" role="main">
		<div class="content__wrapper">
			<?php if (have_posts()) : ?>
				<header class="entry__header">
					<h1 class="entry__title">
						<?php printf(esc_html__('Search Results for: %s', '_s'), '<span>' . get_search_query() . '</span>'); ?>
					</h1>
				</header>
				<div class="entry__content content__default">
					<?php

					global $wp_query, $post;

					$blog_ids         = array($GLOBALS['blog_id']);
					$blog_id_for_post = array();
					$blog_posts       = array();

					foreach (get_sites() as $sites) {
						if (!in_array($sites->blog_id, $blog_ids)) {
							$blog_ids[] = $sites->blog_id;
						}
					}

					foreach ($blog_ids as $bid) {
						switch_to_blog($bid);
						$wp_query->query_vars = array_merge($wp_query->query_vars, array('posts_per_page' => 100000));
						foreach ($wp_query->get_posts() as $get_post) {
							$blog_posts[] = $get_post;
						}

						if (count($blog_id_for_post) > 1 && count($wp_query->posts) > 1) {
							$fill             = array_fill(count($blog_id_for_post), count($wp_query->posts), $bid);
							$blog_id_for_post = array_merge($blog_id_for_post, $fill);
						}
					}

					switch_to_blog($blog_ids[0]);

					$number_of_blog_posts = count($blog_posts);
					$current_page_number  = intval(preg_replace('/[^0-9]+/', '', addslashes(urlencode($_GET['page']))), 10);
					$current_page_number  = !empty($current_page_number) ? $current_page_number : 1;
					$posts_per_page       = intval(get_option('posts_per_page'));

					$start = ($current_page_number - 1) * $posts_per_page;
					$end   = min($start + $posts_per_page - 1, $number_of_blog_posts - 1);

					$max = ceil($number_of_blog_posts / $posts_per_page);

					for ($i = $start; $i <= $end; $i++) {
						$blog_post = $blog_posts[$i];
						if ($GLOBALS['blog_id'] != $blog_id_for_post[$i]) {
							switch_to_blog($blog_id_for_post[$i]);
						}
						$post = $blog_post;
						$wp_query->setup_postdata($post);
						get_template_part('template-parts/content', 'excerpt');
					}
					if ($current_page_number > $max || $current_page_number < 1) {
						echo '<p>No results Found.</p>';
					}

					switch_to_blog($blog_ids[0]);

					if ($current_page_number >= 1 && $current_page_number <= $max && $max > 1):
						echo '<p style="text-align: center">';
						if ($current_page_number > 1 && $current_page_number <= $max) :
							?>
							<a href="<?php echo '//' . $_SERVER['SERVER_NAME'] . '?s=' . addslashes(urlencode($_GET['s'])) . '&page=' . ($current_page_number - 1); ?>"><< Previous</a> &nbsp;
							<?php
						endif;
						if ($current_page_number < $max && $current_page_number >= 1) :
							?>
							<a href="<?php echo '//' . $_SERVER['SERVER_NAME'] . '?s=' . addslashes(urlencode($_GET['s'])) . '&page=' . ($current_page_number + 1); ?>">Next >></a>
							<?php
						endif;
						echo '</p>';
					endif;

					?>
				</div>
			<?php endif; ?>
		</div>
	</main>
<?php get_footer(); ?>