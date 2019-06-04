<?php
session_start();
   unset($_SESSION['userId']);
   session_destroy(); 
   if (!isset($_SESSION['userId'])) {
         header("Location: login.php");
    }
    
?>