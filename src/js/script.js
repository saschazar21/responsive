var resp = resp || {};

resp.main = (function($) {
  var init,
      entryHide,
      entryFader,
      googleHover;
  
  entryHide = function(entry) {
    $.each(entry, function(key, val) {
      $(val).hide();
    });
    entryFader(entry[0]);
  }
  
  entryFader = function(entry) {
    if (entry) {
      $(entry).fadeIn(300, function() {
        entryFader($(this).next(".entry"));
      });
    }
  }
  
  buttonShadow = function(handler) {
    var color = $(this).css("background-color");
    var boxShadow = $(this).css("box-shadow");
    $(this).animate({
      boxShadow: "0 0 20px" + color
    }, "fast");
    $(this).mouseleave(function() {
      $(this).animate({
        boxShadow: boxShadow
      }, "fast");
    });
  }
  
  init = function() {
    var entry = $("div.row.entry");
    var buttons = $(".shadow-animate");
    
    entryHide(entry);
    
    $.each(buttons, function(key, val) {
      $(val).mouseenter(buttonShadow);
    });
  }
  
  $(document).ready(init);
})($);