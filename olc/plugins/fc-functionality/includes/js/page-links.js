(function( $ ) {
	'use strict';

	 $(function() {
		// WordPress Page Links
		$('.page-links a').each(function(i) {
			var aHref = $(this).attr('href'),
				paged = aHref.match(/[0-9]*$/)[0];
		    if(aHref.indexOf('&page=') === -1) {
				$(this).attr('aria-label', 'Page 1');
			} else {
				$(this).attr('aria-label', 'Page '+paged);
			}
		});
	 });

})( jQuery );