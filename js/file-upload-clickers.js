$(document).ready(function(){

	$("#uploadBlockOneSuccess").hide();
	$("#uploadBlockTwoSuccess").hide();
	$("#uploadBlockThreeSuccess").hide();
	$("#uploadBlockFourSuccess").hide();

	$('#designLocationOneFileClickerButton').click(function() {
		$('#designLocationOneUpload').click();
	});

	$('#designLocationTwoFileClickerButton').click(function() {
		$('#designLocationTwoUpload').click();
	});

	$('#designIdeaOneFileClickerButton').click(function() {
		$('#designIdeaOneUpload').click();
	});

	$('#designIdeaTwoFileClickerButton').click(function() {
		$('#designIdeaTwoUpload').click();
	});

	$('#uploadBlockOne').change(function () {
		console.log("There was a change.");

		if ($("#designLocationOneUpload").val().length >= 2) {
			// you have a file
			console.log("Has a file uploaded!");
			$("#uploadBlockOneSuccess").show();
			$('#designLocationOneFileClickerButton').css({backgroundColor: "black", color: "white"});
		} else {
			console.log("Has no file uploaded.");
			$('#designLocationOneFileClickerButton').css({backgroundColor: "#080808", color: "#e5e5e5"});
			$("#uploadBlockOneSuccess").hide();
		}
	});

	$('#uploadBlockTwo').change(function () {
		console.log("There was a change.");

		if ($("#designLocationTwoUpload").val().length >= 2) {
			// you have a file
			console.log("Has a file uploaded!");
			$("#uploadBlockTwoSuccess").show();
			$('#designLocationTwoFileClickerButton').css({backgroundColor: "black", color: "white"});
		} else {
			console.log("Has no file uploaded.");
			$("#uploadBlockTwoSuccess").hide();
			$('#designLocationTwoFileClickerButton').css({backgroundColor: "#080808", color: "#e5e5e5"});
		}
	});

	$('#uploadBlockThree').change(function () {
		console.log("There was a change.");

		if ($("#designIdeaOneUpload").val().length >= 2) {
			// you have a file
			console.log("Has a file uploaded!");
			$("#uploadBlockThreeSuccess").show();
			$('#designIdeaOneFileClickerButton').css({backgroundColor: "black", color: "white"});
		} else {
			console.log("Has no file uploaded.");
			$("#uploadBlockTwoSuccess").hide();
			$('#designIdeaOneFileClickerButton').css({backgroundColor: "#080808", color: "#e5e5e5"});
		}
	});

	$('#uploadBlockFour').change(function () {
		console.log("There was a change.");

		if ($("#designIdeaTwoUpload").val().length >= 2) {
			// you have a file
			console.log("Has a file uploaded!");
			$("#uploadBlockFourSuccess").show();
			$('#designIdeaTwoFileClickerButton').css({backgroundColor: "black", color: "white"});
		} else {
			console.log("Has no file uploaded.");
			$("#uploadBlockFourSuccess").hide();
			$('#designIdeaTwoFileClickerButton').css({backgroundColor: "#080808", color: "#e5e5e5"});
		}
	});

});