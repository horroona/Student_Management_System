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

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {


/*                if(empty($_POST['email']))
                {
                    $emailerror = "* Email Required ";
                }

                elseif(filter_var($email, FILTER_VALIDATE_EMAIL) ===false)
                {
                    $emailerror ="* Please Enter valid email";
                }
*/
                if(!empty($_POST['attendance'])){


                    $radioButtonValue = $_POST['attendance'];
                }

                if(!empty($_POST['email'])){


                    $email = $_POST['email'];
                }
                if(empty($_POST['attendance']) && empty($_POST['email'])){

                    echo " <script> alert ('Please select radio button or enter email'); </script>";
                }

                else{

                     $server = "localhost";
                     $username = "root";
                     $password = "";
                     $db = "student";
                     
                     $con = mysqli_connect($server, $username, $password, $db);


                     $sql = "SELECT attendance.ID, attendance.Status, attendance.Day, attendance.Time, attendance.Date FROM attendance WHERE attendance.Date = '$date'";
                    
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

                     $result = $con->query($sql);
                     if(!$con)
                     {
                         die("Error in connection " .mysqli_connect_error());
                     }

                     else
                        {

                            if( !empty(mysqli_num_rows($result)))
                            {    
                                echo "<div id = 'echodiv'>";
                                echo "<h3>Today's Attendance ('$date')</h3>";
                                echo"<table style ='text-align: center; border: 2px solid;'>";
                                echo "</tbody>";
                                echo "<tr> <th> ID </th> <th> Stauts </th> <th> Day </th> <th> Time </th> <th> Date </th> <tr>";
                                
                                while($row = $result->fetch_assoc()){
                                    
                                    echo"<br>";
                                    echo" <tr>" . "<td>" .$row['ID'] . "</td> <td>" .$row['Status'] ."</td> <td>" .$row['Day']. "</td> <td>" . $row['Time'] ."</td>  <td>" . $row['Date'] . "</td> </tr>";

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

                    <input type="text" id = "email" name = "email"  placeholder = " Your Email" />

                    <br>
                    <br>

                    Status: &nbsp
                    
                    <br>
                    <br>

                    All &nbsp <input type="radio" id ="all" name = 'attendance' value = 'All' />
                    Present &nbsp <input type="radio" id ="present" name = 'attendance' value = 'P' />
                    Absent &nbsp <input type="radio" id ="all" name = 'attendance' value = 'A' />
                    <br>
                    <br>

                    <input type="submit" id = "submit" name = "submit" value = "show">
    
            </form>
        
        </div>



</body>

</html>