<ol class="commentlist">
    <?php wp_list_comments( array( 'callback' => 'custom_comments' ) ); ?>
</ol>
<div class="navigation">
    <?php paginate_comments_links(); ?> 
</div>