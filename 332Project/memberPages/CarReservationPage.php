<!DOCTYPE HTML>
<html>
<head>
	<h1 class="carTitle">Book your car.</h1>
    <title>Reservation</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>

<?php

session_start();
include_once "../config/connection.php"; //$con variable

?>

<?php 

if(isset($_POST['carBtn'])){
	$id=$_SESSION['VIN'];

}
?>

<?php
	$query = "SELECT daily_rental_fee
			  FROM cars
			  WHERE vehicle_identification_number='".$id."'";
			  
	$first_result = mysqli_query($con,$query);
	
	$row=mysqli_fetch_array($first_result);
	
	$fee=$row['daily_rental_fee'];

?>

<script>
	function differenceInDate()
	{
		var price=document.getElementById("carPrice").innerHTML;

		var date1= new Date(document.getElementById("pickup").value);
		var date2= new Date(document.getElementById("dropoff").value);
		console.log(date1);
		console.log(date2);
		var difference=parseInt((date2-date1)/(1000*60*60*24));	
		
		document.getElementById("total").innerHTML=difference;
		document.getElementById("totalprice").innerHTML=difference*price;
	}
</script>

<form method="POST">
<p>Select date of pick-up <input id="pickup" type="date" name="pickupdate" </p>
<br>
<p>Select date of drop-off <input id="dropoff" type="date" name="dropoffdate" oninput="differenceInDate()"</p>


</form>

<p>Price: $<span id="carPrice" ><?php echo($fee) ?></span> per day for the selected car.</p>

<!--<input type="number" value="1" min="1" oninput="update()"> days</p>-->

<p>Total of days selected: <span id="total">
</span></p>

<p>Total price: $<span id="totalprice">
</span></p>
<input type="button" value="Rent">

</body>
</html>
