<html>
<head><title>KTCS Database</title></head>
<body>

<?php

$host = "localhost";
$user = "project332";
$password = "project332password";
$database = "project";

$cxn = mysqli_connect($host, $user, $password, $database);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$result = mysqli_query($cxn, "drop table reservations;");
if (!$result) {
    echo "could <strong>NOT</strong> drop reservations.";
}
$result = mysqli_query($cxn, "drop table rental_comments;");
if (!$result) {
    echo "could <strong>NOT</strong> drop rental_comments.";
}
$result = mysqli_query($cxn, "drop table member_rental_history;");
if (!$result) {
    echo "could <strong>NOT</strong> drop member_rental_history.";
}
$result = mysqli_query($cxn, "drop table KTCS_members;");
if (!$result) {
    echo "could <strong>NOT</strong> drop KTCS_members.";
}
$result = mysqli_query($cxn, "drop table car_maintainance_history;");
if (!$result) {
    echo "could <strong>NOT</strong> drop car_maintainance_hostory.";
}
$result = mysqli_query($cxn, "drop table car_rental_history;");
if (!$result) {
    echo "could <strong>NOT</strong> drop car_rental_history.";
}
$result = mysqli_query($cxn, "drop table cars;");
if (!$result) {
    echo "could <strong>NOT</strong> drop cars.";
}
$result = mysqli_query($cxn, "drop table parking_locations;");
if (!$result) {
    echo "could <strong>NOT</strong> drop parking_locations.";
}

$result = mysqli_query($cxn, "create table parking_locations
	(
	street_no								int(2),
	street_name								varchar(20),
	apt_number								int(2),
	city									varchar(20),
	state									varchar(20),
	zip_code								varchar(10),
	number_of_spaces						int(3),
	
	primary key (street_no,street_name,apt_number,city,state,zip_code));");

if (!$result) {
    echo "could <strong>NOT</strong> create parking_locations <br>";
} else {
    echo "parking_locations created.<br>";
}

$result = mysqli_query($cxn, "create table cars
   (
    vehicle_identification_number 			int(5) NOT NULL UNIQUE AUTO_INCREMENT,
	make   							    	varchar(20),
	model  						     		varchar(20),
	year 									int(4),
	street_no								int(2),
	street_name								varchar(20),
	city									varchar(20),
	state									varchar(20),
	zip_code								varchar(10),
    daily_rental_fee       				    numeric(2,0),
	primary key(vehicle_identification_number));");

if (!$result) {
    echo "could <strong>NOT</strong> create cars<br>";
} else {
    echo "cars created.<br>";
}

$result = mysqli_query($cxn, "create table car_rental_history
	(
	rental_id								int(20) NOT NULL UNIQUE AUTO_INCREMENT,
	vehicle_identification_number			int(5),
	member_no		    					varchar(20), 
	pick_up_odometer    					int(3),
	drop_off_odometer 	   			        int(3),
	status_on_return						varchar(10),
	primary key (rental_id));");


if (!$result) {
    echo "could <strong>NOT</strong> create car_rental_history<br>";
} else {
    echo "car_rental_history created.<br>";
}

$result = mysqli_query($cxn, "create table car_maintainance_history
	(
	maintainance_id							INT(20)NOT NULL UNIQUE AUTO_INCREMENT,
    vehicle_identification_number 			int(5),	
	date 									date,
	odometer_reading						int(3),
	maintainance_type						varchar(10),
	description								varchar(25),

	primary key (maintainance_id));");

if (!$result) {
    echo "could <strong>NOT</strong> create car_maintainance_history<br>";
} else {
    echo "car_maintainance_history	created.<br>";
}

$result = mysqli_query($cxn, "create table KTCS_members
	(
	member_no								int (8) NOT NULL UNIQUE AUTO_INCREMENT,
	first_name								varchar(20),
	last_name								varchar(20),
	street_no								int(2),
	street_name								varchar(20),
	apt_number								int(2),
	city									varchar(20),
	state									varchar(20),
	zip_code								varchar(10),
	phone_number							int(12),
    email									varchar(20),
	driving_licence_no						varchar(20),
	monthly_membership_fee					numeric(4,2),
	administrator							boolean not null DEFAULT 0,
	primary key (member_no));");

if (!$result) {
    echo "could <strong>NOT</strong> create KTCS_members<br>";
} else {
    echo "KTCS_members created.<br>";
}

$result = mysqli_query($cxn, "create table member_rental_history
	(
	member_no								int (8) NOT NULL,
    vehicle_identification_number 			int (5) NOT NULL,
	pick_up_odometer						varchar(20),
	drop_off_odometer						varchar(20),
	status_on_return						varchar(20),
	
	primary key (member_no));");

if (!$result) {
    echo "could <strong>NOT</strong> create member_rental_history<br>";
} else {
    echo "member_rental_history created.<br>";
}

$result = mysqli_query($cxn, "create table rental_comments
	(
	comment_id								int(20)NOT NULL UNIQUE AUTO_INCREMENT,
	member_no								varchar(20),
    vehicle_identification_number 			int(5),
	rating									int(1),
	comment_text							varchar(50),
	
	primary key (comment_id));");

if (!$result) {
    echo "could <strong>NOT</strong> create rental_comments<br>";
} else {
    echo "rental_comments created.<br>";
}

$result = mysqli_query($cxn, "create table reservations
	(
	reservation_no							int NOT NULL UNIQUE AUTO_INCREMENT,
	member_no								varchar(20),
    vehicle_identification_number 			int(5),
	date									date,
	access_code								int NOT NULL UNIQUE,
	date_of_return							date,
	primary key (reservation_no));");

if (!$result) {
    echo "could <strong>NOT</strong> create reservations<br>";
} else {
    echo "reservations created.<br>";
}

/*
 *
 *
 *
 *
 *
 *
 *
 */
echo "<br><br>";

$result = mysqli_query($cxn, "insert into parking_locations values
	('15','Princes','12','Kingston','Canada','K7L','521'),
	('10','Division','15','Kingston','Canada','KVA','231');");

if (!$result) {
    echo "could <strong>NOT</strong> insert parking_locations<br>";
} else {
    echo "parking_locations loaded. <br>";
}

$result = mysqli_query($cxn, "insert into cars values
	('12345', 'Toyota','Yaris','1994','12','Princes','Kingston','Canada','K7L','25.5'),
	('23456', 'Fiat'  ,'Punto','2001','13','Division','Kingston','Canada','KVA','32.5');");

if (!$result) {
    echo "could <strong>NOT</strong> insert cars<br>";
} else {
    echo "cars loaded. <br>";
}

$result = mysqli_query($cxn, "insert into car_rental_history values
	('20038904', '12345', '33112' ,'122','144','Working'),
	('12305931', '23456', '89312','100','112','Damaged');");

if (!$result) {
    echo "could <strong>NOT</strong> insert car_rental_history<br>";
} else {
    echo "car_rental_history loaded. <br>";
}

$result = mysqli_query($cxn, "insert into car_maintainance_history values
	('11223344', '12345' ,'1965-01-09','111','Tires','Fancy'),
	('12328891', '23456', '1972-07-31','100','Brackes','Sporty');");

if (!$result) {
    echo "could <strong>NOT</strong> insert car_maintainance_history<br>";
} else {
    echo "car_maintainance_history loaded. <br>";
}

$result = mysqli_query($cxn, "insert into KTCS_members values
	('0000', 'Johnny' ,'Bravo','12','Princes','12','Kingston','Canada','K7L','613444569','jon_bravo@gmail.com','admin','99.10','1'),
	('12328891', 'Anthony','Soprano','10','Brock','13','Kingston','Canada','KVA','613222134','the_boss@gmail.com', '21456','90.50','0'),
    (23333334,'Bob','Smith','24','Database Crescent','3','ktown','sumState','K7L1A2','613123456','bobsmith@lol.com','1a2b3c','5','0'),
    (10102226, 'Kevin', 'Chan', '12', 'street', '2', 'Kingston', 'ohio', 'H0H0H0', '5555555555','email@email.com', 'yesIDrive' ,'9.99', '0');");

if (!$result) {
    echo "could <strong>NOT</strong> insert  KTCS_members<br>";
} else {
    echo "KTCS_members loaded. <br>";
}

$result = mysqli_query($cxn, "insert into member_rental_history values
	('1', '12345' ,'113', '222','Damaged'),
	('12328891', '23456' ,'114', '333','Damaged');");

if (!$result) {
    echo "could <strong>NOT</strong> insert member_rental_hostory<br>";
} else {
    echo "member_rental_history loaded. <br>";
}

$result = mysqli_query($cxn, "insert into rental_comments values
	('1012E', '20038990' ,'55555', '5','Great'),
	('1224D', '20038888' ,'66666', '4','Thank you!');");

if (!$result) {
    echo "could <strong>NOT</strong> insert rental_comments<br>";
} else {
    echo "rental_comments loaded. <br>";
}

$result = mysqli_query($cxn, "insert into reservations values
	('2017', '23333334' ,'12345', '2018-04-05','111','2018-04-25'),
	('201321', '23333335' ,'23456', '2017-04-05','112','2017-05-06');");

if (!$result) {
    echo "could <strong>NOT</strong> insert reservations<br>";
} else {
    echo "reservations loaded. <br>";
}

echo "Project database created.<br>";


mysqli_close($cxn);
?>


</body>
</html>
