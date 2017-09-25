jQuery(function($){
	$('#contact-us-dropdown-activate').click(function() {

		if ($('#contact-us-form-nav-dropdown').css("display") == "none") {
			var windowHeight = $(window).height();
			var newHeight = windowHeight;
			$('#contact-us-form-nav-dropdown').css({"display": "block", "height": newHeight});
			$('#dropdown-contact-form').css({"display": "block"});
			$('#body').css({"overflow-y": "hidden"});
		} else {
			console.log("Got an else...");
			$('#contact-us-form-nav-dropdown').css({"display": "none"});
			$('#dropdown-contact-form').css({"display": "none"});
			$('#body').css({"overflow-y": "scroll"});
		}
		
	});

	showSuccessStuff = function() {
		$('#contact-us-form-nav-dropdown').css({"display": "none"});
		$('#dropdown-contact-form').css({"display": "none"});
		$('#body').css({"overflow-y": "scroll"});
		$('#contactSuccessModal').modal({ show: true });
	}

	var contactForm = $('#dropdown-contact-form');

    contactForm.submit(function (e) {

    	console.log("Hitting submit");

        e.preventDefault();

        $.ajax({
            type: contactForm.attr('method'),
            url: contactForm.attr('action'),
            data: contactForm.serialize(),
            success: function (data) {
                console.log('SUCCESS');
                console.log(data);
                showSuccessStuff();
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });

});