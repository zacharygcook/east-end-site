$(document).ready(function(){

	$(window).on('resize', function() {
		console.log("Browser got resized");


		// Set height of splash page
		console.log("Window height: ", $(window).height());
		console.log("Window width: ", $(window).width());
		var windowHeight = $(window).height();
		var newHeight = windowHeight - 80;
		console.log("Now setting height to: ", newHeight);
		$('#splash-wrapper').css("height", newHeight);
	});

});