<?php 
	$db_host ="132.145.161.151"; 
	$db_username ="2406011720039"; 
	$db_password ="password"; 
	$db_database ="shop"; 
	$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
	  if (mysqli_connect_errno()){
	    die ("Could not connect to the database: <br />". mysqli_connect_error());
	  }
?>