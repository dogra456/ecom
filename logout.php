<?php 
session_start();
 	if(isset($_SESSION['username'])) {
		header("location: index.php");
	}
	else{
		echo "login first";
	}
session_destroy(); 
?>