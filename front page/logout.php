<?php
session_start();
if(!isset($_SESSION['status']))
	die("<script>window.location.assign('login.php');</script>");

session_unset();
session_destroy();
die("<script>window.location.assign('login.php');</script>");

?>