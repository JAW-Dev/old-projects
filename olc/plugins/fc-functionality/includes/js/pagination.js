(function( $ ) {
	'use strict';

	 $(function() {
	 	// wp-pagenavi
	 	var text = $('.wp-pagenavi .pages').text();
	 	$('.wp-pagenavi').attr('aria-label', 'Pagination');
	 	$('.wp-pagenavi .pages').attr('aria-label', text);
	 	$('.wp-pagenavi .current').attr('aria-label', 'Current Page');
	 	$('.wp-pagenavi .first').attr('aria-label', 'First Page');
	 	$('.wp-pagenavi .last').attr('aria-label', 'Last Page');
	 	$('.wp-pagenavi .previouspostslink').attr('aria-label', 'Previous Page');
	 	$('.wp-pagenavi .nextpostslink').attr('aria-label', 'Next Page');
	 	$('.wp-pagenavi .extend').attr('aria-label', 'Ellipsis');
		$('.wp-pagenavi a.page').each(function(i) {
			var aHref = $(this).attr('href'),
				paged = aHref.match(/[0-9]*$/)[0];
			if(!paged){
				$(this).attr('aria-label', 'Page 1');
			} else {
				$(this).attr('aria-label', 'Page '+paged);
			}
		    
		});
		// WordPress default numbered pagination
		$('.page-numbers').attr('aria-label', 'Pagination');
		$('.page-numbers .prev').attr('aria-label', 'Previous Page');
	 	$('.page-numbers .next').attr('aria-label', 'Next Page');
	 	$('.page-numbers .dots').attr('aria-label', 'Ellipsis');
	 	$('.page-numbers a.page-numbers').not('.next, .prev').each(function(i) {
			var aHref = $(this).attr('href'),
				paged = aHref.match(/[0-9]*$/)[0];
		    $(this).attr('aria-label', 'Page '+paged);
		});
	 });

})( jQuery );