<?php
echo "hello World<br>";

// starts session using connection.php in config directory
session_start();
include_once '../config/connection.php';
if (!$con) {
    die ("connection did not work");
} else {
    echo $con;
    echo "<br>";
}

$q = "INSERT INTO 'testtable' ('ID', 'FName', 'LName') VALUES (NULL, 'Kevin', 'Chan')";
$result = $con->query($q);

if ($result == ''){
    echo "did not work";
}
echo $result;
