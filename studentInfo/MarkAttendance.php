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

    </style>

</head>

<body>

        <div id ="div1">
            
            <form id ="form1" action = "" method ="POST">
                   
                    <h>Mark_Attendance</h>

                    <br>
                    <br>

                    <input type="text" id = "email" name = "email"  placeholder = " Your Email" />
                    <span id ="sp"> </span>

                    <br>
                    <br>

                    Status: &nbsp
                    
                    <select>
                        <option> none </option>
                        <option> P </option>
                        <option> A </option>
                        <option> L </option>
                    </select>
                    
                    <br>
                    <br>

                    <input type="submit" id = "submit" name = "submit" value = "M @ R K">
    
            </form>
        
        </div>

        <?php
            
            $email = '';
            $emailerror = '';

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $email = $_POST['email'];

                if(empty($_POST['email']))
                {
                    $emailerror = "* Email Required ";
                }

                elseif(filter_var($email, FILTER_VALIDATE_EMAIL) ===false)
                {
                    $emailerror ="* Please Enter valid email";
                }

                else{

                     $server = "localhost";
                     $username = "root";
                     $password = "";
                     $db = "student";
                     
                     $con = mysqli_connect($server, $username, $password, $db);
                     
                     $sql = "SELECT *FROM attendance WHERE Email = '$email'";
                     $result = $con->query($sql);
                     if(!$con)
                     {
                         echo "Error in connection " .mysqli_connect_error();
                     }
                     else
                        {
                             while(($row = $result->fetch_assoc())>0)
                            {
                             echo $row['Email'];
                            }  
                        }

                }
            }

        ?>


</body>

</html>