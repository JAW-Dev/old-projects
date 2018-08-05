<?php
/*
Template Name: Partners
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <div class="main__content">

		<div class="col__half">
        <?php
        if (have_posts()) : while (have_posts()) : the_post(); 
            $swf_half_lead_content = ( get_field( 'swf_half_lead_content' ) ? get_field( 'swf_half_lead_content' ) : '' );
            the_content();
        endwhile; endif; wp_reset_postdata();
        ?>
    	</div>
    	<div class="col__half">
         <?php
        $partners_query = new WP_Query(array(
            'post_type'         =>'partners',
            'posts_per_page'    => '999',
            'no_found_rows'     => true,
            'tax_query'         => array(
                array(
                    'taxonomy' => 'partner_type',
                    'field'    => 'slug',
                    'terms'    => array( 'public-and-semi-public-entities' ),
                ),
            ),
            'order_by'         => 'title',
            'order'            => 'ASC'
        ));
        ?>
        <h2 class="post__excerpt--title partner-section"><?php _e('Public and Semi-Public Entities', 'swf'); ?></h2>
        <?php
        if (have_posts()) : while ($partners_query->have_posts()) : $partners_query->the_post();
        $swf_partner_logo = ( get_field( 'swf_partner_logo' ) ? get_field( 'swf_partner_logo' ) : '' );
        $swf_partner_url = ( get_field( 'swf_partner_url' ) ? get_field( 'swf_partner_url' ) : '' );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post__excerpt'); ?> role="article">
            <div class="post__partner--image">
                <?php if( $swf_partner_logo ) : ?>                    
                <a href="<?php echo $swf_partner_url; ?>">
                    <img src="<?php echo $swf_partner_logo['url']; ?>" alt="<?php echo $swf_partner_logo['alt']; ?>" />
                </a>
                <?php endif; ?>
            </div>
            <div class="post__partner--content">
                <h3 class="post__excerpt--title featured-project">
                    <span itemprop="name"><a href="<?php echo $swf_partner_url; ?>"><?php the_title(); ?></a></span>
                </h3>
                <?php the_content(); ?>
            </div>
        </article>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        <?php 
        echo $swf_half_lead_content;
        $partners_query = new WP_Query(array(
            'post_type'         =>'partners',
            'posts_per_page'    => '999',
            'no_found_rows'     => true,
            'tax_query'         => array(
                array(
                    'taxonomy' => 'partner_type',
                    'field'    => 'slug',
                    'terms'    => array( 'environmental-entities-and-non-profits' ),
                ),
            ),
            'order_by'         => 'title'
        ));
        ?>
        <h2 class="post__excerpt--title partner-section"><?php _e('Environmental Entities and Non-Profits', 'swf'); ?></h2>
        <?php
        if (have_posts()) : while ($partners_query->have_posts()) : $partners_query->the_post();
        $swf_partner_logo = ( get_field( 'swf_partner_logo' ) ? get_field( 'swf_partner_logo' ) : '' );
        $swf_partner_url = ( get_field( 'swf_partner_url' ) ? get_field( 'swf_partner_url' ) : '' );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post__excerpt'); ?> role="article">
            <div class="post__partner--image">
                <?php if( $swf_partner_logo ) : ?>                    
                <a href="<?php echo $swf_partner_url; ?>">
                    <img src="<?php echo $swf_partner_logo['url']; ?>" alt="<?php echo $swf_partner_logo['alt']; ?>" />
                </a>
                <?php endif; ?>
            </div>
            <div class="post__partner--content">
                <h3 class="post__excerpt--title featured-project">
                    <span itemprop="name"><a href="<?php echo $swf_partner_url; ?>"><?php the_title(); ?></a></span>
                </h3>
                <?php the_content(); ?>
            </div>
        </article>
        <?php endwhile; endif; wp_reset_postdata(); ?>
            
    	</div>
    </div>
</main>
<?php get_footer(); ?>