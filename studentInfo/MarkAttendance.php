<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mark_Attendance</title>

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

    </style>

</head>

<body>

        <?php
            session_start();

            $sid = $_SESSION['Admin'] ?: '';
            echo $sid;

            $email = '';
            $emailerror = '';
            $status = '';
            $statuserror = '';

            $date = date("Y-m-d");
            $day = date("l");
            $time = date('h:i:s A');

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $email = $_POST['email'];
                $status = $_POST['status'];

                if(empty($_POST['email']))
                {
                    $emailerror = "* Email Required ";
                }

                elseif(filter_var($email, FILTER_VALIDATE_EMAIL) ===false)
                {
                    $emailerror ="* Please Enter valid email";
                }

                if(($_POST['status']) ==='none')
                {

                    $statuserror ="* Please select status";
                
                }
                elseif(($_POST['status']) ==='L' && $sid != "AdminPage")
                {
                    echo "session ".$sid;
                    echo "<script> alert('You would need to get permission from Admin '); </script>";
                    if(empty($_SESSION['session']))
                    {
                        header('Location: studentLogin.php');
                        exit;
                    }
                }

                else{

                     $server = "localhost";
                     $username = "root";
                     $password = "";
                     $db = "student";
                     
                     $con = mysqli_connect($server, $username, $password, $db);
                     
                     $sql = "SELECT attendance.ID, attendance.Date, studentinfo.Email FROM attendance, studentinfo WHERE studentinfo.Email = '$email'";
                     

                     $result = $con->query($sql);
                     if(!$con)
                     {
                         die("Error in connection " .mysqli_connect_error());
                     }

                     else
                        {
                            if( !empty($row = $result->fetch_assoc()))
                            {
                                $check = true;
                                
                                while($row = $result->fetch_assoc()){

                                    if($row['Date'] === $date && $row['ID'] === $email)
                                    {
                                        $check = false;
                                        echo "<script> alert('Attendance for this Id has already been marked for today'); </script>";
                                    }

                                    else{};

                                }

                                if($check === true)
                                {

                                    $insert = "INSERT INTO attendance(`ID`, `Status`, `Day`, `Time`, `Date` ) VALUES('$email', '$status', '$day', '$time', '$date')";
                                    $con->query($insert);
                                    echo "<script> alert('Thank you! '); </script>";
                                }
                            }  

                            elseif(empty($row = $result->fetch_assoc()))
                            {
                                $emailerror = "* Email not matched";
                            }

                    }

                }
            }

        ?>

        <div id ="div1">
            
            <form id ="form1" action = "" method ="POST">
                   
                    <h>Mark_Attendance</h>

                    <br>
                    <br>

                    <input type="text" id = "email" name = "email"  placeholder = " Your Email" />
                    <span id ="sp"> <?php echo $emailerror;?></span>

                    <br>
                    <br>

                    Status: &nbsp
                    
                    <select id = "status" name = "status">

                        <option> none </option>
                        <option> P </option>
                        <option> A </option>
                        <option> L </option>
                    
                    </select>
                    <span id ="sp"> <?php echo $statuserror; ?></span>

                    <br>
                    <br>

                    <input type="submit" id = "submit" name = "submit" value = "M @ R K">
    
            </form>
        
        </div>



</body>

</html>