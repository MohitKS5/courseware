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
		 
		 }else if ($(window).scrollTop() >h) {count=2;
		 }else  if (($(window).scrollTop() > h-20)&&(($(window).scrollTop() < h+50))&&(count==2)) {
		 	back_slide();
		 	count=10;
		 	$('html, body').animate({scrollTop: $("#sec1").offset().top},1000);

		 }



	});
}


function back_slide(){
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
		width: "0px",
		opacity: 1,
		}, 1000);
	$("#framed").animate({
		
		width: "0px",
		opacity: 1,
		}, 1000);

}

$(document).ready(function() {
transition();
$("#top").click(function() {
alert(count);});
$("#div1").click(function() {
alert(count);
});
});
