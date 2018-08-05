/*---------------------------------------------------------
 * jQuery no conflict
---------------------------------------------------------*/
var $ = jQuery.noConflict();
/*---------------------------------------------------------
 * Video Tutorials
---------------------------------------------------------*/
(function( $ ) {
  'use strict';

  $(function() {
    $('.dfw__tutorial-title').on('click', function() {
      $(this).toggleClass('opened')
      $(this).next('.dfw__tutorial-video-wrapper').slideToggle();
    });
  });

})( jQuery );