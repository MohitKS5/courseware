<?php
session_start();
if(!isset($_SESSION['status']))
{
	//header('location: ../index.php?err=restricted');
	die;
}

$conn = new mysqli("127.0.0.1","root","","codefundo");
$sql = "SELECT * FROM courses WHERE institute_id=".$_SESSION['instituteid']." AND semester=".$_SESSION['currsem'];

?>
<DOCTYPE html>
<html>
<head></head>

<body>
<div id="courseenquiry">
	<div id="queryPane">
		Semester: <select name="sem" id="sem" onmouseup="loadCourses()">
			<option value="1" <?php if($_SESSION['currsem']==1) echo "selected"; ?>>First</option>
			<option value="2" <?php if($_SESSION['currsem']==2) echo "selected"; ?>>Second</option>
			<option value="3" <?php if($_SESSION['currsem']==3) echo "selected"; ?>>Third</option>
			<option value="4" <?php if($_SESSION['currsem']==4) echo "selected"; ?>>Fourth</option>
			<option value="5" <?php if($_SESSION['currsem']==5) echo "selected"; ?>>Fifth</option>
			<option value="6" <?php if($_SESSION['currsem']==6) echo "selected"; ?>>Sixth</option>
			<option value="7" <?php if($_SESSION['currsem']==7) echo "selected"; ?>>Seventh</option>
			<option value="8" <?php if($_SESSION['currsem']==8) echo "selected"; ?>>Eighth</option>
		</select><br>

		Course selected:
		<select name="course" id="course" onmouseup="loadDetails()">

		</select>
	</div>
	<div id="contentPane">
	</div>
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script>
	var xmlhttp = new XMLHttpRequest();

	$(document).ready(function(){
		loadCourses();

	});
	function loadCourses() {
		xmlhttp.onreadystatechange = function() {
			if(this.status===200 && this.readyState===4) {
				$("#course").html(this.responseText);
				loadDetails();
			}
		};
		var sem = document.getElementById("sem").value;
		xmlhttp.open("GET","enq.php?sem="+sem+"&q=listCourses",true);
		xmlhttp.send();
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