<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Report </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <script src="main.js"></script>

</head>

<body>
    
    <div id ='rpDiv'>

        <?php

                function showData($Fname, $lname, $gender, $email)
                {
                    echo "First Name" .$Fname . " LastName " . $lname . " Gender " . $gender . " Email " .$email;
                }
        
        ?>
    </div>
</body>

</html>