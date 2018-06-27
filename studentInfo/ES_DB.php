<?php



    function connectWithDB($fname, $lname, $address, $email, $gender, $phoneNo){

        $server = "localhost";
        $database = "student";
        $username = "root";
        $password = "";
        

        $con = mysqli_connect($server, $username, $password, $database);

        if(!$con){

            die("connection could not established due to following errors " .mysqli_connect_error());
        }

        else{
            
            $insert ='';
            $bln = true;
            $sql = "SELECT * FROM studentinfo";
            $insert = "INSERT INTO `studentinfo`(`FirstName`, `LastName`, `Address`, `Email`, `Gender`, `PhoneNumber`) VALUES ('$fname','$lname','$address','$email','$gender','$phoneNo')";
            $result = $con->query($sql);
            
            while($row = $result->fetch_assoc())
            {
               
                if($row['Email'] === $email){
     
                    $bln = false;
                }
                
            }

            if($bln===true){
            
                if($con->query($insert) ===true)
                {

                echo "<script> alert('Data added'); </script>";
                
                }

                else{
                    
                    echo "<script> alert('could not be added'); </script>";
                }
            }  

            else{

                echo "<script> alert('Data against this E-mail already exist'); </script>";

            }
       
        }
    }

    function showReport($email)
    {

        $server = "localhost";
        $database = "student";
        $username = "root";
        $password = "";
        
        $present = 0;
        $absent = 0;
        $leaves = 0;

        $con = mysqli_connect($server, $username, $password, $database);

        $sql = "SELECT * FROM `studentinfo` WHERE Email = '$email'";
        $sql2 = "SELECT *FROM `attendance` WHERE ID = '$email'";

        $result2 = $con->query($sql2);

        if(!empty($result2))
        {
            while($tr = $result2->fetch_assoc() )
            {
                if($tr['Status'] ==='P'){
                   
                    $present++;
                }
                
                if($tr['Status'] ==='A'){
                   
                    $absent++;
                }
                if($tr['Status'] ==='L'){
                   
                    $leaves++;
                }
            }
        }
        
        $result = $con->query($sql);

            if(!empty($result))
            {

                echo "<table>";
                echo "<tbody>";
                while( $row = $result->fetch_assoc() ){
                    
                    echo "<tr> <th>First Name: </th> <td>" .$row['FirstName'] . "</td> </tr>";
                    echo "<tr> <th>Last Name: </th> <td>" .$row['LastName'] . "</td> </tr>";
                    echo "<tr> <th>Email: </th> <td>" .$row['Email'] . "</td> </tr>";
                    echo "<tr> <th>Gender: </th> <td>" .$row['Gender'] . "</td> </tr>";
                    echo "<tr> <th>Presents: </th> <td>" .$present . "</td> </tr>";
                    echo "<tr> <th>Absenties: </th> <td>" .$absent . "</td> </tr>";
                    echo "<tr> <th>Leaves: </th> <td>" .$leaves . "</td> </tr>";
                
                }
                
                echo "</tbody>";
                echo "</table>";
            
            }
            elseif(empty($result))
            {
                
                echo "<h3  style ='text-align: center'> <font color ='red'> Email not exists </font></h3>";
            }

    }

    function studentlogin($servername, $username, $password, $dbname, $email, $pwd)
    {

            $con = new mysqli($servername, $username, $password, $dbname);
    
            if($con->connect_error){
        
                die("connection failed " .$con->connect_error);
        
            }
        
            else{
        
                $err = true;
        
                $sql = "select *from studentinfo where Email = '$email'";
        
                $result = $con->query($sql);
    
    
                if( ($row = $result->fetch_assoc())> 0 ){
                        
                       $err = false;
                       header('Location:Student Plateform.php');
                       exit;
                        
                }
                        
                elseif($err == true){

                         echo("<h3 style ='text-align: center;'> <font color  = 'red' > Login Failed </font> </h3>");

                }
    
                
                }
        
    }
    
    
?>