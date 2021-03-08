


/* ---------- JAVASCRIPT LOADING ---------- */

$(document).ready(function() {
	$(window).on('beforeunload', function() {
		showLoading(true);
	});


	showLoading(false);
});


//MOSTRA OU OCULTA O LOADING
function showLoading(state) {
	if (state) {
		$('div.loading').addClass('active');
	}

	else {
		$('div.loading').removeClass('active');
	}
}
