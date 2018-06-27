<!DOCTYPE html>
<html>

<?php
    session_start();
?>
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
                padding:10%;
                padding-left: 10%;
                padding-right: 10%;
                height: 500px;

            }

            #rpDiv{
            
                color: green;
                text-align: center;
                padding-top: 3%;
                padding-left: 33%;
                padding-bottom: 3%;
                background: #3c2222;
            }

            table{
            
                border: 2px solid;
                border-collapse: separate;
            }

            tr, th, td{
                border: 1px solid lightyellow;
                border-spacing: 45px 0;
                padding: 10px;
                width: 150px;
            }
    </style>
</head>

<body>
    
    
    <div id ='mainDiv'>

            <h3>Student Report</h3>

            <div id ='rpDiv'>
                <?php
                    include('ES_DB.php');
                    $email = $_SESSION['email'];
                    showReport($email);
                ?>
            </div>
            

    </div>

</body>

</html>