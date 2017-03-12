var count=0;
/*---------------onscroll animation---------------------*/
function transition(){
	$(window).scroll(function(){
		 var h = window.innerHeight;
		
		 if ($(window).scrollTop() <1) {count=0;
		 }else if (($(window).scrollTop() > 1)&&(($(window).scrollTop() < 10))&&(count==0)) {
		    anime_slide();
		    count=10;
		 	$('html, body').animate({scrollTop: $("#sec2").offset().top}, 1000);
		 	$("#sec2").animate({opacity:0},0);
		 	$("#sec2").animate({opacity:1},1500);
		 }else if ($(window).scrollTop() >h) {count=2;
		 }else  if (($(window).scrollTop() > h-100)&&(($(window).scrollTop() < h+50))&&(count==2)) {
		 	back_slide();
		 	count=10;
		 	$('html, body').animate({scrollTop: $("#sec1").offset().top},1000);
		 	$("#sec2").animate({opacity:1},0);
		 	$("#sec2").animate({opacity:0},500);

		 }


	});
}

function showall(){
	
	$("#menu").click(function(){
		$("#sec1").animate({opacity:1},0);
		$("#sec2").animate({opacity:1},0);
		$("#sec3").animate({opacity:1},0);
		$("#sec4").animate({opacity:1},0);
	});
}

function back_slide(){
	$("#mainnav").animate({
		width: "0px",
		opacity: 0,
		}, 0);
	$("#framed").animate({
		
		width: "0px",
		opacity: 0,
		}, 0);
	$("#mainnav").animate({
		width: "20vw",
		opacity: 1,
		}, 1500);
	$("#framed").animate({
		
		width: "79vw",
		opacity: 1,
		}, 1500);

}

function anime_slide(){
	$("#mainnav").animate({
		width: "20vw",
		opacity: 1,
		}, 0);
	$("#framed").animate({
		
		width: "79vw",
		opacity: 1,
		}, 0);
	$("#mainnav").animate({
		width: "0px",
		opacity: 0,
		}, 1000);
	$("#framed").animate({
		
		width: "0px",
		opacity: 0,
		}, 1000);

}


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

$(document).ready(function() {
transition();
showall();
$("#top").click(function() {
alert(count);});
$("#div1").click(function() {
alert(count);
});
});
