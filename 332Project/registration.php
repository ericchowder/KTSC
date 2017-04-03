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
		die("Could not connect:".mysql_error());
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
	
	mysql_select_db('project');
	$retval=mysql_query($sql,$con);
	
	if(!$retval){
		die('Could not enter data:' .mysql_error());
	}
	
	echo "Entered data successfully";
	
	mysql_query($sql);
	
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
                <td>Username</td>
                <td><input type='text' name='username' id='username'/></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type='password' name='password' id='password'/></td>
            </tr>

            <tr>
                <td>First name</td>
                <td><input type='text' name='first' id='first'/></td>
            </tr>

            <tr>
                <td>Last name</td>
                <td><input type='text' name='second' id='second'/></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='text' name='email' id='email'/></td>
            </tr>

            <tr>
                <td>Driver's license Number</td>
                <td><input type='text' name='driving' id='driving'/></td>
            </tr>

            <tr>
                <td>Phone number</td>
                <td><input type='text' name='phone' id='phone'/></td>
            </tr>

            <tr>
                <td>Street Number</td>
                <td><input type='text' name='streetNum' id='streetNum'/></td>
            </tr>

            <tr>
                <td>Street Name</td>
                <td><input type='text' name='streetName' id='streetName'/></td>
            </tr>

            <tr>
                <td>Apt Number</td>
                <td><input type='text' name='aptNum' id='aptNum'/></td>
            </tr>

            <tr>
                <td>City</td>
                <td><input type='text' name='city' id='city'/></td>
            </tr>

            <tr>
                <td>State</td>
                <td><input type='text' name='state' id='state'/></td>
            </tr>

            <tr>
                <td>ZIP</td>
                <td><input type='text' name='zip' id='zip'/></td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td><input type='text' name='phone' id='phone'/></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='text' name='email' id='email'/></td>
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
