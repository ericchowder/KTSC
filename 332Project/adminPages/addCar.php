<!DOCTYPE HTML>
<html>
<head>
    <title>Add car</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
<?php
//Create a user session or resume an existing one
session_start();

?>
<?php
if (isset($_POST['carbtn'])) {

    // include database connection
    include_once '../config/connection.php';

    if (!$con) {
        die("Could not connect:" . mysqli_error());
    }

    $vin = $_POST['vin'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $streetn = $_POST['streetn'];
    $streetname = $_POST['streetname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $fee = $_POST['fee'];

    $sql = "INSERT INTO cars" .
        "(vehicle_identification_number,make,model,year,street_no,street_name,city,state,zip_code,daily_rental_fee)" .
        "VALUES('$vin','$make','$model','$year','$streetn','$streetname','$city','$state','$zip','$fee')";

    mysqli_select_db($con, "project") or die (mysqli_error());

    $retval = mysqli_query($con, $sql);

    if ($retval) {
        echo "Records added successfully.";
    }

    if (!$retval) {
        die('Could not enter data. ' . mysql_error());


    }
    mysqli_close($con);


}
?>


<div class="center">
    <form name='registration' id='registration' method='post'>
        <table border='0'>
            <tr>
                <td>Vehicle Identification Number</td>
                <td><input type='text' name='vin' id='vin' required//></td>
            </tr>

            <tr>
                <td>Make</td>
                <td><input type='text' name='make' id='make' required//></td>
            </tr>

            <tr>
                <td>Model</td>
                <td><input type='text' name='model' id='model' required//></td>
            </tr>

            <tr>
                <td>Year</td>
                <td><input type='text' name='year' id='year' required//></td>
            </tr>

            <tr>
                <td>Street number</td>
                <td><input type='text' name='streetn' id='streetn' required//></td>
            </tr>

            <tr>
                <td>Street Name</td>
                <td><input type='text' name='streetname' id='streetname' required//></td>
            </tr>

            <tr>
                <td>City</td>
                <td><input type='text' name='city' id='city' required//></td>
            </tr>

            <tr>
                <td>State</td>
                <td><input type='text' name='state' id='state' required//></td>
            </tr>

            <tr>
                <td>Zip Code</td>
                <td><input type='text' name='zip' id='zip' required//></td>
            </tr>

            <tr>
                <td>Daily Rental Fee</td>
                <td><input type='text' name='fee' id='fee' required//></td>
            </tr>

            <tr>
                <td></td>
                <td><input type='submit' id='carbtn' name='carbtn' value='Add'/></td>
            </tr>
        </table>
    </form>

</div>
</body>
</html>