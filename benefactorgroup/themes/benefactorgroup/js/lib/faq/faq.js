(function ( $ ) {
    "use strict";
    $(function () {
		//Add Inactive Class To All Accordion Headers
		$('.accordion-header').toggleClass('inactive-header');
		
		// The Accordion Effect
		$('.accordion-header').click(function () {
			if($(this).is('.inactive-header')) {
				$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
				$(this).toggleClass('active-header').toggleClass('inactive-header');
				$(this).next().slideToggle().toggleClass('open-content');
			}
			
			else {
				$(this).toggleClass('active-header').toggleClass('inactive-header');
				$(this).next().slideToggle().toggleClass('open-content');
			}
		});
		
		return false;
    });
}(jQuery));