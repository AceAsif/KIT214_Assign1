<?php
$dbServername = "localhost"; //This is the server name
$dbUsername = "root"; //This is the server login username
$dbPassword = "Tcfy@4715"; //This is the server login password
$dbName = "lamp_db"; //This is the server database name

/* Attempt to connect to MySQL database */
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn)
{
	//This stop the server linking attempt and shows an error
    die("Connection failed: " . mysqli_connect_error());
}
?>