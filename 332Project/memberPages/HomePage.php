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
	//Destroy the user's session.
	//$_SESSION['id']=null;
	//header("Location: index.php");
}
 ?>

<h1>KTSC</h1>
<div class="corner">
    <a href="../index.php">Logout</a>
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