$(document).ready(function(){

	var windowHeight = $(window).height();
	var newHeight = windowHeight;
	$('#splash-wrapper').css("height", newHeight);

	$(window).on('resize', function() {
		console.log("Browser got resized");

		console.log("Window height: ", $(window).height());
		console.log("Window width: ", $(window).width());
		var windowHeight = $(window).height();
		var newHeight = windowHeight;
		console.log("Now setting height to: ", newHeight);
		$('#splash-wrapper').css("height", newHeight);
	});

});