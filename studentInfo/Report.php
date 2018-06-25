<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Report </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <script src="main.js"></script>
    
    <style>

            #mainDiv{
                color: lightblue;
                text-align: center;
                background: grey;
                padding:20%;
                padding-left: 10%;
                padding-right: 10%;
                height: 500px;

            }

            #rpDiv{
            
                color: green;
                text-align: center;
                padding-top: 3%;
                padding-bottom: 3%;
                background: #3c2222;
            }

    </style>
</head>

<body>
    
    
    <div id ='mainDiv'>

            <h3>Student Report</h3>

            <div id ='rpDiv'>

            </div>

    </div>
    
    <?php
                session_start();

              /*$Fname = $_SESSION["fname"];
                $lname = $_SESSION['lname'];
                $gender = $_SESSION['gender'];
                $email = $_SESSION['email'];
                */

                showData($_SESSION["fname"], $_SESSION['lname'], $_SESSION['gender'], $_SESSION['email']);

                session_destroy();
                function showData($Fname, $lname, $gender, $email)
                {
                    echo "<script> document.getElementById('rpDiv').innerHTML = 'First Name:   $Fname <br>LastName:  $lname <br>Gender:  $gender <br>Email:  $email'; </script>";
                }
                
        ?>

</body>

</html>