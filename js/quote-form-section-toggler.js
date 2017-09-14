jQuery(function($){
		// Hide Sections on Page Load
		$('#know-what-they-want-on-design').hide();
		$('#dont-know-what-they-want-on-design').hide();
		$('#picking-order-up').hide();
		$('#getting-order-shipped').hide();

		$('#sureOfDesignButton').click(function() {
			console.log("Trying to toggle!");
			$('#dont-know-what-they-want-on-design').hide();
			$('#notSureDesignButton').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#sureOfDesignButton').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#know-what-they-want-on-design').toggle('1400', "swing", function () {});
		});

		$('#notSureDesignButton').click(function() {
			console.log("Trying to toggle!");
			$('#know-what-they-want-on-design').hide();
			$('#sureOfDesignButton').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#notSureDesignButton').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#dont-know-what-they-want-on-design').toggle('1400', "swing", function () {});
		});

		$('#picking-up-btn').click(function() {
			console.log("Trying to toggle!");
			$('#getting-order-shipped').hide();
			$('#getting-shipped-btn').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#picking-up-btn').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#picking-order-up').toggle('1400', "swing", function () {});
		});

		$('#getting-shipped-btn').click(function() {
			console.log("Trying to toggle!");
			$('#picking-order-up').hide();
			$('#picking-up-btn').css({backgroundColor: "#080808", color: "#dbdbdb", fontSize: "16px"});
			$('#getting-shipped-btn').css({backgroundColor: "black", color: "white", fontSize: "20px"});
			$('#getting-order-shipped').toggle('1400', "swing", function () {});
		});
});