jQuery(function($){

	$('#captcha-error').css({ "display": "none" });

	showHomeContactFormSuccess = function() {
		var replacementWidth = $('#fancy-home-contact-form').width();
		var replacementHeight = $('#fancy-home-contact-form').height();

		$('#fancy-home-contact-form').css({ "display": "none"});
		$('#fancy-home-contact-form-success-div').css({ "display": "block", "width": replacementWidth, "height": replacementHeight });
	}

	var homeContactForm = $('#fancy-home-contact-form');

	homeContactForm.submit(function (e) {

		$('#captcha-error').css({ "display": "none" });
		console.log("Hitting submit");

		var captchaResponse = grecaptcha.getResponse();
		console.log("Captcha Response: ", captchaResponse);

		if (captchaResponse.length == 0) {
			console.log("User did not verify they aren't a bot or they are a bot!!!");
			$('#captcha-error').css({ "display": "block" });
			return false;
		}

		e.preventDefault();

		$.ajax({
			type: homeContactForm.attr('method'),
			url: homeContactForm.attr('action'),
			data: homeContactForm.serialize(),
			success: function (data) {
				console.log('SUCCESS');
				console.log(data);
				showHomeContactFormSuccess();
			},
			error: function (data) {
				console.log('An error occurred.');
				console.log(data);
			},
		});
	});
});