<!DOCTYPE HTML>
<html>
<head>
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<h1>Administrator Homepage.</h1>
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

<form action="memberList.php" method="GET">
	<input value='Member List' type='submit' id='memberbutton' name='memberbutton'/>
</form>
<br><br>
<form action='carList.php' method="GET">
	<input value='Car List' type='submit' id='carbutton' name='carbutton'/>
</form>

<p><a href="carList.php">Car List</a>
</p>
<p>Reservations on <input type="date"> <input type="button" value="Search"></p>
</body>
</html>
