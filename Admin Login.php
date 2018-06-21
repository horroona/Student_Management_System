<!DOCTYPE html>
<?php

	function display(){

		$name = $_POST['name'];
		print ("Hello " . $name);
	}

	if(isset($_POST['submit'])){
		display();
	}
?>
<html>

	<head>

		<meta charset="utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Admin Login</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" media="screen" href="main.css" />

		

	</head>

	<body>
		<div id ="div1">
		
		<form action="" method ="post">

			<input type="text" name ="name" placeholder ="User ID">
			</br>
			</br>
			<input type="password" name ="password" placeholder ="password">
			</br>
			</br>
			<input type="submit" value ="Submit" name ="submit">
	
		</form>

		</div>

		<script src="Admin Login.js"></script>
	</body>

</html>