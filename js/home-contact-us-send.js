jQuery(function($){

	showSuccessStuff = function() {
		console.log("Show success stuff....");
		$('#fancy-home-contact-form').css({ "display": "none"});
		$('#fancy-home-contact-form-success-div').css({ "display": "block", "width": replacementWidth, "height": replacementHeight });
	}

	var homeContactForm = $('#fancy-home-contact-form');

    homeContactForm.submit(function (e) {

    	console.log("Hitting submit");

        e.preventDefault();

        $.ajax({
            type: homeContactForm.attr('method'),
            url: homeContactForm.attr('action'),
            data: homeContactForm.serialize(),
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