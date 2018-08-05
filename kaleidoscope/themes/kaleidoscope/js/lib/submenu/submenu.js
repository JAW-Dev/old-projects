(function( $ ) {
     'use strict';
     $(function() {
          var menu = $('#nav-submenu'),
              list = $('#header__nav--main #nav-what-we-do, #header__nav--main #nav-portfolio, #nav-submenu');
          menu.hide();
          list.mouseover( function () {
                  menu.stop().slideDown('fast');
          });
          menu.mouseover( function () {
                  menu.stop().show();
          });
          list.mouseleave( function () {
                  menu.stop().delay('500').slideUp('fast');
          });
     });
})( jQuery );