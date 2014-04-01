jQuery(document).ready(function() {
	jQuery('#book_favorite').click(function() {
		if (jQuery(this).attr('rel') == 'no') {
			jQuery('#book_favorite').removeClass('favorite_inactive')
			.addClass('favorite_active').attr('rel', 'yes');
		} else {
			jQuery('#book_favorite').removeClass('favorite_active')
			.addClass('favorite_inactive').attr('rel', 'no');
		};
	});
});
