// Had a conflict with this and the homepage slider...

//window.onload = function() {
//   var n=document.getElementById('portfolio-slider').getElementsByTagName('img'), i=n.length;
//   while(i--){n[i].className = n[i].clientHeight > 600 ? 'attachment-full-width wp-post-image large_img' : 'attachment-full-width wp-post-image small_img' ;}
//};


jQuery(document).ready(function($) {

	if( $(document).width() <= 450) {
		//alert("width < 450");
		scroll_to_content();
	}
	
	jQuery('#featured-image img').load(function() {
		//alert('img loaded');
		scroll_to_content();
	});

});

function scroll_to_content() {
	// jump to top of navigation
	jQuery(document).scrollTop( jQuery('#nav-main').offset().top  );
	
	// jump to currently selected main nav item
	//jQuery(document).scrollTop( jQuery('#menu-primary-navigation > li.current-menu-item, #menu-primary-navigation > li.current-page-ancestor').offset().top  );
}

// sensing large or small images in the slider


 