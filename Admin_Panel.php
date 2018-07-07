<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php

        session_start();


        function showNotification()
        {

            $nuNotification = 0;

            $server = 'localhost';
            $username = 'root';
            $pwd = '';
            $dbname = 'root';

            $connect = mysqli_connect($server, $username, $pwd, $dbname);
            
            if($connect){
                    
                    $sql = 'SELECT *FROM `Notification`';
                    $result = $connect->query($sql);

                    if($result){

                        while($row = $result->fetch_assoc())
                        {
                            if($row['Status'] == '')
                            {
                        
                                $nuNotification++;
                            }
                            
                            else{

                                $delete = "DELETE FROM `Notification` WHERE `Status` != ''";
                                $connect->query($delete);
                            }
                        }

                        mysqli_close($connect);
                    }
            
                }

            else{

                echo 'not connected database';
            
            }

            return $nuNotification;
        }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">



    <style>
    
        #div1{

                background-image: url("http://3.bp.blogspot.com/-btNJmDArXPI/UA0EEQUWiHI/AAAAAAAAJF8/6V5z-7yS0X8/s640/Hard+To+Believe+Beautiful+Scenery+on+Planet+Earth+(1).jpg");
                height: 100%; 
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                padding: 5%;
                padding-top: 2%;
                padding-bottom: 10px;

}

            #div11{
                padding-top: 10px;
                background: #212529;
                height: 40px;
                text-align: center;
            }
            
             ul{
                list-style: none;
                height: 10em;
            }
            ul li{
                float: left;
                padding-left: 40px;
                
            }
            ul li a{
                text-decoration: none;
                color: yellow;
                font-family: "Times New Roman", Times, serif;
                font
            }
            
            #div2{
                text-align: center;
                padding: 30%;
                padding-top: 20%;
            }

            #div2 h3{
                    color: yellow;
                    font-family: "Times New Roman", Times, serif; 
            }
    </style>
</head>

<body>
    <div id ='div1'>
        <marquee><font size ='3' style ='color: red; '> Heard melodies are sweet but those unheard are sweeter</font></marquee>

        <div id ='div11'>
            <ul>

                <li><a href='studentInfo/MarkAttendance.php'> <font size = '2'> Mark_Attendance </font> </a></li>
                <li><a href='studentInfo/showAttendance.php'> <font size ='2'>Show Attendance </font> </a></li>
                <li><a href='studentInfo/studentReport.php'> <font size ='2'>Student Detail </font> </a></li>                
                <li><a href='studentInfo/student Plateform.php'> <font size ='2'>Student Plateform </font> </a></li>                
                <li><a href ='statusApproval.php' id ='btn'> <font size ='4'><span class="glyphicon glyphicon-bell"  style ='color: yellow'></font></a></span><span style='color:white; position: absolute;'> <?php echo showNotification();?> </span></li>
            
            </ul>
        </div>

        <div id ='div2'>
            <font size ='5'><h3>Welcome Admin</font></h3>
            </div>


    </div>
</body>
</html>