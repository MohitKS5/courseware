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

$conn = new mysqli("coursebuddy.database.windows.net","msadmin","Cb@12345678","codefundo");
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
	$row = $res->fetch_array(MYSQL_ASSOC);
	$_SESSION['status'] = "logged-in";
	$_SESSION['username'] = $username;
	$_SESSION['instituteid'] = $row['instituteid'];
	$_SESSION['userid'] = $row['userid'];
	$_SESSION['currsem'] = $row['currsem'];
	header("Location: dashboard");
	die;
}

?>