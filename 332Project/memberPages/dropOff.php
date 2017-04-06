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
 print_r($_SESSION);
 ?>
 <?php
 
	$qrt = "delete 
			from reservations
			where reservations.vehicle_identification_number=".$VIN;
			
	$retval=mysqli_query($con,$qrt);
	
	if($retval){
		die("Could not delete data.".mysqli_error());
		
	}
 
 ?>
 <h1>Your car has been successfully dropped off.</h1>
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