(function( $ ) {
  'use strict';
	var $menuItem = $('#nav__menu li.menu-item-has-children'),
      $subMenuItem = $('#nav__menu ul.sub-menu' ),
      $speed = '700',
      $ease = 'easeInOutQuart';
	// setup
	$menuItem.addClass('closed').attr('tabIndex',-1).attr('aria-haspopup',true).prepend('<div class="li__inner"></div>');
	$subMenuItem.attr('aria-hidden', true);
	$($menuItem).on('click', function(e) {
    e.stopPropagation();
		$(this).siblings('li').removeClass('open').addClass('closed').children('ul, .li__inner').slideUp($speed, $ease);
		if($(this).hasClass('closed')){
			$(this).removeClass('closed').addClass('open');
			$(this).children('ul, .li__inner').slideDown($speed, $ease);
		} else if($(this).hasClass('open')){
			$(this).removeClass('open').addClass('closed');
			$(this).children('ul, .li__inner').slideUp($speed, $ease);
		}
	})
  $('html').on('click', function() {
      $menuItem.removeClass('open').addClass('closed');
      $menuItem.children('ul, .li__inner').slideUp($speed, $ease);
  })
})( jQuery );