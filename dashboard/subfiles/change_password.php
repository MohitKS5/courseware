<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!--Set charset-->
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Set title-->
<title>Change passwords</title>
 <script type="text/javascript" src="prototype.js"></script>
 <script type="text/javascript" src="scriptaculous.js?load=effects" ></script>
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai:500%7CFredoka+One%7CPompiere%7CSource+Code+Pro" rel="stylesheet">
  <link href="../../css/materialize.min.css" rel="stylesheet" type="text/css" media="screen,projection">
  <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen,projection">
   <link href="../../css/forms.css" type="text/css" rel="stylesheet" media="screen,projection">
   <link href="responsive.css" type="text/css" rel="stylesheet" media="screen,projection">
	<title> change passwords</title>
	<script type="text/javascript">

		function scrollto(){
			$('html, body').animate({
        		'scrollTop' : $("#chngpassform").position().top
    		});
		}
	</script>

</head>
<body style="font-family:'Arima Madurai',cursive; overflow:hidden; background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)), url('../images/books.jpg');" onload="scrollto()">
<section class="dark">
<div id="chngpassform" style="position: absolute; top:50vh; left:40vw; display: inline-block;">
<form method="post" action="cp.php" id="chng_paswrd" class="centeralign19">
<h2 style="font-size: 3rem; color: white"><span class="fa fa-lock lime-text"></span>Change Passwords</h2>
	<input type="password" id="currPass" name="currPass" placeholder="Your current password">
	<input type="password" id="newPass" name="newPass" placeholder="Your new password" class="INLINE"><span id="newPassInfo" class="INLINE" ></span>
	<input type="password" id="newPassAgain" placeholder="Your new password again" class="INLINE"><span id="newPassAgainInfo" class="INLINE"></span>
	<input type="submit" id="submit" class="submit1">
</form>
</div>
</section>

<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
	var MIN_PASSWORD_LENGTH = 8;
	var submit = $("#submit");
	submit.attr("disabled","disabled");
	$("#newPass").keyup(function() {
		console.log($("#newPass").val().length);
		if($("#newPass").val().length < MIN_PASSWORD_LENGTH) {
			$("#newPassInfo").text("Required"+MIN_PASSWORD_LENGTH+"!");
		} else {
			$("#newPassInfo").text("");
		}
	});

	$("#newPassAgain").keyup(function() {
		var np = $("#newPass").val();
		var npa = $("#newPassAgain").val();
		if(npa.length<np.length) {
			$("#newPassAgainInfo").text("");
			submit.attr("disabled","disabled");
		} else {
			if(npa === np)
			{
				$("#newPassAgainInfo").text("");
				submit.removeAttr("disabled");
			}
			else
			{
				$("#newPassAgainInfo").text("Pass Dont Match!");
				submit.attr("disabled","disabled");
			}
		}
	});
</script>
</body>
</html>