<!DOCTYPE HTML>
<html>
<head>
    <title>Reservation</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<div class="corner">
    <form action="../index.php" method="GET">
        <input value='Logout' type='submit' id='logoutbutton'
               name='logoutbutton'/>
    </form>

    <br>
    <br>
    <form action="AdminHomePage.php" method="GET">
        <input value='HomePage' type='submit' id='homepage'
               name='homepage'/>
    </form>
</div>
<h1>List of all cars</h1>
<?php
session_start();
include_once "../config/connection.php"; //$con variable
$stNum = $_POST['street_num'];
$stName = $_POST['street_name'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$q = "SELECT * FROM cars WHERE street_no=$stNum AND street_name=$stName AND city=$city AND state=$state AND zip_code=$zip;";
$result = mysqli_query($con, $q);
if (!$result || mysqli_fetch_array($result) <= 0) {
    die("please fill in all values");
}

?>
<table border="1">
    <tr>
        <th>VIN</th>
        <th>Make</th>
        <th>Model</th>
        <th>year</th>
        <th>Street Num</th>
        <th>Street Name</th>
        <th>City</th>
        <th>State</th>
        <th>ZIP</th>
    </tr>
    <?php

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['vehicle_identification_number'] . "</td>";
        echo "<td>" . $row['make'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['street_no'] . "</td>";
        echo "<td>" . $row['street_name'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['zip_code'] . "</td>";
        echo "<td><button>click me</button></td>";
        echo "<td>num</td>";
        echo "</tr>";
    }
    ?>
</table>
