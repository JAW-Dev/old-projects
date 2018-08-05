(function ( $ ) {
    "use strict";
    $(function () {
        function fullMenu() {
            var menu = $('.nav__full .nav__dropdown'),
                list = $('.primary-nav-list li, .nav__dropdown');
            menu.hide();
            $('#primary-nav-list').attr("aria-expanded","false");
            list.mouseover( function () {
                  menu.stop().slideDown('fast');
                  $('#primary-nav-list').attr("aria-expanded","true");
            });
            menu.mouseover( function () {
                  menu.stop().show();
                  $('#primary-nav-list').attr("aria-expanded","false");
            });
            list.mouseleave( function () {
                  menu.stop().delay('500').slideUp('fast');
            });
        }
        function mobileMenu() {
            var slideoutMenu = $('.nav__mobile .nav__mobile-dropdown'),
                slideoutMenuWidth = 310,
                subMenu = $('.nav__mobile-dropdown .nav-item__heading .sub-menu');
                $('.mobile__button').attr("aria-expanded","true");
                $('.nav__mobile .menu-item-has-children').attr("aria-expanded","false");
            $('.mobile__button').on('click', function(event) {                
                slideoutMenu.toggleClass("open");
                $('.mobile__button').attr("aria-expanded","true");
                if (slideoutMenu.hasClass("open")) {
                    slideoutMenu.show().animate({right: "-10px"}); 
                } else {
                    slideoutMenu.animate({ right: -slideoutMenuWidth }, slideoutMenuWidth);
                    $('.mobile__button').attr("aria-expanded","false");
                    slideoutMenu.delay(300).hide(0);
                }
            });
            $('.nav-item__heading .sub-menu li .sub-menu').show();
            $('.nav__mobile .mit ul').hide();
        }
        fullMenu();
        mobileMenu();
    });
}(jQuery));