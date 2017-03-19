<?php
session_start();
if(!isset($_SESSION['status']))
{
	//header('location: ../index.php?err=restricted');
	die;
}

    $conn = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","b7603cbccbf2d5","49d472d0","codefundo");
$sql = "SELECT * FROM courses WHERE institute_id=".$_SESSION['instituteid']." AND semester=".$_SESSION['currsem'];

?>
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
<title>Code Buddy</title>
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai:500%7CFredoka+One%7CPompiere%7CSource+Code+Pro" rel="stylesheet">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/background_transitions.css" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" type="text/css" href="../css/forms.css">
 <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<script>
    function scrollto(TO){
      alert(TO);
      $('html, body').animate({
            'scrollTop' : $($(TO)).position().top,
        });
    }
  </script>
  
  <style type="text/css">
 		html{
 			font-size: 15px !important;
 		} 	
  </style>

</head>

<body>
<div id="courseenquiry">
	<div id="queryPane">
	Semester
			<select name="sem" id="sem" onmouseup="loadCourses()" >
			<option value="1" <?php if($_SESSION['currsem']==1) echo "selected"; ?>>First</option>
			<option value="2" <?php if($_SESSION['currsem']==2) echo "selected"; ?>>Second</option>
			<option value="3" <?php if($_SESSION['currsem']==3) echo "selected"; ?>>Third</option>
			<option value="4" <?php if($_SESSION['currsem']==4) echo "selected"; ?>>Fourth</option>
			<option value="5" <?php if($_SESSION['currsem']==5) echo "selected"; ?>>Fifth</option>
			<option value="6" <?php if($_SESSION['currsem']==6) echo "selected"; ?>>Sixth</option>
			<option value="7" <?php if($_SESSION['currsem']==7) echo "selected"; ?>>Seventh</option>
			<option value="8" <?php if($_SESSION['currsem']==8) echo "selected"; ?>>Eighth</option>
		</select><br>
		Course
	
		<select multiple="" name="course" id="course" onmouseup="loadDetails()">

		</select>
	</div>

	
	<section id="contentPane">
         
        </section>
	
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script>
	var xmlhttp = new XMLHttpRequest();
	var len;
	$(document).ready(function(){
		loadCourses();

	});
	function loadCourses() {
		xmlhttp.onreadystatechange = function() {
			if(this.status===200 && this.readyState===4) {
				$("#course").html(this.responseText);
					getlen();
				loadDetails();
			}
		};
		var sem = document.getElementById("sem").value;
		xmlhttp.open("GET","enq.php?sem="+sem+"&q=listCourses",true);
		xmlhttp.send();
	}
	
	function getlen(){
		len = $("#course").children().length+1;
		console.log(len);
		$("#course").css("height",2*len+"rem");
	}
	
	function loadDetails() {
		xmlhttp.onreadystatechange = function() {
			if(this.status===200 && this.readyState===4) {
				$("#contentPane").html(this.responseText);
			}
		};
		var c = document.getElementById("course").value;
		xmlhttp.open("GET","enq.php?course="+c+"&q=courseEnq",true);
		xmlhttp.send();
	}
	function addrem(cid, add) {
		var req = new XMLHttpRequest();
		req.onreadystatechange = function() {
			if(this.status===200 && this.readyState===4) {
				alert(this.responseText);
				loadDetails();
			}
		};
		req.open("GET","addrem.php?course_id="+cid+"&add="+add,true);
		req.send();

	}
	</script>
</div>

</body>
</html>