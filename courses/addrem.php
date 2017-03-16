<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('location: ../index.php?err=restricted');
	die;
}

if(!isset($_GET['add']) || !isset($_GET['course_id']))
{
	header("location:temp.php");
	die;
}

$conn = new mysqli("coursebuddy.database.windows.net","msadmin","Cb@12345678","codefundo");

if($_GET['add']==="true")
{
	$sql = "INSERT INTO addedcourses VALUES (".$_SESSION['userid'].",".$_GET['course_id'].",".$_SESSION['currsem'].")";
	$conn->query($sql);
}
else
{
	$sql = "DELETE FROM addedcourses WHERE userid=".$_SESSION['userid']." and course_id=".$_GET['course_id'];
	$conn->query($sql);
}

if($conn->error)
	echo "There was an error ".$conn->error;
else 
	echo "Success!";