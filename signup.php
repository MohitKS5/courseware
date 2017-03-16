<?php
session_start();
if(!isset($POST['email']))
	header("Location: index.php");
$email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

$username = false;
$conn = new mysqli("coursebuddy.database.windows.net","msadmin","Cb@12345678","codefundo");

$sql = "SELECT username FROM users WHERE username='".$_POST['username']."'";
$res = $conn->query($sql);
$username = ($res->num_rows==0);

$sql = "SELECT email FROM users WHERE email='".$_POST['email']."'";
$res = $conn->query($sql);
$email = $email && ($res->num_rows==0);

$password = (strcmp($_POST['password'],$_POST['passwordAgain'])==0) &&(strlen($_POST['password'])>=8);		//Minimum password length is 8

if($username && $email && $password) {
	$sql = "INSERT INTO users (username,password,email,instituteid) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', ".$_POST['institute'].")";
	$conn->query($sql);
	if($conn->errno)
	{
		die("There was a problem uploading your profile to the server. Please try again later.".$conn->error);
	}
	$_SESSION['status'] = "logged-in";
	$_SESSION['username']= $_POST['username'];
	echo "You have been successfully registered. You are being redirected to your dashboard.";
	echo "<script>window.location.assign('dashboard/');</script>";
	die;
} else if(!$username) {
	echo "Seems like the username is already taken. <a href='index.php&err=xuser'>Try Again!</a>";
} else if(!$email) {
	echo "Seems like the email . <a href='index.php#logsec&err=xemail'>Try again</a>";
}