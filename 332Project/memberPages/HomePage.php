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
 $_SESSION['id']=$_POST['username'];
 ?>
 
  <?php

 //check if the user clicked the logout link and set the logout GET parameter
	if(isset($_POST['loginBtn'])){
	//Destroy the user's session.
	//$_SESSION['id']=null;
	//header("Location: index.php");
}
 ?>

<h1>KTSC</h1>
<div class="corner">
<form action="../index.php"  method="GET">
    <input value='Logout' type='submit' id='logoutbutton' name='logoutbutton'</a>
</form>
</div>

<p>
    <a href="parkingLocations.php">Parking Locations</a>
</p>
<p>
    <a href="rentalHistory.php">My rental History</a>
</p>

<form action="AvailCars.php">
<p>Available cars on <input type="date" name="date" onclick="AvailCars.php">
    <input type="submit" value="SUBMIT" method="GET">
</p>
</form>
</body>