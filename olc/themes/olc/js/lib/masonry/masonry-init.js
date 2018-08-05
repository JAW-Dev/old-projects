/*---------------------------------------------------------
 * Masonry Init
---------------------------------------------------------*/
(function( $ ) {
  'use strict';
  $(function() {
    $('.masonry').masonry({
      itemSelector: '.masonry__entry',
      columnWidth: '.masonry__entry'
    });
  });
})( jQuery );