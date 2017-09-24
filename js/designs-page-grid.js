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
      $(this).css({"transform": "none !important"});

    } else {
      $(this).attr('id', '');
    }
    
  });  
});