<?php 
include('config.php'); //Connects it with the database connection php file.
session_start(); //This starts the session for the user.
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bank Details</title>
	<!--This is for the Javasrcipt -->
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<!--This is for styling the table and button -->
    <style>
		.button{
		  background-color: #555555;
		  color: white;
		  padding: 12px 20px;
		  border: black;
		  border-radius: 4px;
		  cursor: pointer;
		  position: absolute;
		  top: 10px;
		  right: 30px;
		  
		}

		.button:hover {
		   background-color: #f44336;
		}
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #000000;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
		
		
	</style>
</head>

<body>

<h2>Bank Details</h2>
		
			<button class="button" id="logoutBtn" >Logout</button>
			<script>
			//This is the function for logging out the user
			   document.getElementById("logoutBtn").addEventListener("click", myFunction);
			   function myFunction() {
				 window.location.href="logout.php";
			   }
			</script>
			
			<?php

					$name = $_GET['username']; //for getting the username from the url
					$token = $_GET['token']; ////for getting the token from the url
					$sql = "SELECT Name, Address, Balance FROM users WHERE username = '$name' AND token = '$token' "; //Retrieves the specificed information from the database.
					
					/*
					//This is for testing the session variables are working or not
					echo $_SESSION["username"];
					*/
					
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						echo "<table>"; //Makes the tables
						//Creates the headers for the table.
						echo "<tr> 
							<th>Name</th>
							<th>Address</th>
							<th>Balance ($)</th>
						 </tr>";
						 
						  // output data of each row
						  /* fetch associative array */
						  while($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row["Name"]."</td><td>".$row["Address"]."</td>" . "<td>" .$row["Balance"]."</td></tr>"; //Outputs the specificed information from the database.
							exit;
						  }
						  echo "</table>";
					} 
					else {
					  echo "0 results";
					}
					
					$conn->close();
					echo "</table>";
			?>
			
</body>
</html>
