<?php 
	$db_host ="129.213.56.240"; 
	$db_username ="24060117120039"; 
	$db_password ="password"; 
	$db_database ="shop"; 
	$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
	  if (mysqli_connect_errno()){
	    die ("Could not connect to the database: <br />". mysqli_connect_error());
	  }
?>