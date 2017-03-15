<?php

if(!isset($_GET['username']))
	die("<script>window.location.assign('index.php?errno=restricted');</script>");

$conn = new mysqli("127.0.0.1","root","","codefundo");

$sql = "SELECT username FROM users WHERE username='".$_GET['username']."'";

$res = $conn->query($sql);

if($res->num_rows==0)
	echo 'true';
else echo 'false';

unset($res);
$conn->close();
?>