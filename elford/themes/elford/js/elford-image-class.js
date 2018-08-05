window.onload = function() {
   var n=document.getElementById('portfolio-slider').getElementsByTagName('img'), i=n.length;
   while(i--){n[i].className = n[i].clientHeight > 600 ? 'attachment-full-width wp-post-image large_img' : 'attachment-full-width wp-post-image small_img' ;}
};

