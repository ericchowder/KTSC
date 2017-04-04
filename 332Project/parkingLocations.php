<!DOCTYPE HTML>
<html>
<head>
    <title>Parking Locations Page</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
 <?php
  //Create a user session or resume an existing one
 session_start();
 ?>
 
 <?php
 
 include_once 'config/connection.php'; 
	
 
 $query = "SELECT * FROM parking_locations";
 
 $result = mysqli_query($con,$query);
 $res = mysqli_fetch_array($result);
 
 //echo print_r($res)
 
 echo $res['0']
?>
 
 
 </body>
 </html>
