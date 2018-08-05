/*---------------------------------------------------------
 * SCG Support
---------------------------------------------------------*/
function supportsSVG() {
    return !! document.createElementNS && !! document.createElementNS('http://www.w3.org/2000/svg','svg').createSVGRect;  
  }
  if (supportsSVG()) {
    document.documentElement.className += ' svg';
  } else {
    document.documentElement.className += ' no-svg';
    var imgs = document.getElementsByTagName('img');
    var dotSVG = /.*\.svg$/;
    for (var i = 0; i != imgs.length; ++i) {
      if(imgs[i].src.match(dotSVG)) {
        imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
      }
    }
  }
  $(function() {
    $('img.svg').each(function(){
      var $img = $(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
      $.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = $(data).find('svg');
          // Add replaced image's ID to the new SVG
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }
          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');
          // Replace image with new SVG
          $img.replaceWith($svg);
      }, 'xml');

    });
  });
  $(function() {
  });