function transition(){
	$(window).scroll(function(){
		 var h = window.innerHeight;
		 if (($(window).scrollTop() > 1) && ($(window).scrollTop() <10 )) {
		 	anime_slide();
		 	$('html, body').animate({
                    scrollTop: $("#div1").offset().top
                }, 2000);
		 }
	});
}

function anime_slide(){
	$("#mainnav").animate({
		width: "0px",
		opacity: 1,
		}, 1500 );
	$("#framed").animate({
		width: "0px",
		opacity: 1,
		}, 1500 );

}
$(document).ready(function() {
transition();
$("#mynav").click(function() {
alert("Hello world!");

});
});

