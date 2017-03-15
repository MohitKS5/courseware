<?php
//Prelims
session_start();

//If user trespasses
if(!isset($_POST['username']) || !isset($_POST['password']))
{
	echo "restricted";
	header("Location: processlogin.php?err=restricted");
	die;
}

//If an user is logged in, but logs in again
if(isset($_SESSION['status']) && strcmp($_SESSION['status'],"logged-in")==0)
{
	//Destroy the previous session and continue
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
	header("Location: index.php?err=userpass");
	die;
}
else
{
	//Set the session variables
	$_SESSION['status'] = "logged-in";
	$_SESSION['username']=$username;
	header("Location: dashboard");
	die;
}

?>