<!DOCTYPE HTML>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
 <?php
  //Create a user session or resume an existing one
 session_start();
 include_once "../config/connection.php"; //$con variable
	
	
 echo("Welcome back ");
 $name = $_SESSION['id'];
 ?>
 
 <?php

 //check if the user clicked the logout link and set the logout GET parameter
	if(isset($_POST['loginBtn'])){
	 $_SESSION['id']=$_POST['username'];
	 echo($_SESSION['id']);
	//Destroy the user's session.
	//$_SESSION['id']=null;
	//header("Location: index.php");

 }
 ?>


<h1>KTSC</h1>
<div class="corner">
<form action="../index.php"  method="GET">
    <input value='Logout' type='submit' id='logoutbutton' name='logoutbutton'/>
</form>
</div>

<form action="parkingLocations.php" method="GET">
	<input value='Parking Locations' type='submit' id='parkingbutton' name='parkingbutton'/>
</form>
<br><br>
<form action="rentalHistory.php" method="POST">
	<input value='My rental history' type='submit' id='rentalbutton' name='rentalbutton'/>
</form>
<br>
<form action="AvailCars.php">
<p>Available cars on <input type="date" name="date" onclick="AvailCars.php">
    <input type="submit" value="SUBMIT" method="GET">
</p>
<br><br>
</form>

<?php
	
	$query = "SELECT vehicle_identification_number,date,date_of_return
			  FROM reservations
			  WHERE reservations.member_no=". $name;

	$retval = mysqli_query($con, $query);
	
	if(!$retval){
		die("Could not fetch data.".mysqli_error());
	}
	$row = mysqli_fetch_array($retval);
	
	$_SESSION['VIN']=$row['vehicle_identification_number'];
	$_SESSION['date']=$row['date'];
	$_SESSION['date_of_return']=$row['date_of_return'];
	
	echo("<br/>");
	if($row){
	echo("You have an outstanding order.");
	echo("<br/>");
	echo("Vehicle identification number :".$row['vehicle_identification_number']);
	echo("<br/>");
	echo("Pick up date :".$row['date']);
	echo("<br/>");
	echo("Expected drop off date ".	;4
	7$row['date_of_return']);
	echo("<br/>");
	}
?>
<br>
<form action="dropOff.php" method="POST">
	<input value='Drop off car now.' type='submit' id='rentalbutton' name='rentalbutton'/>
</form>
</body>
