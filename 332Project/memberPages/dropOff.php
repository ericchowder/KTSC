<!DOCTYPE HTML>
<html>
<head>
    <title>Drop Off Confirmation</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
 <?php
  //Create a user session or resume an existing one
 session_start();
 include_once "../config/connection.php"; //$con variable
 $VIN = $_SESSION['VIN'];

 ?>
 <?php
	if($VIN){
	$qrt = "delete 
			from reservations
			where vehicle_identification_number=".$VIN;
			
	$retval=mysqli_query($con,$qrt);
	
	if(!$retval){
		die("Could not delete data.".mysqli_error());
	}
	echo("Your car has been successfully dropped off.");

	
	}
	if(!$VIN){	
	echo ("You have no outstanding orders.");
	}
 ?>
 
<div class="corner">
    <form action="../index.php" method="GET">
        <input value='Logout' type='submit' id='logoutbutton'
               name='logoutbutton'/>
    </form>

    <br>
    <br>
    <form action="HomePage.php" method="GET">
        <input value='HomePage' type='submit' id='homepage'
               name='homepage'/>
    </form>
</div>
 
 </body>
</html>