<!DOCTYPE HTML>
<html>
<head>
    <title>Reservation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<h1 class="carTitle">Book your car.</h1>

<?php

session_start();
include_once "../config/connection.php"; //$con variable
$member = $_SESSION['id'];

?>

<?php

if (isset($_POST['carBtn'])) {
    $id = $_SESSION['VIN'];

    $query = "SELECT daily_rental_fee
			  FROM cars
			  WHERE vehicle_identification_number='" . $id . "'";

    $first_result = mysqli_query($con, $query);

    $row = mysqli_fetch_array($first_result);

    $fee = $row['daily_rental_fee'];

    $GLOBALS['a'] = '$fee';
}
?>

<?php
if (isset($_POST['rentBtn'])) {

    if (!$con) {
        die("Could not connect:" . mysqli_error());
    }

    $qrt = "SELECT member_no
		   FROM ktcs_members
		   WHERE ktcs_members.driving_licence_no='" . $member . "'";
    $rts = mysqli_query($con, $qrt);

    $rs = mysqli_fetch_array($rts);
    $starting_date = $_POST['pickup'];
    $end_date = $_POST['dropoff'];
    $vin = $_SESSION['VIN'];
    $member_no = $rs['member_no'];
    echo($member_no);

    $query = "INSERT INTO reservations " .
        "(member_no,vehicle_identification_number,date,date_of_return)" .
        "VALUES('$member_no','$vin','$starting_date','$end_date')";

    mysqli_select_db($con, "project") or die (mysqli_error());

    $retval = mysqli_query($con, $query);

    if ($retval) {
        echo "Records added successfully.";
    }

}
?>
<script>
    function differenceInDate() {
        var price = document.getElementById("carPrice").innerHTML;

        var date1 = new Date(document.getElementById("pickup").value);
        var date2 = new Date(document.getElementById("dropoff").value);
        console.log(date1);
        console.log(date2);
        var difference = parseInt((date2 - date1) / (1000 * 60 * 60 * 24));

        document.getElementById("total").innerHTML = difference;
        document.getElementById("totalprice").innerHTML = difference * price;
    }

</script>

<form method="POST">
    <p>Select date of pick-up <input id='pickup' name='pickup' type='date' name='pickupdate'</p>
    <br>
    <p>Select date of drop-off <input id='dropoff' name='dropoff' type='date' name='dropoffdate'
                                      oninput="differenceInDate()"</p>
    <p>Price: $<span id="carPrice"><?php echo $fee ?></span> per day for the selected car.</p>

    <!--<input type="number" value="1" min="1" oninput="update()"> days</p>-->
    <p>Total of days selected: <span id="total"></span></p>
    <p>Total price: $<span id="totalprice"></span></p>

    <input type='submit' id='rentBtn' name='rentBtn' value="Rent">
</form>
</body>
</html>