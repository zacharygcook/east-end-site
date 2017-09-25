$(function() {

  // Selectively apply hover

  $(".img-container").hover(function() {
    if ($(this).css("position") == "relative") {
      $(this).find("div").css({ "transform": "scale(1.08)", "transition": "transform cubic-bezier(0.4, 0, 0.2, 1) 450ms"})
    }
  });

  $(".img-container").mouseout(function () {
    if ($(this).css("position") == "relative") {
      $(this).find("div").css({ "transform": "scale(1)", "transition": "transform cubic-bezier(0.4, 0, 0.2, 1) 450ms"})
    }
  });

  $(".img-container").click(function() {
    if ($(this).css("position") == "relative") {
     
      $(this).attr('id', 'active-img-container');

      // If larger than mobile
      if ($(window).width() > 767) {
        $(this).css({"padding-top": "135px"});
        $(this).parent().prepend("<div id='replace-missing-container-div'></div>");
        // Change the image's styling
        var newImgHeight = $(window).height() * 0.7;
        $(this).find("img").css({ "height": newImgHeight, "width": "auto", "position": "relative"});
      }

      // If mobile
      if ($(window).width() < 768) {
        $(this).css({"padding-top": "100px"});
        $(this).parent().prepend("<div id='replace-missing-container-div'></div>");
        // Change the image's styling
        var newImgWidth = $(window).width() * 0.8;
        $(this).find("img").css({ "width": newImgWidth, "height": "auto", "position": "relative"});
      }

    } else {
      $(this).attr('id', '');
      $(this).css({"transform": "none !important", "padding-top": "0"});
      $(this).find("img").css({ "height": "auto", "width": "100%", "position": "absolute"});
      $(this).parent().parent().find("#replace-missing-container-div").remove();
    }
    
  });  
});