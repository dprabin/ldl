function get_location () {
	var location = jQuery('#book_location').html();

	return location + ', CA';
}

jQuery(document).ready(function() {
	var tour_location = get_location();

	jQuery('#book_map').gMap({
		zoom: 5,
		address: book_location,
		markers: [{ address: book_location }]
	});
});