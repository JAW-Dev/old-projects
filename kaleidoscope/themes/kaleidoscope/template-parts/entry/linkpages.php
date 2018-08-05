<nav class="post__link-pages">
    <?php
    $link_pages_args = array(
            'before'           => '<p>' . __( 'Pages:', DOMAIN ),
            'after'            => '</p>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'separator'        => ' ',
            'nextpagelink'     => __( 'Next page', DOMAIN ),
            'previouspagelink' => __( 'Previous page', DOMAIN ),
            'pagelink'         => '%',
            'echo'             => 1
        );
    wp_link_pages( $link_pages_args );
    ?>
</nav>