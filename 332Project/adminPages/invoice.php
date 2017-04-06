<HTML>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css">

</head>
<body>
<div class="corner">
    <a href="../index.php">Logout</a>
    <br>
    <a href="AdminHomePage.php">Homepage</a>
</div>

<?php
session_start();
include_once "../config/connection.php"; //$con variable

print_r($_POST);
//$_POST['memID'];
$query = "SELECT * FROM (SELECT ktcs_members.member_no,ktcs_members.first_name,ktcs_members.last_name, reservations.reservation_no, reservations.date, reservations.date_of_return, reservations.vehicle_identification_number FROM ktcs_members NATURAL JOIN reservations WHERE reservations.member_no=23333334) AS one  NATURAL JOIN  (SELECT DISTINCT reservations.vehicle_identification_number, cars.daily_rental_fee FROM reservations NATURAL JOIN cars) AS two;";
$result = mysqli_query($con, $query);
?>
<table border="1">
    <tr>
        <th>VIN</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Reservation Num</th>
        <th>Pickup Date</th>
        <th>Dropoff Date</th>
        <th>Daily Rental Fee</th>
        <th>Days with car</th>
    </tr>
    <?php
    $subtotal = 0;
    if (!$result) {
        echo "false";
    } else if (mysqli_num_rows($result) <= 0) {
        echo "no result";
    } else {
        // output data of each row
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>\n";
            echo "<td>" . $row["reservation_no"] . "</td>\n";
            echo "<td>" . $row["first_name"] . "</td>\n";
            echo "<td>" . $row["last_name"] . "</td>\n";
            echo "<td>" . $row["vehicle_identification_number"] . "</td>\n";
            echo "<td>" . $row["date"] . "</td>\n";
            echo "<td>" . $row["date_of_return"] . "</td>\n";
            echo "<td>" . $row["daily_rental_fee"] . "</td>\n";

            $sDate2 = date_create($row["date"]);
            $rDate2 = date_create($row["date_of_return"]);
            $dateDiff = date_diff($sDate2, $rDate2);
			$cost1 = $row["daily_rental_fee"];
			$cost2 = $dateDiff->format("%a");
            echo "<td>" . $dateDiff->format("%a") . "</td>";
			$finalCost = $cost1 * $cost2;
			echo "<p>" . "Your monthly cost is: $" . $finalCost . "<br>" . "</p>";
        }
    }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>subtotal number</td>
    </tr>

</table>
<p>Total: <span>placeholder_text</span></p>
</body>
</HTML>