<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Admin Login</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" media="screen" href="main.css" />

		

	</head>

	<body id = "body">

	<?php

	session_start();
	
	include 'dataBase.php';
	
			$usname_error = $pwd_error = '';
			$usname = $pwd = '';

			if($_SERVER['REQUEST_METHOD'] == "POST"){

				
				
				if(empty($_POST['name']))
				{
					$usname_error = '* Name Required';
				}
				else
				{

					$usname = $_POST['name'];

				}
				
				if(empty($_POST['password']))
				{

					$pwd_error = '* password Required';
			
				}
				else
				{
					$pwd = $_POST['password'];

				}

				if($usname && $pwd != '')
				{
					$servername = 'localhost';
					$username = 'root';
					$password = '';
					$dbname = 'root';
			
					contact($servername, $username, $password, $dbname, $usname, $pwd);

				}
			
			}
	?>
	
		<div id ="div1">
		<img src="https://i.ytimg.com/vi/gGV0dpVpv8U/hqdefault.jpg" alt="not found" height ="70px" width ="120px" style = "padding: 5px;">
		<form action="" method ="post">

			<input type="text" name ="name" placeholder ="User ID" height ="20px">
			<span id ="error1"> <?php echo $usname_error; ?> </span>
			</br>
			</br>
			<input type="password" name ="password" placeholder ="password" height = "20px">
			<span id ="error2"> <?php echo $pwd_error; ?> </span>
			</br>
			</br>
			<input type="submit" value ="Login" name ="submit">
	
		</form>
		</div>

		<script src="Admin Login.js"></script>
	</body>

</html>