<html>
<head><title>KTCS Database</title></head>
<body>

<?php
 
 $host = "localhost";
 $user = "project332";
 $password = "project332password";
 $database = "project";

 $cxn = mysqli_connect($host,$user,$password, $database);
 // Check connection
 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }
   mysqli_query($cxn,"drop table reservations;");
   mysqli_query($cxn,"drop table rental_comments;");
   mysqli_query($cxn,"drop table member_rental_history;");
   mysqli_query($cxn,"drop table KTCS_members;");
   mysqli_query($cxn,"drop table car_maintainance_history;");
   mysqli_query($cxn,"drop table car_rental_history;");
   mysqli_query($cxn,"drop table cars;");
   mysqli_query($cxn,"drop table parking_locations;");
      
   mysqli_query($cxn,"create table parking_locations
	(
	street_no								integer(2),
	street_name								varchar(20),
	apt_number								integer(2),
	city									varchar(20),
	state									varchar(20),
	zip_code								varchar(10),		    				     	
	number_of_spaces						integer(3),
	
	primary key (street_no,street_name,apt_number,city,state,zip_code));");
	 
   echo "parking_locations created.<br />";
 
   mysqli_query($cxn,"create table cars
   (
    vehicle_identification_number 			integer(5),
	make   							    	varchar(20),
	model  						     		varchar(20),
	year 									integer(4),
	street_no								integer(2),
	street_name								varchar(20),
	city									varchar(20),
	state									varchar(20),
	zip_code								varchar(10),
	phone_number							integer(10),									
	daily_rental_fee       				    numeric(2,0),
	primary key(vehicle_identification_number));");

   echo "cars created.<br />";
 
   mysqli_query($cxn,"create table car_rental_history
	(
	rental_id								varchar(20),
	member_no		    					varchar(20), 
	pick_up_odometer    					integer(3),
	drop_off_odometer 	   			        integer(3),
	status_on_return						varchar(10),
	primary key (rental_id));");
	 
	echo "car_rental_history created.<br />";

	mysqli_query($cxn,"create table car_maintainance_history
	(
	maintainance_id							varchar(20),
    vehicle_identification_number 			integer(5),	
	date 									date,
	odometer_reading						integer(3),
	maintainance_type						varchar(10),
	description								varchar(25),

	primary key (maintainance_id));");
	
	echo "car_maintainance_history	created.<br />";
	
	mysqli_query($cxn,"create table KTCS_members
	(
	member_no								int NOT NULL AUTO_INCREMENT,
	first_name								varchar(20),
	last_name								varchar(20),
	street_no								integer(2),
	street_name								varchar(20),
	apt_number								integer(2),
	city									varchar(20),
	state									varchar(20),
	zip_code								varchar(10),
	phone_number							integer(12),
    email									varchar(20),
	driving_licence_no						varchar(20),
	annual_membership_fee					numeric(3,2),
	
	primary key (member_no));");
	
	echo "KTCS_members created.<br />";

	mysqli_query($cxn,"create table member_rental_history
	(
	member								varchar(20),
    vehicle_identification_number 			integer(5),
	pick_up_odometer						varchar(20),
	drop_off_odometer						varchar(20),
	status_on_return						varchar(20),
	
	primary key (member));");
	
	echo "member_rental_history created.<br />";
	
	mysqli_query($cxn,"create table rental_comments
	(
	comment_id								varchar(20),
	member_no								varchar(20),
    vehicle_identification_number 			integer(5),
	rating									integer(1),
	comment_text							varchar(50),
	
	primary key (comment_id));");
	
	echo "rental_comments created.<br />";

	mysqli_query($cxn,"create table reservations
	(
	reservation_no							varchar(20),
	member_no								varchar(20),
    vehicle_identification_number 			integer(5),
	date									date,
	access_code								varchar(20),
	date_of_return							date,
	primary key (reservation_no));");
	
	echo "reservations created.<br />";
	
	
	mysqli_query($cxn, "insert into parking_locations values
	('15','Princes','12','Kingston','Canada','K7L','521'),
	('10','Division','15','Kingston','Canada','KVA','231');");
	
	echo "parking_locations loaded. <br />";
	
	mysqli_query($cxn, "insert into cars values
	('12345', 'Toyota','Yaris','1994','12','Princes','Kingston','Canada','K7L','613444569','25.5'),
	('23456', 'Fiat'  ,'Punto','2001','13','Division','Kingston','Canada','KVA','613222134','32.5');");
	
	echo "cars loaded. <br />";
	
	mysqli_query($cxn, "insert into car_rental_history values
	('20038904', '33112' ,'122','144','Working'),
	('12305931', '89312','100','112','Damaged');");
	
	echo "car_rental_history loaded. <br />";
	
	mysqli_query($cxn, "insert into car_maintainance_history values
	('11223344', '12345' ,'1965-01-09','111','Tires','Fancy'),
	('12328891', '23456', '1972-07-31','100','Brackes','Sporty');");
	
	echo "car_maintainance_history loaded. <br />";
	
	mysqli_query($cxn, "insert into KTCS_members values
	('10032911', 'Johnny' ,'Bravo','12','Princes','12','Kingston','Canada','K7L','613444569','jon_bravo@gmail.com','33444','221.10'),
	('12328891', 'Anthony','Soprano','10','Brock','13','Kingston','Canada','KVA','613222134','the_boss@gmail.com', '21456','500.50');");
	
	echo "KTCS_members loaded. <br />";
	
	mysqli_query($cxn, "insert into member_rental_history values
	('Anthony', '11233' ,'113', '222','Damaged'),
	('Liu',     '33413' ,'114', '333','Damaged');");
	
	echo "member_rental_history loaded. <br />";
	
	mysqli_query($cxn, "insert into rental_comments values
	('1012E', '20038990' ,'55555', '5','Great'),
	('1224D', '20038888' ,'66666', '4','Thank you!');");
	 
	echo "rental_comments loaded. <br />";
	
	mysqli_query($cxn, "insert into reservations values
	('2017E', '23333334' ,'98765', '1941-06-20','111','1941-06-25'),
	('2017C', '23333335' ,'87654', '1969-03-29','112','1969-05-30');");
	
	echo "reservations loaded. <br />";
	echo "Project database created.<br />";
		
		
	mysqli_close($cxn); 
?>


</body></html>
