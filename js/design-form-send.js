jQuery(function($){

	$('#captcha-error').css({ "display": "none" });
	$('#design-page-captcha').css({ "display": "none" });

	$('#designer-contact-form').on('change', '#email', function () {
		console.log("Detected change in email value!");
		$('#design-page-captcha').css({ "display": "block" });
	});

	showDesignContactFormSuccess = function() {
		var replacementWidth = $('#designer-contact-form').width();
		var replacementHeight = $('#designer-contact-form').height();

		$('#designer-contact-form').css({ "display": "none"});
		$('#designer-contact-form-success-div').css({ "display": "block", "width": replacementWidth, "height": replacementHeight });
	}

	var designContactForm = $('#designer-contact-form');

	designContactForm.submit(function (e) {

		$('#captcha-error').css({ "display": "none" });
		console.log("Design form submit");

		var captchaResponse = grecaptcha.getResponse();
		console.log("Captcha Response: ", captchaResponse);

		if (captchaResponse.length == 0) {
			console.log("User did not verify they aren't a bot or they are a bot!!!");
			$('#captcha-error').css({ "display": "block" });
			return false;
		}

		e.preventDefault();

		$.ajax({
			type: designContactForm.attr('method'),
			url: designContactForm.attr('action'),
			data: designContactForm.serialize(),
			success: function (data) {
				console.log('SUCCESS');
				console.log(data);
				showDesignContactFormSuccess();
			},
			error: function (data) {
				console.log('An error occurred.');
				console.log(data);
			},
		});
	});
});