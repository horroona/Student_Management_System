<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Enroll_Student</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
    <style>
        
        body{
            
            background: #333232;
            padding-left: 20%;
            padding-right: 20%;
        }
        
        #firstDiv{

            padding-top: 10%;
        }

        #eForm{

            position: relative;            
            background: #0089ff;
            text-align: center;
            border: 1px solid;
            border-radius: 25px;
            padding-top: 30px;
            padding-bottom: 30px;

        }

        #firstName, #lastName, #email, #address, #phoneNo{

            height: 20px;
            border-radius: 5px;
            position: relative;
        }

        #submit{
            border-radius: 20px;
        }
         
        .sp{
            visibility: visible;
            position: absolute;
            color: red;
        }

        #img{

            padding: 5px;
            padding-bottom: 20px;
        }

    </style>

</head>

<body>

<?php
include("ES_DB.php");

$fnamerror = $lnamerror = $addErros = $phoneNoError = $genderror = $emailerror = '';

$fname = $lname = $address = $phoneNo = $mail = $gender ='';

if(isset($_POST['submit']))
{

    if($_SERVER['REQUEST_METHOD']=="POST"){

        if(empty($_POST['firstName']))
        {

            $fnamerror = "* Name Required";
        
        }
        
        else
        {

            $fname = $_POST['firstName'];
        }

        if(empty($_POST['lastName']))
        {

            $lnamerror = "* Last Name Required";
        }

        else
        {

            $lname = $_POST['lastName'];
        }
        
        if(empty($_POST['address']))
        {

            $addErros = "* Address Required";
        }

        else
        {

            $address = $_POST['address'];
        }
        
        if(empty($_POST['phoneNo']))
        {

            $phoneNoError = "* Phone No Required";
        }

        else
        {

            $phoneNo = $_POST['phoneNo'];
        }
        
        if(empty($_POST['email']))
        {

            $emailerror ="* Email Required";
        }
        
        elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != true)
        {
            $emailerror = "* Email should be valid";
        }

        else
        {
        
            $mail = $_POST['email'];
        }
        
        if(empty($_POST['gender']))
        {

            $genderror = "* Please Select gender";
        
        }
        
        else
        {

            if($_POST['gender'] === 'Male')
            {

                $gender = "Male";
            
            }

            if($_POST['gender'] === 'Female'){
             
                $gender = "Female";
            
            }
            
        }

        if($fname !='' && $lname !='' && $phoneNo != '' && $mail != '' && $address != '')
        {
            connectWithDB($fname, $lname, $address, $mail, $gender, $phoneNo);

        }
        else{

            echo "<script> alert('Please Enter values'); </script>";
        }

    
    }
}

?>


<div id ="firstDiv">

    <form action ="#" method ="post" id ="eForm">

        <img src ="https://www.indigo.nl/images/regioinfo_contact/standard_big.jpg" id ="img" width ="80px" height ="80px" alt ="image not found">
        
        <br>
        
        <input type="text" id = "firstName" name = "firstName" placeholder =" First Name">
        <span id = "sp1" class ="sp"> <?php echo $fnamerror; ?> </span>
       
        <br>
        <br>
       
        <input type="text" id = "lastName" name = "lastName" placeholder =" Last Name">
        <span id ="sp2" class = "sp"> <?php echo $lnamerror; ?></span>
       
        <br>
        <br>

        <input type="text" id = "address" name = "address" placeholder =" Address">
        <span id ="sp3" class ="sp"> <?php echo $addErros; ?></span>
        
        <br>
        <br>

        <input type="text" id = "email" name = "email" placeholder =" E-mail"> <span id ="sp4" class ="sp"> <?php  echo $emailerror; ?></span>
       
        
        <br>
        <br>

        Gender: <span id ="sp5" class = "sp"> <?php echo $genderror; ?> </span>
        <br> 
        Male <input type ="radio" id = 'male' name ="gender" value = "Male"> 
        &nbsp
        Female <input type = "radio" id = 'female' name = "gender" value ="Female">

        <br>
        <br>

        <input type="number" id = "phoneNo" name = "phoneNo" placeholder =" Phone Number"  maxlength ="12">
        <span id ="sp6" class = "sp"> <?php echo $phoneNoError; ?> </span>

        <br>
        <br>

        <input type ="submit" value ="Submit" name = "submit" id = "submit">
    
    </form>

</div>

        </body>
</html>