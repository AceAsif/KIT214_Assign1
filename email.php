<?php
	include("config.php"); //Connects it with the database connection php file.
	session_start(); //This starts the seesion for the user.

	$email = $_POST["username"];  //Takes the user response for username from the login.php file
	$password = $_POST["password"]; //Takes the user response for password from the login.php file

	$query = "SELECT * FROM users WHERE email = '$email' AND password='$password' "; //Takes all the information from the database.
	$result = mysqli_query($conn,$query); //mysqli_query — Performs a query on the database
	
	//This if statement will generate a link to display.php page and a message saying that he is successful in login.
	if(mysqli_num_rows($result) > 0) //mysqli_num_rows — Gets the number of rows in the result set
	{
		echo "Login successful! Welcome ";
		if($row = mysqli_fetch_assoc($result)) //mysqli_fetch_assoc — Fetch a result row as an associative array
		{
			echo $row['username'];
			$token = openssl_random_pseudo_bytes(8); //Generate random number for token
			$token = bin2hex($token); //bin2hex — Convert binary data into hexadecimal representation
			$_SESSION["token"] = $token;    
			$_SESSION["username"] = $row[username];
			$sql = "UPDATE users SET token='$token' WHERE email='$email' AND password='$password'"; //This updates the token in the database
			
			/*
			//This is for testing the session variables are working or not
			echo '<br>';
			echo $_SESSION["username"];
			*/
			
			$stri = 'echo "http://131.217.173.86/Assign1/display.php?username=""'. $row['username'] .'""&token=""'. $token .'" | mail -s "Link to bank details" ' . $row['email'];

			$last_time = system($stri,$retval);
			if($retval == 0 && mysqli_query($conn,$sql))
			{
				echo "<br> An email has been sent. Please check inbox (and spam)";
			}
		}
	}
	//This else statement will show error if the user has inputted the wrong the input for username and password
	else
	{
		unset($_SESSION["username"]);
		//This shows the error messages to the user
		echo '403 Forbidden <br>';
		echo 'Email or password is wrong<br>';
		//This creates a Go back link to the login page
		echo '<a href="index.php" class="btn"> Go back</a>';
		
		/*
		//This is for testing the session variables are working or not
		echo $_SESSION["username"];
		*/
		
	}
		
?>
