<!DOCTYPE HTML>
<html>
<head>
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<h1>Administrator Homepage.</h1>
<?php
session_start();
include_once "../config/connection.php"; //$con variable
if ($_SESSION) {
    echo("Welcome back ");
}
?>


<br><br>
<div class="corner">
    <form action="../index.php" method="GET">
        <input value='Logout' type='submit' id='logoutbutton' name='logoutbutton'>
    </form>
</div>

<form action="memberList.php" method="GET">
    <input value='Member List' type='submit' id='memberbutton' name='memberbutton'>
</form>
<br><br>
<form action='carList.php' method="GET">
    <input value='Car List' type='submit' id='carbutton' name='carbutton'>
</form>
<br><br>
</body>
</html>