jQuery(function($){
		// Hide Sections on Page Load
		// $('#know-what-they-want-on-design').hide();
		// $('#dont-know-what-they-want-on-design').hide();
		$('#picking-order-up').hide();
		$('#getting-order-shipped').hide();

		var clearUnsureDesignFields = function () {
			document.getElementById('designIdeaNotesTextArea').value = "";
		}

		var clearSureOfDesignFields = function () {
			document.getElementById('decorationLocationOne').value = "";
			document.getElementById('numberColorsLocationOne').value = "";
			document.getElementById('decorationLocationTwo').value = "";
			document.getElementById('numberColorsLocationTwo').value = "";
		}

		var clearShippingInformationFields = function () {
			document.getElementById('deliveryAddress').value = "";
			document.getElementById('deliveryCity').value = "";
			document.getElementById('deliveryState').value = "";
			document.getElementById('deliveryZip').value = "";
		}

		$('#sureOfDesignButton').click(function() {
			document.getElementById('knowWhatDesignOrNot').value = 'yes';
			$('#pleaseSelectDesignOption').hide();

			$('#designIdeaNotesTextArea').rules("remove");
			$('#decorationLocationOne').rules("add", { required: true });

			$('#dont-know-what-they-want-on-design').hide();
			$('#notSureDesignButton').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#sureOfDesignButton').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#know-what-they-want-on-design').toggle('1400', "swing", function () {});

			clearUnsureDesignFields();
		});

		$('#notSureDesignButton').click(function() {
			document.getElementById('knowWhatDesignOrNot').value = 'no';
			$('#pleaseSelectDesignOption').hide();

			$('#designIdeaNotesTextArea').rules("add", { required: true });
			$('#decorationLocationOne').rules("remove");

			$('#know-what-they-want-on-design').hide();
			$('#sureOfDesignButton').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#notSureDesignButton').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#dont-know-what-they-want-on-design').toggle('1400', "swing", function () {});

			clearSureOfDesignFields();
		});

		$('#picking-up-btn').click(function() {
			document.getElementById('pickingUpOrShipping').value = 'picking-up';
			$('#pleaseSelectShippingOption').hide();

			$('#deliveryAddress').rules("remove");
			$('#deliveryCity').rules("remove");
			$('#deliveryState').rules("remove");
			$('#deliveryZip').rules("remove");

			$('#getting-order-shipped').hide();
			$('#getting-shipped-btn').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#picking-up-btn').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#picking-order-up').toggle('1400', "swing", function () {});

			clearShippingInformationFields();
		});

		$('#getting-shipped-btn').click(function() {
			document.getElementById('pickingUpOrShipping').value = 'shipping';
			$('#pleaseSelectShippingOption').hide();

			$('#deliveryAddress').rules("add", { required: true });
			$('#deliveryCity').rules("add", { required: true });
			$('#deliveryState').rules("add", { required: true });
			$('#deliveryZip').rules("add", { required: true });

			$('#picking-order-up').hide();
			$('#picking-up-btn').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#getting-shipped-btn').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#getting-order-shipped').toggle('1400', "swing", function () {});
		});
});