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
////execute query
//print_r($_SESSION);
//echo "<br>";
//print_r($_GET);
//echo "<br>";
//print_r($_POST);
//echo "<br>";
?>

<!--Table Headers-->
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
        <th>Rental History</th>
        <th>Number of Rentals</th>
    </tr>
    <?php
    // populate table
    $query = "SELECT * FROM cars";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "could not connect";
    }
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['vehicle_identification_number'] . "</td>";
        $vin = $row['vehicle_identification_number'];
        echo "<td>" . $row['make'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['street_no'] . "</td>";
        echo "<td>" . $row['street_name'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['zip_code'] . "</td>";
        echo '<td><button onclick="location.href = "history.php?vin=' . $vin . '">click me</button></td>';
        echo "<td>num</td>";
        echo "</tr>";

    }
    ?>

</table>
<h2>Filters:</h2>
<!-- Radio buttons -->
<div style="border: solid black; padding: 5px;">
    <form action="searchByAddress.php" method="post">
        <input type="text" name="street num" placeholder="street num">
        <input type="text" name="street name" placeholder="street name">
        <input type="text" name="city" placeholder="city">
        <input type="text" name="state" placeholder="state">
        <input type="text" name="zip" placeholder="zip">
        <input type="submit" value="filter">
    </form>
</div>
</body>
</html>