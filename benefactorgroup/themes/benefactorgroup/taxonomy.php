<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" role="main">
	<div class="body__content">
		<header>
			<h1 class="page-title"><?php printf( __( '%s', DOMAIN ),  single_cat_title( '', false ) ); ?></h1>
		</header>
		<div class="content__row">
			<div class="col col__two-third">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'template-parts/content/posts' );
				endwhile;
				?>
				<nav class="post__pagination">
					<?php
					global $wp_query;
					if ( $wp_query->max_num_pages > 1 ) :
					?>
						<?php // Single Line
						$sep = ' - ';
						$prelabel =  __( '&laquo; Previous', DOMAIN );
						$nextlabel =  __( 'Next &raquo;', DOMAIN );
						?>
						<?php if( get_previous_posts_link() ) : ?>
						<div class="post-listing-nav-prev button small">
							<?php previous_posts_link( $prelabel, $wp_query->max_num_pages ); ?>
						</div>
						<?php endif; ?>
						  <?php if( get_next_posts_link() ) : ?>
						<div class="post-listing-nav-next button small">
							<?php next_posts_link( $nextlabel, $wp_query->max_num_pages ); ?>
						</div>
						<?php endif; ?>
					<?php endif; ?>
				</nav>
				<?php
				endif; wp_reset_postdata();
				if( is_tax('client_categories') ) :
				?>
				<div class="general buttons">
					<a href="<?php echo home_url() . '/clients-list/' ?>"><?php _e('View Complete Client List', DOMAIN ); ?></a>
				</div>
				<?php endif; ?>
			</div>
			<div class="col col__one-third">
				<?php
				if ( is_tax( 'client_categories' ) ) :
					get_sidebar('clients');
				else :
					get_sidebar('home');
				endif
				?>
			</div>
		</div>
		
	</div>
</main>
<?php get_footer(); ?>
