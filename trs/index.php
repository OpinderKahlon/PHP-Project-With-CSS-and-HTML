<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "trip_db";

    $con = mysqli_connect($server, $username, $password, $db);

    if(!$con){
        die("Connection failed due to ". mysqli_connect_error());
    }
    // echo("Successfully Connected With Database")

    $name = $_POST['name'];
    $email = $_POST['email'];
    $ticket = $_POST['ticket']; 
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip` (`name`, `email`, `phone`, `ticket`, `gender`, `other`, `dt`) VALUES ( '$name' , '$email' , '$phone', '$ticket', '$gender', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true ){
        echo "<script>alert('Successfully Inserted')</script>";
        $insert = true;
        
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

   $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to website</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    

    
</head>
<body>   
    <img class ="bg" src="ustrip.jpg" alt="AGC">
    <div class="container">
        <h1>Welcome to AGC US  trip form</h1 >
        <p>Enter your details below to submit your participation in the trip </p>
         <?php
         if($insert == true)
         echo "<p class='submitMsg'>Thanks for joining us and Submitting your form for US Trip.</p>"
         ?>  
        
       
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="email" id="email" placeholder="Enter your E-mail">
            <input type="text" name="phone" id="Phone" placeholder="Enter your Phone">
            <input type="text" name="ticket" id="ticket" placeholder="Number of Tickets">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your description"></textarea>
            <Button class="btn">Submit</Button>
            
        </form>  
    </div>
    
   
</body>
</html>