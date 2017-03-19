<?php

    $conn = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","b7603cbccbf2d5","49d472d0","codefundo");

$sql = "SELECT username FROM users WHERE username='".$_GET['username']."'";

$res = $conn->query($sql);

if($res->num_rows==0)
	echo 'true';
else echo 'false';

unset($res);
$conn->close();
unset($conn);
unset($res);

?>