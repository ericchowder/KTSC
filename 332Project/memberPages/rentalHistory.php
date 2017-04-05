<!DOCTYPE HTML>
<html>
<head>
    <title>Rental History</title>
</head>
<body>
<?php
//Create a user session or resume an existing one
session_start();
if (isset($_POST['rentalbutton'])) {
    $driving_licence = $_SESSION['id'];
}
?>

<?php
include_once "../config/connection.php"; //$con variable
//execute query

$first_query = "SELECT member_no,first_name,driving_licence_no
				FROM ktcs_members
				WHERE ktcs_members.driving_licence_no='" . $driving_licence . "'";

$first_result = mysqli_query($con, $first_query);


?>
<h1>My Rental History.</h1>

<!--Table Headers-->
<table border="1">
    <tr>
        <th>Make</th>
        <th>Model</th>
        <th>Pick up Odometer</th>
        <th>Drop off Odometer</th>
        <th>Status on Return</th>
    </tr>
    <?php
    // populate table
    while ($row = mysqli_fetch_array($first_result)) {

        $member_no = $row['member_no'];

        $second_query = "SELECT vehicle_identification_number
						 FROM member_rental_history
						 WHERE member_rental_history.member_no='" . $member_no . "'";
        $second_result = mysqli_query($con, $second_query);

        $col = mysqli_fetch_array($second_result);


        //$row["member_no"] prints 1
        echo "<tr>\n";
        echo "<td>" . $col["member_no"] . "</td>\n";
        echo "</tr>\n";
    }
    ?>

</table>

</body>
</html>
