<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "judotank";
	$objCon = new mysqli($serverName,$userName,$userPassword,$dbName);

	
	if(mysqli_connect_errno()){
		echo mysqli_connect_errno();
		exit();
	} else {
		mysqli_set_charset($objCon,"utf8");
		
		//echo "connect ok";
	}

	
?>