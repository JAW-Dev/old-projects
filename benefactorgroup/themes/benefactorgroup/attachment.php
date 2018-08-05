<?php get_header(); ?>

<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="body__content">
        <header>
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>
        <div class="content__row">
            <div class="col col__two-third">
	            
	<?php // get_sidebar('posts'); ?>
	<section class="attachment"  role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						
			<div class="post-entry">
			<div class="attachment-img">
			<?php if (wp_attachment_is_image($post->id)) {
				$att_image = wp_get_attachment_image_src( $post->id, "full");
				?>
				<p class="attachment">
					<!-- <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>"> -->
					<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
					<!-- </a> -->
				</p>
				<?php } ?></div>
			<div class="attachment-desc">
				<?php the_content(); ?>
			</div>
			
		<!-- add in if giving USA 2014 stuff here -->
		
		<?php 
		$url = (get_permalink( $post->id ));
		if (strpos ($url, 'giving-usa-2014') !== false) {
			?>
			
			<div class="givingusa-linkback">
			<a href="http://benefactorgroup.com/giving-usa-2014/">
			Click to view the full Giving USA 2014 infographic. 
			</a>
			</div>
			
			<?php
		} ?>
		
		<!-- end giving USA 2014 stuff here -->
		
		
		<!-- add in if giving USA 2015 stuff here -->
		
		<?php 
		$url = (get_permalink( $post->id ));
		if (strpos ($url, 'giving-usa-2015') !== false) {
			?>
			
			<div class="givingusa-linkback">
			<a href="http://benefactorgroup.com/giving-usa-2015/">
			Click to view the full Giving USA 2015 infographic, request your copy, or share more.  
			</a>
			</div>
			
			<?php
		} ?>
		
		<!-- end giving USA 2015 stuff here -->
		
			
			
			Share this image:<br>
			
			<div class="share-link facebook">
			<div class="fb-share-button" data-href="<?php echo $url ?>" data-type="button"></div>
			</div>
			<div class="share-link twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url ?>" data-text="Giving USA - <?php the_title();?>" data-via="BenefactorGroup" data-related="BenefactorGroup" data-count="none" data-hashtags="givingusa">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
			<div class="clear"></div>
			
			
			
			
			
								<?php endwhile; endif; wp_reset_query(); ?>
		</div>
		</article>
	</section>
            </div>
            <div class="col col__one-third">
                <?php get_sidebar('home'); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>