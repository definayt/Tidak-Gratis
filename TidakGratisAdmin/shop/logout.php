<?php 
 	session_start(); 
	unset($_SESSION['username']);  
	unset($_SESSION['nama']);  
	unset($_SESSION['level']); 
	session_destroy(); 
    header("location: login.php");
?> 
