<!DOCTYPE HTML>
<html>
<head>
    <title>Member List</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
<?php
//Create a user session or resume an existing one
session_start();

include_once "../config/connection.php"; //$con variable
//execute query
$query = "SELECT * FROM ktcs_members";
$result = mysqli_query($con, $query);
if (!$result) {
    echo "could not connect";
}

?>
<h1>List of all registered members.</h1>

<!--Table Headers-->
<table border="1">
    <tr>
        <th>Member Num</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Street Num</th>
        <th>Street Name</th>
        <th>Apt Num</th>
        <th>City</th>
        <th>State</th>
        <th>ZIP</th>
        <th>Phone Num</th>
        <th>Email</th>
        <th>License Number</th>
        <th>Invoice</th>
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
        echo "<td>" .
            "<input type='radio' name='invoice' id='invoiceBtn$counter' onclick='setVal($counter);'" .
            "></td>";
        echo "</tr>\n";
        //        echo "</form>\n";
    }
    ?>

</table>
<form action="invoice.php" method="POST">
    <input type="hidden" name="memID" id="memID">
    <input type="submit">
</form>
<script>
    function setVal(c) {
        $('#memID').val($('#mem' + c).html());
    }
    document.getElementById("invoiceBtn1").checked = true;
    setVal(1);
</script>

</body>
</html>

