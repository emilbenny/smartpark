<?php
	//Get values pass from the form login.php
	$username=$_POST['user'];
	$password=$_POST['pass'];
        session_start();

	//Connection to the local server and selecting database
	$con=mysqli_connect("localhost", "root", "", "smartpark");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	//Query to check the username and password
	$result=mysqli_query($con,"select * from users where username='$username'and password='$password'");
				
	$row=mysqli_fetch_array($result);

	if ($row['username']==$username && $row['password']==$password){
                
                $_SESSION['userId'] = $row[0];
		echo "Login Success! Welcome Admin";
		header("Location: index.php");
		exit();
	}else{
                $_SESSION['userId'] = null;
		echo "Failed to login";
	}
	mysqli_close($con);
?>