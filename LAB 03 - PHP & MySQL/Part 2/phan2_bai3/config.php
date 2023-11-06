<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$DBConnect = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$DBConnect) {
  		die("Connection failed: " . mysqli_connect_error());
	}

    // Select database
    $shop_DB = mysqli_select_db ($DBConnect, "shop");
    if (!$shop_DB) {
		die("Cannot use database" . mysqli_error($DBConnect));
    }
?>