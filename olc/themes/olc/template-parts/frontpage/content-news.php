<section class="content__wrapper">
  <div class="content__default">
    <?php
    $news_query = new WP_Query(array(
        'post_type'         =>'post',
        'posts_per_page'    => '3',
        'no_found_rows'     => true
    ));
    if(have_posts()) : 
      while($news_query->have_posts()) : 
        $news_query->the_post();
        get_template_part( 'template-parts/content', 'excerpt' );
      endwhile; 
    endif; 
    wp_reset_postdata();
    ?> 
  </div>
</section>