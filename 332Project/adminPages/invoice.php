<HTML>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<?php
//Create a user session or resume an existing one
session_start();

include_once "../config/connection.php"; //$con variable
//execute query
//Finding Member and Reservation Number
	$query = "SELECT ktcs_members.member_no,ktcs_members.first_name,ktcs_members.last_name, 
	reservations.reservation_no FROM ktcs_members INNER JOIN reservations 
	ON reservations.member_no=23333334;";
	$result = mysqli_query($con, $query);
	//Finding Start Date
	$sDateQuery = "SELECT reservations.date FROM reservations INNER JOIN ktcs_members
	ON reservations.member_no=23333334;";
	$sDateResult = mysqli_query($con, $sDateQuery);
	//Finding End Date
	$rDateQuery = "SELECT reservations.date_of_return FROM reservations INNER JOIN ktcs_members
	ON reservations.member_no=23333334;";
	$rDateResult = mysqli_query($con, $rDateQuery);
	//Car Daily Rental Fee
	$feeQuery = "SELECT cars.daily_rental_fee FROM cars INNER JOIN reservations
	ON cars.vehicle_identification_number=12345;";
	$feeResult = mysqli_query($con, $feeQuery);
?>
<div class="corner">
    <a href="../index.php">Logout</a>
	<br>
	<a href="HomePage.php">Homepage</a>
	
</div>

<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//$fName = $row["first_name"];
        echo "Customer: " . $row["first_name"]. " " . $row["last_name"]. " <br> Reservation no: " .
		$row["reservation_no"] . "<br>";
    }
	while($row = mysqli_fetch_assoc($sDateResult)) {
		$sDate = $row["date"];
		echo "Start Date: " . $row["date"] . "<br>";
	}
	while($row = mysqli_fetch_assoc($rDateResult)) {
		$rDate = $row["date_of_return"];
		echo "Return Date: " . $row["date_of_return"] . "<br>";
	}
		while($row = mysqli_fetch_assoc($feeResult)) {
		$dailyFee = $row["daily_rental_fee"];
		//echo "Daily fee of Car is: " . $row["daily_rental_fee"] . "<br>";
	}
	$sDate2=date_create($sDate);
	$rDate2=date_create($rDate);
	$dateDiff = date_diff($sDate2,$rDate2);
	echo $dateDiff->format("Total days wtih car: %a days <br>");
	$days = $dateDiff->format("%a");
	$totalCost = $dailyFee * $days;
	echo "Your total cost for the month is: $" . $totalCost . "<br>"; 
} else {
    echo "0 results";
}

mysqli_close($con);
?>