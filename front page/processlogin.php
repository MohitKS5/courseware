<?php
//TODO add sql injection prevention
//Prelims
session_start();

//If user trespasses
if(!isset($_POST['username']) || !isset($_POST['password']))
{
	echo "<script>window.location.assign('login.php?errno=restricted');</script>";
	die;
}

//If an user is logged in, but logs in again
if(isset($_SESSION['status']) && strcmp($_SESSION['status'],"logged-in"))
{
	//Destroy the previous session and continue
	session_unset();
	session_destroy();
	session_start();
	die;
}

//Receiving the form details

$username = $_POST['username'];
$password = $_POST['password'];

//DB operations

$conn = mysqli_connect("127.0.0.1","root","","codefundo");                      //TODO change the db name
$sql = "SELECT * FROM users WHERE username='".$username."' AND password=".$password."'";

$res = $conn->query($sql);

if($res->num_rows!=1)
{
	echo "<script>window.location.assign('login.php?errno=userpass');</script>";
	die;
}
else
{
	//Set the session variables
	$_SESSION['status'] = "logged-in";
	$_SESSION['username']=$username;
	echo "<script>window.location.assign('dashboard.php');</script>";
	die;
}


?>