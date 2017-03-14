<?php
session_start();

if(!isset($_SESSION['status']))
{
	//die ("<script>window.location.assign('../../index.php?errno=restricted');</script>");
}

<<<<<<< HEAD
if(!isset($_POST['newPass']))
=======
if(!isset($_POST['currPass']))
>>>>>>> 4df230da413a2d596acb56813f53900ea1bae0ce
{
	die ("");															//TODO the html to return if the user trespasses
}

$conn = new mysqli("127.0.0.1","root","","codefundo");

<<<<<<< HEAD
$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."' AND password='".$_POST['newP']."'";
=======
$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."' AND password='".$_POST['currPass']."'";
>>>>>>> 4df230da413a2d596acb56813f53900ea1bae0ce

$res = $conn->query($sql);
if($res->num_rows==0)
{
	echo "You have entered the wrong password"; 															//TODO The html to return if the user entered the wrong password
}
else
{
	$conn->query("UPDATE users SET password='".$_POST['newPass']."' WHERE username='".$_SESSION['username']."'");
	if($conn->errno)
		echo "SQL query died"; 														//TODO the html to return if something has gone wrong somewhere
	else
		echo "Password has been successfully changed";														//TODO the html to return if password has been successfully changed
}

?>