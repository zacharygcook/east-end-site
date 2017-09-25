jQuery(function($){

	showDesignContactFormSuccess = function() {
		console.log("Show success stuff....");
        var replacementWidth = $('#designer-contact-form').width();
        var replacementHeight = $('#designer-contact-form').height();

		$('#designer-contact-form').css({ "display": "none"});
		$('#designer-contact-form-success-div').css({ "display": "block", "width": replacementWidth, "height": replacementHeight });
	}

    var designContactForm = $('#designer-contact-form');

    designContactForm.submit(function (e) {

    	console.log("Hitting submit");

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