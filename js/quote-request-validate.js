jQuery(function($){
	$('#pleaseSelectShippingOption').hide();
	$('#pleaseSelectDesignOption').hide();


	$("#quote-request-form").validate({
		debug: true,
		rules: {
			phoneNumber: {
				required: true,
				phoneUS: true
			}
		},
		submitHandler: function (form) {
			// Run some more checks
			$('#pleaseSelectShippingOption').hide();
			$('#pleaseSelectDesignOption').hide();

			if ($('#pickingUpOrShipping').val() == "") {
				console.log("We've got a huge problem with picking up or shipping options gang!!");
				$('#pleaseSelectShippingOption').toggle();
				return;
			}

			if ($('#knowWhatDesignOrNot').val() == "") {
				console.log("We've got a problem with design options gang!!!");
				$('#pleaseSelectDesignOption').toggle();
				return;
			}

			form.submit();
		}

	});

});