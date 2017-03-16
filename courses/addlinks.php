<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('location: ../index.php?err=restricted');
	die;
}

if(!isset($_GET['xml']))
{
	header('location: courses.php');
	die;
}

$myfile = fopen("uploads/".$_SESSION['username']."/links.xml","a");

fwrite($myfile,$_GET['xml']."\r\n");

fclose($myfile);
?>
