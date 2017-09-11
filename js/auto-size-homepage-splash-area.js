$(document).ready(function(){

	if ($(window).height() > 800) {
		var windowHeight = $(window).height();
		var newHeight = windowHeight;
		$('#splash-wrapper').css("height", newHeight);		
	} else {
		console.log("Too small for automatic splash page resizing.");
	}
	

	$(window).on('resize', function() {
		console.log("Browser got resized");

		if ($(window).height() > 800) {
			// Set height of splash page
			console.log("Window height: ", $(window).height());
			console.log("Window width: ", $(window).width());
			var windowHeight = $(window).height();
			var newHeight = windowHeight;
			console.log("Now setting height to: ", newHeight);
			$('#splash-wrapper').css("height", newHeight);	
		} else {
			console.log("Too small for automatic splash page resizing.");
		}

	});

});