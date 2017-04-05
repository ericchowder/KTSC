<!DOCTYPE HTML>
<html>
<head>
    <title>Rental History</title>
</head>
<body>
<?php
//Create a user session or resume an existing one
session_start();

echo ($_SESSION['id']);
?>

<?php 
include_once "../config/connection.php"; //$con variable
//execute query
$query = "SELECT  FROM member_rental_history NATURAL JOIN cars";
$result = mysqli_query($con, $query);
?>
<h1>My Rental History.</h1>

<?php
	print_r($_GET);
?>


<!--Table Headers-->
<table border="1">
    <tr>
        <th>Member Num</th>
        <th>ViN</th>
        <th>Piick up Odometer</th>
        <th>Drop off Odometer</th>
        <th>Status on Return</th>
    </tr>
    <?php
    // populate table
    while($row = mysqli_fetch_array($result)){
        echo "<tr>\n";
        echo "<td>" . $row["street_no"] . "</td>\n";
        echo "<td>" . $row["street_name"] . "</td>\n";
        echo "<td>" . $row["apt_number"] . "</td>\n";
        echo "<td>" . $row["city"] . "</td>\n";
        echo "<td>" . $row["state"] . "</td>\n";
        echo "<td>" . $row["zip_code"] . "</td>\n";
        echo "<td>" . $row["number_of_spaces"] . "</td>\n";
        echo "</tr>\n";
    }
    ?>
	
</table>

<?php

print_r ($_POST);
?>
</body>
</html>
