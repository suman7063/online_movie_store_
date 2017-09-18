<?php
$conn=mysqli_connect("localhost","root","","php");
if($conn->connect_error)
{
	die("connection failed".$conn->connect_error);
}
else
{
	$a='<h2>NOW REGISTERED........</h2>';
}
?>