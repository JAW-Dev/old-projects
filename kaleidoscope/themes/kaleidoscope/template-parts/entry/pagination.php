<nav class="post__pagination">
    <?php
    global $wp_query;
    if ( $wp_query->max_num_pages > 1 ) :
    ?>
        <?php // Single Line
        $sep = ' - ';
        $prelabel =  __( '&laquo; Previous', DOMAIN );
        $nextlabel =  __( 'Next &raquo;', DOMAIN );
        posts_nav_link( $sep, $prelabel, $nextlabel ); 
        ?>
        <?php // Seperate Links ?>
        <div class="post-listing-nav-prev">
            <?php next_posts_link( $nextlabel, $wp_query->max_num_pages ); ?>
        </div>
        <div class="post-listing-nav-next">
            <?php previous_posts_link( $prelabel, $wp_query->max_num_pages ); ?>
        </div>
        <?php // Numbered Pagination
        $paginate_links_args = array(
                'base'          => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'format'        => '?paged=%#%',
                'total'         => $wp_query->max_num_pages,
                'current'       => max( 1, get_query_var( 'paged' ) ),
                'show_all'      => false,
                'end_size'      => 1,
                'mid_size'      => 2,
                'prev_next'     => True,
                'prev_text'     => $prelabel,
                'next_text'     => $nextlabel,
                'type'          => 'plain',
                'add_args'      => False,
                'add_fragment'  => ''
            );
        echo paginate_links( $paginate_links_args );
        ?>
<?php endif; ?>
</nav>