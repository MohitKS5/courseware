<?php
session_start();
if(!isset($_SESSION['status']))
	die("<script>window.location.assign('index.php');</script>");

session_unset();
session_destroy();
die("<script>window.location.assign('index.php');</script>");

?>