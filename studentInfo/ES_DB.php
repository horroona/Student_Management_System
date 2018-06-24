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

                echo "<script> alert('Data already exist'); </script>";

            }
       
        }
    }

?>