(function( $ ) {
	'use strict';

	 $(function() {
		// WordPress default numbered pagination
		$('.page-numbers').attr('aria-label', 'Pagination');
		$('.page-numbers .prev').attr('aria-label', 'Previous Page');
	 	$('.page-numbers .next').attr('aria-label', 'Next Page');
	 	$('.page-numbers .dots').attr('aria-label', 'Ellipsis');
	 	$('.page-numbers a.page-numbers').not('.next, .prev').each(function(i) {
			var paged = $(this).html();
		    $(this).attr('aria-label', 'Page '+paged);
		});
	 });

})( jQuery );