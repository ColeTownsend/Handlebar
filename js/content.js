//=========================
// Oh so sexy loading 
//=========================
$(window).load(function(){
	$('.loading').fadeOut(1200, function() {
		$("body").css("overflow", "visible");
	});

	//Fixes issues of sidebar being too short
	if ($(".side").height() < $(".floats").height()) {
		$(".side").height($(".floats").height());
	}

	$(".toTop").click(function() {
  		$("html, body").animate({ scrollTop: 0 }, "slow");
  		return false;
	});

	//Check if need up arrow on page load
	var scrollDist = $("body").scrollTop();
  	if (scrollDist > 100) {
  		$(".toTop").fadeIn(1000, function() {
		});
  	} else {
		$(".toTop").fadeOut(1000, function() {
		});
  	}
});

//=========================
// Custom to-top script
//=========================
$(window).scroll(function() {
  	var scrollDist = $("body").scrollTop();
  	if (scrollDist > 100) {
  		$(".toTop").fadeIn(500, function() {
		});
  	} else {
		$(".toTop").fadeOut(500, function() {
		});
  	}
});