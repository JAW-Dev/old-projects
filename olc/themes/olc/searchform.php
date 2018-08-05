<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="text" class="search__form-field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'fcwp' ); ?>" />
  <i class="search__form-btn fa fa-search">
    <input type="submit" id="searchsubmit" value="" />
  </i>
</form>