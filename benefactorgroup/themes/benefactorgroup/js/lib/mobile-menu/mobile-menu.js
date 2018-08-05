(function ( $ ) {
    "use strict";
    $(function () {
        var slideoutMenu = $('#header__nav--main');
        var slideoutMenuWidth = 245;
        $('#nav--button').on('click', function(event) {
            $('#nav--button').hide(0).delay(280).show(0);
            $('#body__overlay').toggle();
            slideoutMenu.toggleClass("open");
            if (slideoutMenu.hasClass("open")) {
                slideoutMenu.animate({right: "0px"}); 
            } else {
                slideoutMenu.animate({right: -slideoutMenuWidth}, 250);    
            }
        });
        $('#body__overlay').click(function() {
            $('#body__overlay').toggle();
            slideoutMenu.removeClass("open");
            slideoutMenu.animate({right: -slideoutMenuWidth}, 250);
        });
        function menuDesk() {
            if($(window).width() >= 782) {
                $('#body__overlay').hide();
                $('#nav--button').hide();
                slideoutMenu.removeClass("open");
                slideoutMenu.css({'right': 'auto'});
            } else {
                slideoutMenu.css({'right': -slideoutMenuWidth});
                $('#nav--button').show();
            }
        }
        menuDesk();
        $(window).resize(function() {
            menuDesk();
        });
    });
}(jQuery));