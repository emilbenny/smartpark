<?php
    
session_start();
//var_dump($_SESSION['userId']);
//die();
     if (!isset($_SESSION['userId'])) {
         header("Location: login.php");
    } else {
      //  logged in
    } 
    $con= mysqli_connect("localhost", "root", "", "smartpark");
    $result=mysqli_query($con,"select * from available_slots");
    if(!$result){
        echo"Connection failed";
        
    }
    if ($result){
//        var_dump($result);
        $temp=array();
        $i=0;
        foreach ($result as $value){
            $temp[$i]=$value['slot_availability'];
            //echo "<br>";
            //echo $value['slot_no'];
            //echo $temp[$i];
            //echo "<br>";
            $i++;
            
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>ADMIN HOME</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include("includes/navbar.php")?>
    <?php include("includes/header.php")?>
    <div id="wrapper">
        <div class="legendsWrap mt-5 mb-3">
            <span class="color green"></span> <span class="ml-1"> Available Slots</span>
             <span class="color red ml-5"></span> <span  class="ml-1"> Occupied Slots</span>
        </div>
        <div>
    <?php
        $x=0;
        for ($index = 0; $index < 5; $index++) {
    ?> 
        <table class="parking-table">
        <tr>
            <?php for ($i = 0; $i<5; $i++) {
                if ($temp[$x]==0){
             ?>
            <td><div class="slot-wrapper"><input class="myButton" type="submit" value="P" onclick="changeStatus(<?php $x?>)"><div class="slotname">slot: <?php echo $x?></div></div></td>
            <?php
                }
                elseif ($temp[$x]==1) {
                    ?>
            <td><div class="slot-wrapper"><input class="myButton1" type="submit" value="P" onclick="changeStatus(<?php $x?>)"><div class="slotname">slot: <?php echo $x?></div></div></td>
            <?php
            }
              $x++;   
             }
            
            ?>
        </tr><br>
    <?php
        }
    ?>
        </table>
</div>
    </div>
    <?php include("includes/footer-area.php")?>
</body>
</html>