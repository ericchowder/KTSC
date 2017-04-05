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
	
	
	$first = $_POST['first'];
	$second = $_POST['second'];
	$streetNum = $_POST['streetNum'];
	$streetName = $_POST['streetName'];
	$aptNum = $_POST['aptNum'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$driving = $_POST['driving'];
	$membership = 9.9;
	
	
	/*
	$first = mysqli_real_escape_string($con,$_REQUEST['first']);
	$second = mysqli_real_escape_string($con,$_REQUEST['second']);
	$streetNum = mysqli_real_escape_string($con,$_REQUEST['streetNum']);
	$streetName = mysqli_real_escape_string($con,$_REQUEST['streetName']);
	$aptNum = mysqli_real_escape_string($con,$_REQUEST['aptNum']);
	$city = mysqli_real_escape_string($con,$_REQUEST['city']);
	$state = mysqli_real_escape_string($con,$_REQUEST['state']);
	$zip = mysqli_real_escape_string($con,$_REQUEST['zip']);
	$phone = mysqli_real_escape_string($con,$_REQUEST['phone']);
	$email = mysqli_real_escape_string($con,$_REQUEST['email']);
	$driving = mysqli_real_escape_string($con,$_REQUEST['driving']);
	$membership = 9.99;
	*/
	
	$sql = "INSERT INTO ktcs_members ".
	       "(first_name,last_name,street_no,street_name,apt_number,city,state,zip_code,phone_number,email,driving_licence_no,annual_membership_fee)".
	"VALUES ('$first','$second','$streetNum','$streetName','$aptNum','$city','$state','$zip','$phone','$email','$driving','$membership')";

	mysqli_select_db($con,"project") or die (mysqli_error());


	$retval=mysqli_query($con,$sql);

	if($retval){echo "Records added successfully.";
	
	
	$qry = ("SELECT member_no FROM ktcs_members WHERE first_name='$first'");
	$query = mysqli_query($con,$qry);
	
	$result = mysqli_fetch_array($query);
	
	echo "Thank you for registering\n";
	echo "Your login details are\n";
	
	echo $result['member_no'];
	}

	if(!$retval){
		die('Could not enter data. '. mysql_error());
		
		
	}
	mysqli_close($con);
 }
?>

<div class="corner">
    <a href="index.php">Log-in</a>
</div>

<div class="center">
    <form name='registration' id='registration' action='registration.php' method='post'>
        <table border='0'>
            <tr>
                <td>First name</td>
                <td><input type='text' name='first' id='first' required//></td>
            </tr>

            <tr>
                <td>Last name</td>
                <td><input type='text' name='second' id='second' required//></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='text' name='email' id='email' required//></td>
            </tr>

            <tr>
                <td>Driver's license Number</td>
                <td><input type='text' name='driving' id='driving' required//></td>
            </tr>

            <tr>
                <td>Phone number</td>
                <td><input type='text' name='phone' id='phone' required//></td>
            </tr>

            <tr>
                <td>Street Number</td>
                <td><input type='text' name='streetNum' id='streetNum' required//></td>
            </tr>

            <tr>
                <td>Street Name</td>
                <td><input type='text' name='streetName' id='streetName' required//></td>
            </tr>

            <tr>
                <td>Apt Number</td>
                <td><input type='text' name='aptNum' id='aptNum' required//></td>
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
                <td>ZIP</td>
                <td><input type='text' name='zip' id='zip' required//></td>
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
