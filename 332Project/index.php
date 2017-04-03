<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome KTCS</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<div class="corner">
    <a href="registration.php">Register</a>
</div>
<div class="center">
    <form name='login' id='login' action='index.php' method='post'>
        <table>
            <tr>
                <td>Username</td>
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