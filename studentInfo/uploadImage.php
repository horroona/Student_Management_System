<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload Image</title>
</head>

<body>

    <form action="" method="POST" enctype ="multipart/form-data">

        <input type="file" id="uploadFile" name="uploadFile" />

        <input type="submit" name ="submit" value="upload">

    </form>

    <form action="" method="POST">
        <input type ="submit" value ="display" name ="display"> 
    </form>

    <?php


        if(isset($_POST['submit']))
        {   

            $target ='file/images';
            $target = $target.addcslashes('File',file_get_contents($_FILES['uploadFile']['name']));
            
            $conn = mysqli_connect('localhost','root','','student');
            
            if($conn)
            {
                $sql = "INSERT INTO images(`ID`, `path`) VALUES(2, '$target')";
                $conn->query($sql);
                echo "weldone";

            }
            elseif (!$conn)
             {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

        }

        if(isset($_POST['display']))
        {
            
            $conn = mysqli_connect('localhost','root','','student');

            if($conn){

                $sql = "select * FROM `images`";

                $result = $conn->query($sql);

                if($result)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $path = $row['path'];
                        var_dump($path);
                        echo "<img src ='dat:image/jpeg;base64,'"."'base64_encode($path)'"."width ='200' height ='200' alt ='image not found'/>";
                    }
                }
            }
            else
             {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

        }
    ?>
</body>
</html>