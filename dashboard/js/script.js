var count=0;
var count1=0;
var count2=0;


/*---------------onscroll animation---------------------*/
/*sec1 to sec 2 and reverse*/
function transition(){
	$(window).scroll(function(){
		 var h = window.innerHeight;
		 var h1= $("#sec2").offset().top;
	
		 if ($(window).scrollTop() <1) {count=0;
		 }else if (($(window).scrollTop() > 1)&&(($(window).scrollTop() < 10))&&(count==0)) {
		    anime_slide();
		    count=10;
		 	$('html, body').animate({scrollTop: $("#sec2").offset().top}, 1000);
		 	$("#sec2").animate({opacity:0},0);
		 	$("#sec2").animate({opacity:1},1500);
		 }else if ($(window).scrollTop() >h1-1) {count=2;
		 }else  if (($(window).scrollTop() > (h-100))&&(($(window).scrollTop()< h))&&(count==2)) {
		 	back_slide();
		 	count=10;
		 	$('html, body').animate({scrollTop: $("#sec1").offset().top},1000);
		 	$("#sec2").animate({opacity:1},0);
		 	$("#sec2").animate({opacity:0},500);

		 }

		
	});
}
/*sec2 to sec 3 and reverse*/
function transition2(){
	$(window).scroll(function(){
		
		 var h1= $("#sec2").offset().top;
		 var h2= $("#sec3").offset().top;
	
		if ($(window).scrollTop() <h1+1) {count1=0;
		 }else if (($(window).scrollTop() > h1+1)&&(($(window).scrollTop() < h1+100))&&(count1==0)) {
		  	count1=10;
		 	$('html, body').animate({scrollTop: $("#sec3").offset().top}, 1000);
		 	$("#sec3").animate({opacity:0},0);
		 	$("#sec3").animate({opacity:1},1500);
		 }else if ($(window).scrollTop() >h2-1) {count1=2;
		 }else  if (($(window).scrollTop() > h1+100)&&(($(window).scrollTop()< h2))&&(count1==2)) {
		 	count1=10;
		 	$('html, body').animate({scrollTop: $("#sec2").offset().top},1000);
		 	$("#sec3").animate({opacity:1},0);
		 	$("#sec3").animate({opacity:0},500);

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
		}, 1000);
	$("#framed").animate({
		
		width: "79vw",
		opacity: 1,
		}, 1000);

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
//transition();
//transition2();
showall();
$("#top").click(function() {
alert(count);});
$("#sec3").click(function() {
alert("ans="+(($(window).scrollTop()) >($("#sec2").offset().top+10))+"&&"+(($(window).scrollTop())< ($("#sec3").offset().top-100))+"&&"+(count1==2));

//alert($(window).scrollTop()-($("#sec3").offset().top-200));

		
});
});
