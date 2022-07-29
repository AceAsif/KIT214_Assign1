<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
	<!--This is for using the bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!--This is for styling the website -->
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
	<div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

	    <form action="email.php" method="post">
		<!--This is for username input -->
			<div class="form-group"> 
				<label>Username</label>
				<input type="text" name="username">
			</div>  
			<div class="form-group">
			<!--This is for password input  -->
				<label>Password</label>
				<input type="password" name="password">
			</div>  
			<div class="form-group">
			<!--This is for submit button  -->
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
		</form>
	</div>
</body>
</html>

