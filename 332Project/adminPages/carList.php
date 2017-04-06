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
//execute query
$query = "SELECT * FROM cars";
$result = mysqli_query($con, $query);
if (!$result) {
    echo "could not connect";
}
?>

<!--Table Headers-->
<table border="1">
    <tr>
        <th>VIN</th>
        <th>Make</th>
        <th>Model</th>
        <th>year</th>
        <th>Street Number</th>




    </tr>
    <?php
    $counter = 0;
    // populate table
    while ($row = mysqli_fetch_array($result)) {
        $memberNum = $row['member_no'];
        $counter++;
        //        echo "<form action='invoice.php' method='post'>\n";
        echo "<tr>\n";
        echo "<td id='mem$counter'>" . $memberNum . "</td>\n";
        echo "<td>" . $row["first_name"] . "</td>\n";
        echo "<td>" . $row["last_name"] . "</td>\n";
        echo "<td>" . $row["street_no"] . "</td>\n";
        echo "<td>" . $row["street_name"] . "</td>\n";
        echo "<td>" . $row["apt_number"] . "</td>\n";
        echo "<td>" . $row["city"] . "</td>\n";
        echo "<td>" . $row["state"] . "</td>\n";
        echo "<td>" . $row["zip_code"] . "</td>\n";
        echo "<td>" . $row["phone_number"] . "</td>\n";
        echo "<td>" . $row["email"] . "</td>\n";
        echo "<td>" . $row["driving_licence_no"] . "</td>\n";
        //        echo "<td>" .
        //            "<input type='hidden' name='input$counter' value='" . $row['member_no'] . "'>" .
        //            "<input value='Generate' type='button' onclick='getVal($counter);'>" .
        //            "</td>";
        echo "<td>" .
            "<input type='radio' name='invoice' id='memInvoice' onclick='setVal($counter);'" .
            "/></td>";
        echo "</tr>\n";
        //        echo "</form>\n";
    }
    ?>

</table>
<h2>Filters:</h2>
<!-- Radio buttons -->
<input type="button" value="Add car">
</body>
</html>