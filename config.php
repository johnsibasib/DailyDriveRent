<?php
ob_start(); //Turns on output buffering 

$timezone = date_default_timezone_set("Europe/London");

$con = mysqli_connect("carrental.cg8zzvcrxjor.ap-southeast-1.rds.amazonaws.com", "admin", "Serwynstephen0987", "carrental"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>