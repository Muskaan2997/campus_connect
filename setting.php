<?php
$mysqli=new mysqli("localhost","root","","user_connect");
if(mysqli_connect_errno())
{
	echo"error in connection".mysqli_connect_error();
	exit();
}

function baseurl()
{
	return "http://localhost/final/";
}

session_start();

?>  