//=========================
// Totally custom lightbox 
//=========================
function showDetails(detailsTitle) {
	$('#' + detailsTitle).fadeIn(500, function() {
	});
}

function hideDetails(detailsTitle) {
	$('#' + detailsTitle).fadeOut(500, function() {
		$("body").css("overflow", "visible");
	});
}
