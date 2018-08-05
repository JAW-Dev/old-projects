<div class="entry__none">
    <h2><?php _e('No Results', DOMAIN); ?></h2>
    <p>
        <?php
        if( is_author() ) :
            printf( __( 'The author <strong>%s</strong> does not have any posts', DOMAIN ),  get_the_author() );
        // Attachment
        elseif( is_attachment() ) :
            _e( 'The attactment you are looking for does not exist.', DOMAIN );
        // Category
        elseif( is_category() ) :
            printf( __( 'The category <strong>%s</strong> does not have any posts', DOMAIN ),  single_cat_title( '', false ) );
        // Page
        elseif( is_page() ) :
            _e( 'The page you are looking for does not exist.', DOMAIN );
        // Search
        elseif( is_search() ) :
            printf( __( 'Sorry no results for: <strong>%s</strong>', DOMAIN ),  get_search_query() );
        // Single
        elseif( is_single() ) :
            _e( 'The post you are looking for does not exist.', DOMAIN );
        // Tag
        elseif( is_tag() ) :
            printf( __( 'The tag <strong>%s</strong> does not have any posts', DOMAIN ),  single_cat_title( '', false ) );
        // Taxonomy
        elseif( is_tag() ) :
            printf( __( 'The Category <strong>%s</strong> does not have any posts', DOMAIN ),  single_term_title( '', false ) );
        // Archive
        elseif( is_archive() ) :
            if ( is_day() ) :
                printf( __( 'The daily archives <strong>%s</strong> do not have any posts', DOMAIN ), get_the_date() );
            elseif ( is_month() ) :
                printf( __( 'The monthly archives <strong>%s</strong> do not have any posts', DOMAIN ), get_the_date( 'F Y' ) );
            elseif ( is_year() ) :
                printf( __( 'The yearly archives <strong>%d</strong> do not have any posts', DOMAIN ), get_the_date( 'Y' ) );
            else :
                _e( 'Archives', DOMAIN );
            endif;
        // Author
        endif; 
        ?>
    </p>
</div>