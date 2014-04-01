jQuery(document).ready(function() {

	function change_state (state) {
		jQuery.post('index.php', {
			option: 'com_diglib',
			task: 'favorites.' + state,
			format: 'json',
			type: jQuery('#type').attr('val'),
			id: jQuery('#type').attr('rel'),
			tmpl: 'raw'
		}, function(response){
			if (response.state == 'favorite') {
				jQuery('#favorite').removeClass('favorite_inactive')
				.addClass('favorite_active').attr('rel', 'yes');
			} else {
				jQuery('#favorite').removeClass('favorite_active')
				.addClass('favorite_inactive').attr('rel', 'no');
			};
		});
	}

	jQuery('#favorite').click(function() {
		if (jQuery(this).attr('rel') == 'no') {
			change_state('favorite');
		} else {
			change_state('unfavorite');
		};
	});
});
