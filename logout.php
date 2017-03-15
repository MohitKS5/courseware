<?php
session_start();
if(!isset($_SESSION['status']))
	header("Location: index.php");

session_unset();
session_destroy();
header("Location: index.php");

?>