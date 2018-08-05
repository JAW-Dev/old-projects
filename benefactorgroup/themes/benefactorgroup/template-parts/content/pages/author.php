<?php 
$author = ( get_field( 'bene_author' ) ? get_field( 'bene_author' ) : '' );
if( $author ) :
$author_query = new WP_Query(array(
    'post_type'         => 'team_member',
    'posts_per_page'    => '1',
    'page_id'           => $author[0]
));
    while ( $author_query->have_posts() ) : $author_query->the_post();
    $author_image = ( get_field( 'bene_author_image' ) ? get_field( 'bene_author_image' ) : '' );
    $author_alt = $author_image['alt'];
    $author_base = $author_image['sizes']['author-small'];
    $author_retina = $author_image['sizes']['author-small@2'];
    $the_title = get_the_title();
    $bene_author_displayed_name = ( get_field( 'bene_author_displayed_name') ? get_field( 'bene_author_displayed_name' ) : $the_title );
    $bene_author_bio = ( get_field( 'bene_author_bio') ? get_field( 'bene_author_bio' ) : '' );
    ?>
    <div class="post-author">
        <div class="author__image">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $author_base ?>" alt="<?php echo $author_alt ?>" />
        </a>
        </div>
        <div class="author__bio">
        <?php echo '<a href="' . get_the_permalink() . '"><span class="author__name">' . $bene_author_displayed_name . '</span></a> ' . $bene_author_bio; ?>
        
        </div>
    </div>
    <?php
    endwhile; wp_reset_postdata();
endif;
?>