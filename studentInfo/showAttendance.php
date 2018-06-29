<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show_Attendance</title>

    <style>
    
        #div1{

                text-align: center;
                padding: 10%;
        }
        
        #form1{

                background: lightgrey;            
                padding-top: 10%;
                padding-bottom: 10%;
        
        }

        #email, #status, #submit {

                position: relative;
        }

        #sp{

            position: absolute;
            color: red;
        }
        
        #echodiv{

            padding-top: 20px;
            text-align: center;
            padding-left: 10%;
        }

        table{
            width: 88%;
        }
        
        th{
            background: yellow;
            border: 1px black;
        }

        tr:nth-child(even){
            background: lightgrey;
        
        }

        tr:nth-child(odd){

            background: lightgreen;
        }
    </style>

</head>

<body>

        <?php
            
            $radioButtonValue = '';
            $email = '';

            $date = date("Y-m-d");
            $day = date("l");
            $time = date('h:i:s A');

            $Fdate = '';
            $Tname = '';

            $FTerror = '';

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {

                $Fdate = $_POST['Fdate'];
                $Tdate = $_POST['Tdate'];

                if($Tdate < $Fdate)
                {

                    $FTerror = " *Please select date in order ";
                
                }

                if(!empty($_POST['attendance'])){


                    $radioButtonValue = $_POST['attendance'];
                }

                if(!empty($_POST['email'])){


                    $email = $_POST['email'];
                }
                if(empty($_POST['attendance']) && empty($_POST['email']) && empty($Fdate) && empty($Tdate) ){

                    echo " <script> alert ('Please select radio button check by email OR select date'); </script>";
                }

                else{

                     $server = "localhost";
                     $username = "root";
                     $password = "";
                     $db = "student";
                     
                     $con = mysqli_connect($server, $username, $password, $db);


                     $sql = "SELECT attendance.ID, attendance.Status, attendance.Day, attendance.Time, attendance.Date FROM attendance WHERE attendance.Date = '$date'";
                    
                     if(empty($FTerror))
                     {
                        echo "FTerror is empty";
                        $sql = "SELECT attendance.ID, attendance.Status, attendance.Day, attendance.Time, attendance.Date FROM attendance WHERE attendance.Date between '$Fdate' AND '$Tdate'";
                     
                     }

                    if(!empty($email))
                    {
                    
                        $sql = "SELECT attendance.ID, attendance.Status, attendance.Day, attendance.Time, attendance.Date FROM attendance WHERE attendance.Date = '$date' AND attendance.ID = '$email'";
                    
                    }

                    if($radioButtonValue === 'P'){

                        $sql = "SELECT attendance.ID, attendance.Status, attendance.Day, attendance.Time, attendance.Date FROM attendance WHERE attendance.Date = '$date' AND attendance.Status = 'P'";
                    }
                    if($radioButtonValue === 'A'){

                        $sql = "SELECT attendance.ID, attendance.Status, attendance.Day, attendance.Time, attendance.Date FROM attendance WHERE attendance.Date = '$date' AND attendance.Status = 'A'";
                    }
                    if($radioButtonValue === 'L'){

                        $sql = "SELECT attendance.ID, attendance.Status, attendance.Day, attendance.Time, attendance.Date FROM attendance WHERE attendance.Date = '$date' AND attendance.Status = 'L'";
                    }

                     $result = $con->query($sql);
                    
                     if(!$con)
                     {
                         die("Error in connection " .mysqli_connect_error());
                     }

                     else
                        {

                            if( !empty(mysqli_num_rows($result)))
                            {
                                $num = 1;    
                                echo "<div id = 'echodiv'>";
                                echo"<table style ='text-align: center; border: 2px solid;'>";
                                echo "</tbody>";
                                echo "<h3>Attendance_View on ('$date')</h3>";
                                echo "<tr> <th> ID </th> <th> Stauts </th> <th> Day </th> <th> Time </th> <th> Date </th> <tr>";
                                
                                while($row = $result->fetch_assoc()){
                                    
                                    echo"<br>";
                                    echo" <tr> " . "  <td> $num-" .$row['ID'] . "</td> <td>" .$row['Status'] ."</td> <td>" .$row['Day']. "</td> <td>" . $row['Time'] ."</td>  <td>" . $row['Date'] . "</td> </tr>";
                                    
                                    $num++;
                                }
                                
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            }
                            else{
                                
                                echo "<h3 style ='Color: red; text-align: center;'> Attendance not marked </h3>";
                            }
                    }

                }
            }

        ?>

        <div id ="div1">
            
            <form id ="form1" action = "" method ="POST">
                   
                    <h>Show_Attendance</h>

                    <br>
                    <br>

                    <input type="text" id = "email" name = "email"  placeholder = " check by Email" />

                    <br>
                    <br>

                    Status: &nbsp
                    
                    <br>
                    <br>

                    All &nbsp <input type="radio" id ="all" name = 'attendance' value = 'All' />
                    Present &nbsp <input type="radio" id ="present" name = 'attendance' value = 'P' />
                    Absent &nbsp <input type="radio" id ="absent" name = 'attendance' value = 'A' />
                    Leaves &nbsp <input type="radio" id ="leave" name = 'attendance' value = 'L' />
                    <br>
                    <br>

                    Select_Data: &nbsp<span id ="sp"><?php echo $FTerror;?></span>
                   
                    <br>
                    <br>
                   
                    From:  &nbsp <input type="date" id = "date" name ="Fdate">  &nbsp &nbsp To: &nbsp <input type="date" id = "date" name ="Tdate">
        
                    <br>
                    <br>

                    <input type="submit" id = "submit" name = "submit" value = "show">
    
            </form>
        
        </div>



</body>

</html>