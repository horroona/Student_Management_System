<?php
    function contact($servername, $username, $password, $dbname, $usname, $pwd){

        $con = new mysqli($servername, $username, $password, $dbname);

        if($con->connect_error){
            die("connection failed " .$con->connect_error);
        }else{
                $sql = 'select *from user';
                $result = $con->query($sql);

                while($row = $result->fetch_assoc()){

                    $nam = $row['username'];
                    
                    $pd = $row['password'];
                    
                    if($nam == $usname)
                    
                    {
                    
                        if($pd == $row['password'])
                        {
                    
                            echo("Login succeeded");
                    
                        }
                    
                    }
                
                }
            
            }
    
        }

?>