<?php
//TODO add sql injection prevention
//Prelims
session_start();

//If user trespasses
if(!isset($_POST['username']) || !isset($_POST['password']))
{
	echo "restricted";
	echo "<script>window.location.assign('processlogin.php?errno=restricted');</script>";
	die;
}

//If an user is logged in, but logs in again
if(isset($_SESSION['status']) && strcmp($_SESSION['status'],"logged-in")==0)
{
	//Destroy the previous session and continue
	echo "Already logged in";
	session_unset();
	session_destroy();
	session_start();
}

//Receiving the form details

$username = $_POST['username'];
$password = $_POST['password'];

//DB operations

$conn = mysqli_connect("127.0.0.1","root","","codefundo");
$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";

$res = $conn->query($sql);

if($res->num_rows!=1)
{
	echo "wrong username or password";
	echo "<script>window.location.assign('processlogin.php?errno=userpass');</script>";
	die;
}
else
{
	//Set the session variables
	echo "successfully logged in";
	$_SESSION['status'] = "logged-in";
	$_SESSION['username']=$username;
	echo "<script>window.location.assign('dashboard/');</script>";
	die;
}


?>