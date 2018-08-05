<p class="meta__author meta__author--link byline vcard author">
    <?php _e('Witten by ', DOMAIN ); ?>
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" itemprop="url">
        <span class="fn" itemprop="author" rel="author"><?php echo get_the_author(); ?></span>
    </a>
</p>