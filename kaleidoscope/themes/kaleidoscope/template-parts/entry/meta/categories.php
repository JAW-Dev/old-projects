<?php if (get_the_category()) : ?>
    <ul class="meta__categories">
        <?php wp_list_categories(); ?>
    </ul>
<?php endif; ?>