<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Student Login</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" media="screen" href="main.css" />

		<style>

				body{

					background: lightgreen;
					text-align:center;
				}
		
				#div1{

						text-align: center;
						background: grey;
						position: relative;
						padding: 30px;	
						padding-top: 20px;					
						margin-top: 10%;
						margin-bottom: 10%;
						border-radius: 3em;
						margin-left: 30%;
						margin-right: 30%;

				}

				
				#sp{
					position: absolute;
					color: red;
				}

				h{
					color: lightyellow;
				}
		
		</style>
		

	</head>

	<body id = "body">

	<?php
	session_start();

	$_SESSION['Admin'] = "StudentPage";
	
	include 'ES_DB.php';
	
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
                    $dbname = 'student';
			
					studentlogin($servername, $username, $password, $dbname, $usname, $pwd);

				}
			
			}
	?>
	
	
		
		<div id ="div1">

		<h> Student Login </h>
		
		<form id = "form" action="" method ="post">
			
			
			
			<br>
			<br>
			
			<img src="https://i.ytimg.com/vi/gGV0dpVpv8U/hqdefault.jpg" alt="not found" height ="70px" width ="120px" style = "padding: 5px;">
			
			<br>
			<br>

			<input type="text" name ="name" placeholder =" Student Email" height ="20px">
			<span id ="sp"> <?php echo $usname_error; ?> </span>
		
			</br>
			</br>
		
			<input type="password" name ="password" placeholder =" password" height = "20px">
			<span id ="sp"> <?php echo $pwd_error; ?> </span>
		
			</br>
			</br>
		
			<input type="submit" value ="Login" name ="submit">
	
		</form>
		
		</div>

	</body>

</html>