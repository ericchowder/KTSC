<!--KTCS
OUR FILE-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome KTCS</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>


<?php
//Create a user session or resume an existing one
session_start();
?>

<?php
//check if the user clicked the logout link and set the logout GET parameter
if (isset($_GET['logoutbutton'])) {
    //Destroy the user's session.
	echo ("You have successfully logged out.");
    $_SESSION['id'] = null;
    session_destroy();
}
?>

	<br><br>
<?php
//check if the login form has been submitted
if (isset($_POST['loginBtn'])) {

    // include database connection
    include_once 'config/connection.php';

    // SELECT query
    $query = "SELECT member_no, first_name, driving_licence_no, administrator FROM ktcs_members WHERE driving_licence_no=? AND member_no=?";

    // prepare query for execution
    if ($stmt = $con->prepare($query)) { 

        // bind the parameters. This is the best way to prevent SQL injection hacks. ss means the two parameters are strings.
        $stmt->bind_Param("ss", $_POST['username'], $_POST['password']);

        // Execute the query
        $stmt->execute();

        // Get Results
        $result = $stmt->get_result();

        // Get the number of rows returned
        $num = $result->num_rows;;

        if ($num > 0) {
            //If the username/password matches a user in our database
            //Read the user details
            $myrow = $result->fetch_assoc();
            //Create a session variable that holds the user's id
            $_SESSION['id'] = $myrow['member_no'];
			$_SESSION['driving']=$myrow['driving_licence_no'];
			$_SESSION['name']=$myrow['first_name'];
			print_r($_SESSION);
            //Redirect the browser to the profile editing page and kill this page.
            //echo(print_r($_SESSION));
			echo($myrow['administrator']);
			if($myrow['administrator']==0)
			{
			header("Location: memberPages/HomePage.php");
			die();
			}
			if($myrow['administrator']==1){
			header("Location: adminPages/AdminHomePage.php");
			die();
			}
				
        } else {
            //If the username/password doesn't matche a user in our database
            // Display an error message and the login form
            echo "Failed to login: incorrent details.";
        }
    } else {
        echo "Failed to prepare the SQL";
    }
}

?>

<!-- dynamic content will be here -->
<div class="corner">
    <a href="registration.php">Register</a>
</div>
<div class="center">
    <form name='login' id='login' method='POST'>
        <table>
            <tr>
                <td>Driver's Licence:</td>
                <td><input type='text' name='username' id='username'/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type='password' name='password' id='password'/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' id='loginBtn' name='loginBtn' value='Log In'/>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
