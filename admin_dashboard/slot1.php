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
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ADMIN HOME</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>	
<script>
	$(document).ready(function() {
	//alert("hello!");
    setInterval(function(){
	  //alert("Boom!");
	  $.ajax({                                      
      url: 'http://smartp.ictatjcub.com/admin_dashboard/checkslot.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
		  console.log(data);
		  $('#park-table tr').html('');
		  if(data%2 == 0) {
			  console.log('0 conditio');
			  $('#park-table tr').append('<td><div class="slot-wrapper"><input class="myButton1" type="submit" value="P" ><div class="slotname">Slot Vacant</div></div></td>');
	      } else {
 console.log('1 conditio');
 $('#park-table tr').append('<td><div class="slot-wrapper"><input class="myButton" type="submit" value="P" ><div class="slotname">Slot Occupied</div></div></td>');
		  }			  
        
      } 
    });
	}, 5000); 

}); 

</script>
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
		<table class="parking-table" id="park-table" >
        <tr>
		<?php
		
			if($temp[$i]%2==0){
		?>
		<td><div class="slot-wrapper"><input class="myButton" type="submit" value="P" onclick="changeStatus(<?php $x?>)"><div class="slotname">Slot Vacant</div></div></td>
		<?php
             }
             elseif ($temp[$i]%2==1) {
        ?>
		<td><div class="slot-wrapper"><input class="myButton1" type="submit" value="P" onclick="changeStatus(<?php $x?>)"><div class="slotname">Slot Occupied</div></div></td>
		<?php
			 }
			 ?>
		</tr><br>
		</table>
		</div>
	</div>

</body>
<?php include("includes/footer-area.php")?>
</html>