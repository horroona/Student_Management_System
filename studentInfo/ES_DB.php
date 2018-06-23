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

            $bln = true;
            $sql = "SELECT * FROM studentinfo";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()){}
            {

                if($row['Email'] != $email){
     
                    $in = "INSERT INTO stundentinfo('FirstName', 'LastName', 'Address', 'Email, 'phoneNo') Values('$fname', '$lname', '$address', '$email', '$phoneNo')";
                    echo "Record added";
                }
            }

            echo "connection established";
        }
    }

?>