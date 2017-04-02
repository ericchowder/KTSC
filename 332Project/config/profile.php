<!DOCTYPE HTML>
<html>
    <head>
        <title>Welcome to mysite</title>
  
    </head>
<body>
 <?php
  //Create a user session or resume an existing one

	CREATE cisc332.user ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(10) NOT NULL , `password` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`), UNIQUE `username` (`username`)) ENGINE = InnoDB;
	INSERT INTO cisc332.user (`id`, `username`, `password`, `email`) VALUES (NULL, 'admin', 'admin', 'admin@mysite.com');
	INSERT INTO cisc332.user (`id`, `username`, `password`, `email`) VALUES (NULL, 'user1', 'user1', 'user1@mysite.com');
  
 session_start();
 ?>
 
</body>
</html>