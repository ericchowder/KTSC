<!DOCTYPE HTML>
<html>
<head>
    <title>Rental History</title>
	 <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<?php
//Create a user session or resume an existing one
session_start();
if(isset($_POST['rentalbutton'])){
$driving_licence=$_SESSION['id'];
}
?>

<?php 
include_once "../config/connection.php"; //$con variable
//execute query

$first_query = "SELECT member_no,first_name,driving_licence_no
				FROM ktcs_members
				WHERE ktcs_members.driving_licence_no='".$driving_licence."'";

$first_result = mysqli_query($con,$first_query);


?>
<h1>My Rental History.</h1>

<!--Table Headers-->
<table border="1">
    <tr>
        <th>Make</th>
        <th>Model</th>
        <th>Date of pickup</th>
        <th>Date of return</th>

    </tr>
    <?php
    // populate table
    while($row = mysqli_fetch_array($first_result)){

		$member_no=$row['member_no'];
		
		$second_query = "SELECT vehicle_identification_number
						 FROM member_rental_history
						 WHERE member_rental_history.member_no='".$member_no."'";
		$second_result = mysqli_query($con,$second_query);
				
		$col = mysqli_fetch_array($second_result);

		if($col){

		$vehicle_identification_number=$col['vehicle_identification_number'];

		$third_query = "SELECT date,date_of_return,make,model
						FROM	reservations natural join cars
						WHERE vehicle_identification_number='".$vehicle_identification_number."'";
		$third_result= mysqli_query($con,$third_query);
		
		$diag = mysqli_fetch_array($third_result);
		
		echo "<tr>\n";
		echo "<td>" . $diag["make"] . "</td>\n";
		echo "<td>" . $diag["model"] . "</td>\n";
		echo "<td>" . $diag["date"] . "</td>\n";
		echo "<td>" . $diag["date_of_return"] . "</td>\n";
		echo "</tr>\n";
		}

		//$row["member_no"] prints 1

    }
    ?>
	


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
