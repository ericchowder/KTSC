<!DOCTYPE HTML>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
 <?php
  //Create a user session or resume an existing one
 session_start();
 ?>
 
<?php
//check if the login form has been submitted
if(isset($_POST['regBtn'])){
 
    // include database connection
    include_once 'config/connection.php'; 
	
	if(!$con)
	{
		die("Could not connect:".mysqli_error());
	}
	
	
	$aptNum = $_POST['aptNum'];
	$city = $_POST['city'];
	$driving = $_POST['driving'];
	$email = $_POST['email'];
	$first = $_POST['first'];
	$second = $_POST['second'];
	$phone = $_POST['phone'];
	$state = $_POST['state'];
	$streetName = $_POST['streetName'];
	$streetNum = $_POST['streetNum'];
	$zip = $_POST['zip'];
		
	$sql = "INSERT INTO ktcs_members".
	"(apt_number,city,driving_licence_no,email,
	first_name,last_name,phone_number,state,street_name,street_no,zip_code)".
	"VALUES ('$aptNum','$city','$driving','$email','$first','$second','$phone','$state','$streetName','$streetNum','$zip')";
	

	if(!$con){
		die('Could not enter data:' .mysqli_error());
	}
	
	mysqli_select_db($con,"project") or die (mysqli_error());

	
	($con->close());
 }
?>

<div class="corner">
    <a href="index.php">Log-in</a>
</div>

<div class="center">
    <form name='registration' id='registration' action='registration.php' method='post'>
        <table border='0'>
            <tr>
                <td>Username</td>
                <td><input type='text' name='username' id='username' required//></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type='password' name='password' id='password' required//></td>
            </tr>

            <tr>
                <td>First name</td>
                <td><input type='text' name='first' id='first'required//></td>
            </tr>

            <tr>
                <td>Last name</td>
                <td><input type='text' name='second' id='second'required//></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='text' name='email' id='email'required//></td>
            </tr>

            <tr>
                <td>Driver's license Number</td>
                <td><input type='text' name='driving' id='driving'required//></td>
            </tr>

            <tr>
                <td>Phone number</td>
                <td><input type='text' name='phone' id='phone'required//></td>
            </tr>

            <tr>
                <td>Street Number</td>
                <td><input type='text' name='streetNum' id='streetNum'required//></td>
            </tr>

            <tr>
                <td>Street Name</td>
                <td><input type='text' name='streetName' id='streetName'required//></td>
            </tr>

            <tr>
                <td>Apt Number</td>
                <td><input type='text' name='aptNum' id='aptNum'required//></td>
            </tr>

            <tr>
                <td>City</td>
                <td><input type='text' name='city' id='city'required//></td>
            </tr>

            <tr>
                <td>State</td>
                <td><input type='text' name='state' id='state'required//></td>
            </tr>

            <tr>
                <td>ZIP</td>
                <td><input type='text' name='zip' id='zip'required//></td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td><input type='text' name='phone' id='phone'required//></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='text' name='email' id='email'required//></td>
            </tr>

            <tr>
                <td></td>
                <td><input type='submit' id='regBtn' name='regBtn' value='Register'/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
