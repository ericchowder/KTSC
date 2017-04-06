<!DOCTYPE HTML>
<html>
<head>
	<h1>Administrator Homepage.</h1>
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
 <?php
  //Create a user session or resume an existing one
 session_start();
 echo("Welcome back ");
 echo($_SESSION['name']);
 ?>
 
<div class="corner">
<form action="../index.php"  method="GET">
    <input value='Logout' type='submit' id='logoutbutton' name='logoutbutton'/>
</form>
</div>

<p><a href="memberList.php">Member List</a>
</p>
<p><a href="carList.php">Car List</a>
</p>
<p>Reservations on <input type="date"> <input type="button" value="Search"></p>
</body>
</html>
