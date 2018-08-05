<footer class="footer" role="contentinfo">
  <div class="content__wrapper">
  	<?php get_template_part( 'template-parts/footer/content', 'company' ); ?>
    <div class="search__form col__1-3">
      <small><?php _e( 'Search our site', 'fcwp' ); ?></small>
      <?php get_search_form(); ?>
    </div>
  </div>
   <?php get_template_part( 'template-parts/footer/content', 'top' ); ?>
</footer>
<?php get_template_part( 'template-parts/content', 'quicklinks' ); ?>
<div id="contact-from" style="display:none" class="contact-from">
  <?php echo do_shortcode('[gravityform id=1 title=true description=false ajax=true]'); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>