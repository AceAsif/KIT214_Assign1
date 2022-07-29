<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Logout</title>
	<!--This is for using the bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<h1>Good Bye</h1> <!-- This is the header  -->
	<?php
		
		session_start(); //The session started by the current user
		unset($_SESSION["username"]); //This removes the username session variable
		unset($_SESSION["token"]); //This removes the token session variable
		session_destroy();  //This destroys the session that was started by the current user.
		
		/*
		//This is for testing the session variables are working or not
		echo $_SESSION["username"];
		*/
	?>
	
	
</body>
</html>