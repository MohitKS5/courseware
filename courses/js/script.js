$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".smoothscroll").on('click', function(event) {
        if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
  $('html, body').animate({
        scrollTop: $(hash).offset().top}, 800, function(){window.location.hash = hash;
      });
    } // End if
  });
});