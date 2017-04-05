<!DOCTYPE HTML>
<html>
<head>
    <title>Parking Locations Page</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<?php
//Create a user session or resume an existing one
session_start();

include_once "../config/connection.php"; //$con variable
//execute query
$query = "SELECT * FROM parking_locations";
$result = mysqli_query($con, $query);
?>

<h1>List of all parking locations</h1>

<!--Table Headers-->
<table border="1">
    <tr>
        <th>Street Num</th>
        <th>Street Name</th>
        <th>Apt Num</th>
        <th>City</th>
        <th>State</th>
        <th>ZIP</th>
        <th>Num of Spaces</th>
    </tr>
    <?php
    // populate table
    while ($row = mysqli_fetch_array($result)) {
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
<div class="corner">
    <form action="../index.php" method="GET">
        <input value='Logout' type='submit' id='logoutbutton'
               name='logoutbutton'/>
    </form>

    <br>
    <br>
    <form action="HomePage.php" method="GET">
        <input value='HomePage' type='submit' id='homepage'
               name='homepage'/>
    </form>
</div>

</body>
</html>
