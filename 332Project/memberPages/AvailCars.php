<body>
<?php
//Create a user session or resume an existing one
session_start();

include_once "config/connection.php"; //$con variable
//execute query
$query = "SELECT * FROM cars";
$result = mysqli_query($con, $query);
?>


<h1>List of all available cars <?php 
	if($_GET['date'])
	echo "on ";
	echo $_GET['date'];
?>.<h1>

<!--Table Headers-->
<table border="1">
    <tr>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
        <th>City</th>
        <th>State</th>

    </tr>
<?php
// populate table
 
while($row = mysqli_fetch_array($result)){
	$vin=$row[""];
	
	$qrt = "SELECT date,date_of_return 
	FROM reservations 
	WHERE reservations.vehicle_identification_number=".$vin;
	$rst = mysqli_query($con,$qrt);vehicle_identification_number
	
	/*
	if($row["rented_to"]=="null"){
    echo "<tr>\n";
    echo "<td>" . $row["make"] . "</td>\n";
    echo "<td>" . $row["model"] . "</td>\n";
    echo "<td>" . $row["year"] . "</td>\n";
    echo "<td>" . $row["city"] . "</td>\n";
    echo "<td>" . $row["state"] . "</td>\n";

    echo "</tr>\n";
	}
	
	else{
	*/
	$res= mysqli_fetch_array($rst);
		
		
	if($rst["date"]>$_GET["date"]){
    echo "<tr>\n";	
	echo "<td>" . $row["make"] . "</td>\n";
	echo "will be available on";
	echo "<td>" . $res["date"] . "</td>\n";
	}
}

?>
</table>


</body>
</html>
