<?php
    
    function contact($servername, $username, $password, $dbname, $usname, $pwd){

        $con =mysqli_connect($servername, $username, $password, $dbname);

        if(!$con){
    
            die("connection failed " .$con->connect_error);
        }
    
        else{
    
            $err = true;
    
            $sql = 'select *from user';
    
            $result = $con->query($sql);


            while($row = $result->fetch_assoc()){

                    $nam = $row['username'];
                    
                    $pd = $row['password'];
                    
                    if($nam == $usname)
                    
                    {
                    
                        if($pd == $pwd)
                        {
                            $err = false;
                            header('Location: Admin_Panel.php');
                            exit;
                    
                        }
                    
                    }
                
                }

                if($err == true){

                    echo("<h3 style ='text-align: center;'> <font color  = 'red' > Login Failed </font> </h3>");

                }
            
            }
    
        }

?>