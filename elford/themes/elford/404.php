<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
 
 // don't display anything if trying to load a file
header('HTTP/1.1 404 Not Found');
$uri = strtolower($_SERVER['REQUEST_URI']);
if(strstr($uri,'.css') || strstr($uri,'.js') || strstr($uri,'.txt') || strstr($uri,'.jpg') || strstr($uri,'.gif') || strstr($uri,'.png')) { die(''); } 

get_header(); ?>

	<div id="primary">

			<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
			  <div id="page-title"><h1>404 Page Not Found</h1></div>
			

				<div class="entry-content">
					<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>

					<?php get_search_form(); ?>

				</div><!-- .entry-content -->
				
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->
	<div style="clear:both;"></div>

	<!-- left column -->
	<!--
	<div id="leftcolumn">
			</div>
		
		
		<!-- right column -->
		
		<div id="rightcolumn">
		<!--<?php get_sidebar(); ?>-->

		</div> 
<?php get_footer(); ?>