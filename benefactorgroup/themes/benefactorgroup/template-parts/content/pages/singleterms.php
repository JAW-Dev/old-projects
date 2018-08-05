<?php 
if( is_singular( 'clients' ) ) :
    $terms = get_the_term_list( get_the_ID(), 'client_categories', '<em>Category</em>: ', ', ' );
    $tasks = get_the_term_list( get_the_ID(), 'tasks', '<em>Tasks Performed</em>: ', ', ' );
    if( $terms && !$tasks ) :
        echo $terms;
    elseif( $tasks && !$terms ) :
        echo $tasks;
    elseif( $terms && $tasks ) :
        echo $terms . ' | ' . $tasks;
    endif;
else :
    $categories = get_the_category_list( ', ', '', get_the_ID() );
    $cat_terms = wp_get_post_terms( $post->ID , 'category', '');
    $count = count($cat_terms);
    if( $count > 1 ) :
        $label = 'Categories';
    else :
        $label = 'Category';
    endif;
    echo '<em>' . $label . '</em>: ' . $categories;
endif;
?>