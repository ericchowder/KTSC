<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome KTCS</title>

</head>
<body>
<style>
    #loginDiv {
        width: 40em;
        margin-left: auto;
        margin-right: auto;
    }

    #regDiv {
        position: absolute;
        right: 0;
        top: 0;

        padding: 5px;
    }
</style>
<!-- dynamic content will be here -->
<div id="loginDiv" align='center'>
    <form name='login' id='login' action='index.php' method='post'>
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
                <td></td>
                <td>
                    <input type='submit' id='loginBtn' name='loginBtn' value='Log In'/>
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="regDiv">
    <a href="registration.php">Register</a>
</div>

</body>
</html>