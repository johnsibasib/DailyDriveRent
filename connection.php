<?php

function Connect()
{
	$dbhost = "carrental.cg8zzvcrxjor.ap-southeast-1.rds.amazonaws.com";
	$dbuser = "admin";
	$dbpass = "Serwynstephen0987";
	$dbname = "carrental";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	return $conn;
}
?>