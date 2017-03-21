<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('location: ../index.php?err=restricted');
	die;
}
function get_course_name($id) {
    $conn = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","b7603cbccbf2d5","49d472d0","codefundo");
	$sql="SELECT * FROM courses where course_id=".$id;
	$row = $conn->query($sql)->fetch_array();
	$conn->close();
	return $row['course_name'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="mycourse.php" method="post">
<?php
    $conn = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","b7603cbccbf2d5","49d472d0","codefundo");
		$sql="SELECT * FROM addedcourses where userid=".$_SESSION['userid'];
		$res = $conn->query($sql);
		$row=$res->fetch_array(MYSQL_ASSOC);
		echo "<div><input type='radio'  value=".$row['course_id']." name='course_id' checked>".get_course_name($row['course_id'])."</div>";
		while(($row=$res->fetch_array(MYSQL_ASSOC)))
		{
			echo "<div><input type='radio' value=".$row['course_id']." name='course_id'>".get_course_name($row['course_id'])."</div>";
		}
		$conn->close();
?>
<input type="submit">
</form>
</body>
</html>