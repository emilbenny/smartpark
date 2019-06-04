<?php
session_start();
//var_dump($_SESSION['userId']);
//die();
     if (!isset($_SESSION['userId'])) {
         header("Location: login.php");
    } else {
      //  logged in
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>CONTACT US</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include("includes/navbar.php")?>
    <?php include("includes/header.php")?>

    
    <div class="container mt-5">
        <h4>
             Contact Us
        </h4>
        <h5>Need a hand?<br><br> Email us at <b>alexgeorge50@gmail.com</b><br><br> Or Ring Us <b>+61 415 614 066</b></h5>
    </div>
    
    <?php include("includes/footer-area.php")?>
</body>
</html>