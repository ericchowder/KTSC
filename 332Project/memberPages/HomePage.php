<!DOCTYPE HTML>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<body>
 <?php
  //Create a user session or resume an existing one
 session_start();

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
	if(isset($GET['logoutbutton']))
	{
		echo("hi");
		
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

<form action="rentalHistory.php" method="POST">
	<input value='My rental history' type='submit' id='rentalbutton' name='rentalbutton'/>
</form>

<form action="AvailCars.php">
<p>Available cars on <input type="date" name="date" onclick="AvailCars.php">
    <input type="submit" value="SUBMIT" method="GET">
</p>
</form>
</body>