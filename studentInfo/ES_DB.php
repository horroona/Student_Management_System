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

    function showReport($email)
    {
        include("Report.php");

        $server = "localhost";
        $database = "student";
        $username = "root";
        $password = "";
    
        $con = mysqli_connect($server, $username, $password, $database);

        $sql = "SELECT * FROM `studentinfo` WHERE Email = '$email'";

        $result = $con->query($sql);

        
            if( ( mysqli_num_rows($result) ) > 0 )
            {
                //"FirstName: $row['FirstName']", "<br>LastName: $row['LastName']", "<br>Gender:  $row['Gender']", "<br>Email: $row['Email']"
            
                while( $row = $result->fetch_assoc() ){
                    
                    session_start();
                    
                    $_SESSION['fname'] = $row['FirstName'];
                    $_SESSION['lname'] = $row['LastName'];
                    $_SESSION['gender'] = $row['Gender'];
                    $_SESSION['email'] = $row['Email'];

                    header('Location: Report.php');
                    exit;
                }
            }
            else
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