<?php
session_start();
//var_dump($_SESSION['userId']);
//die();
     if (!isset($_SESSION['userId'])) {
         header("Location: login.php");
    } else {
      //  logged in
    } 
	$con=mysqli_connect("localhost", "ictatjcu_smartp", "123zxc", "ictatjcu_smartp");
    $result=mysqli_query($con,"select * from sensor");
    if(!$result){
        echo"Connection failed";
        
    }
	if($result){
		$temp=array();
        $i=0;
		foreach ($result as $value){
            $temp[$i]=$value['id'];
			 $i++;
		}
		//var_dump($temp);
		$myJSON = json_encode($i);

		echo $myJSON; 
	}
?>