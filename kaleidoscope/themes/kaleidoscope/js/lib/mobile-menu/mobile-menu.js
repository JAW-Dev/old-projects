(function ( $ ) {
    "use strict";
    $(function () {
        $('#nav--button').click(function() {
            $('#nav-mobile').slideToggle('fast');
        });
        function menuDesk() {
            if($(window).width() >= 947) {
                $('#nav-mobile').hide();
            }      
        }
        menuDesk();
        $(window).resize(function() {
            menuDesk();
        });
    });
}(jQuery));