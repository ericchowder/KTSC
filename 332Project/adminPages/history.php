<!--Table Headers-->
<table border="1">
    <tr>
        <th>VIN</th>
        <th>Make</th>
        <th>Model</th>
        <th>year</th>
        <th>Street Num</th>
        <th>Street Name</th>
        <th>City</th>
        <th>State</th>
        <th>ZIP</th>
    </tr>
    <?php
    session_start();
    include_once "../config/connection.php"; //$con variable
    $id = 12345;
    $q = "SELECT * FROM cars WHERE vehicle_identification_number=$id";
    $result = mysqli_query($con, $q);
    if (!$result) {
        echo "could not connect";
    }
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['vehicle_identification_number'] . "</td>";
        $vin = $row['vehicle_identification_number'];
        echo "<td>" . $row['make'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['street_no'] . "</td>";
        echo "<td>" . $row['street_name'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['zip_code'] . "</td>";
    }
    ?>
</table>