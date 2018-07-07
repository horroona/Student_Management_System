<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Approval</title>

    <style>

        #tableDiv{

            padding-top: 10%;
            padding-left: 24%;
        }

        form{

            text-align: center;
        }

        table{
            border: 1px solid;
        }

        tr, td, th{

                border: 1px solid #8e8e35;
                border-spacing: 45px 0;
                padding: 10px;
                width: 150px;

        }
    </style>
</head>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        echo'you pressed';
        $server = 'localhost';
        $username = 'root';
        $pwd = '';
        $dbname = 'root';

        $connect = mysqli_connect($server, $username, $pwd, $dbname);
        $connect2 = mysqli_connect('localhost', 'root', '', 'student');    
        if($connect){
                
                $sql = 'SELECT *FROM `Notification`';
                $result = $connect->query($sql);

                if($result){

                    $i = 1;
                    while($row = $result->fetch_assoc())
                    {
                        $ID = $row['ID'];
                        $time = $row['Time'];
                        $date = $row['Date'];

                        $status = $_POST['status'.$i];
                        
                        echo $status;
                        
                        $insert = "UPDATE `Notification` SET `Status` = '$status' WHERE `ID` = '$ID'";
                        
                        $sql = "UPDATE `attendance` SET `Status` = '$status' WHERE `ID` = '$ID' AND `Date` ='$date' AND `Time` = '$time'";
                        
                        $connect2->query($sql);
                        
                        $connect->query($insert);
                        $i++;
                    }

                    mysqli_close($connect);
                }
        
            }

        else{

            echo 'not connected database';
        
        }


    }

?>

<body>
    <form action='' method ='POST'>

        <div id ='tableDiv'>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Leaves</th>
                    <th>Approved</th>
                    <th>Rejected</th>
                </tr>

                <?php

                    
                $server = 'localhost';
                $username = 'root';
                $pwd = '';
                $dbname = 'root';

                $connect = mysqli_connect($server, $username, $pwd, $dbname);
                
                if($connect){
                        
                        $sql = 'SELECT *FROM `Notification`';
                        $result = $connect->query($sql);

                        if($result){

                            $i = 1;
                            while($row = $result->fetch_assoc())
                            {
                                $ID = $row['ID'];
                                $leave = $row['Leaves'];

                
                                echo "<tr> <th> $ID </th> <th> $leave </th>  <th> <input type = 'radio' value = 'approved' name ='status$i'></th> <th> <input type ='radio' value ='rejected' name ='status$i'> </th> </tr>";
                
      
                                $i++;
                            }

                            mysqli_close($connect);
                        }
                
                    }

                else{

                    echo 'not connected database';
                
                }

                ?>
                </table>

            </div>     <input type ='submit' value ='submit' name ='submit'>
        
        </form>

</body>
</html>