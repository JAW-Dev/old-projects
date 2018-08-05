(function ( $ ) {
    "use strict";
    $(function () {
        $('.masonry-item a').hover(function() {
            $(this).siblings('.content__caption').addClass('hover');
        }, function() {
            $(this).siblings('.content__caption').removeClass('hover');
        });
    });
}(jQuery));