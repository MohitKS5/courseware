var iitk="Indian Institute of Technology, Kanpur";//change to select institute_name

//AUTHOR Mohit


function Navbar() {

  // Setup hidden navbar and black overlay
  $(window).scroll(function() {
    var h = window.innerHeight;
     var val=($(window).scrollTop())/h;
      $(".intro").css({'background-color':'rgba(0,0,0,'+val*val/1.5+')'});
      
        if ($(window).scrollTop() > h / 3.6) {
      $('.dissolve').addClass("scrolled");
    } else if ($(window).scrollTop() < h / 3.6) {
      $('.dissolve').removeClass("scrolled");
    }
  });
}




function Fullscreen(){
  var height = $(window).height();
  var eheight= $(this).height();
  $(".fullscreen").height(height);
  $(".padcenter").css("padding-top",(height/2)-300);

}


$(".tab-content").hide();
  $(".tab-content").first().show();

  $("ul.tabs2 li").click(function () {
     $("ul.tabs2 li").removeClass("active");
     $(this).addClass("active");
     $(".tab-content").hide();
     var activeTab = $(this).attr("data-id");
     $("#" + activeTab).fadeIn(700);
  });





$(".user").focusin(function(){
  $(".inputUserIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputUserIcon").css("color", "white");
});

$(".pass").focusin(function(){
  $(".inputPassIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputPassIcon").css("color", "white");
});



  $('.smoothscroll').on('click', function (e) {
    
    e.preventDefault();

    var target = this.hash,
      $target = $(target);

      $('html, body').stop().animate({
        'scrollTop': $target.offset().top
      }, 800, 'swing', function () {
        window.location.hash = target;
      });

  });

  function Sidebar(){
    var w=$(window).width();
     var h = $(window).height();
  if (h>700 && w>700) {
        $("#mobile1").remove();
      }
  }
function chng_holder(){
$("#institute_name").change(function() {
         var str;
    $( "#institute_name option:selected" ).each(function() {
      str = $( this ).text();
    });
       
        
      if(str===iitk){
        $("#usrnm").attr("placeholder","enter IITK username");
      }
  });
};


function openNav() {
	document.getElementById("mysidenav").style.width = "10.5rem";
}


function closeNav() {
    document.getElementById("mysidenav").style.width = "0";
}

$(document).ready(function() {
  Navbar();
  Fullscreen();
  Sidebar();
  chng_holder();
    rembar();
    // Setup Materialize
 
  $('.parallax').parallax();
  $(".button-collapse").sideNav();

 

});
