<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","clinic");
	if(!$conn) {
		exit();
	}

	date_default_timezone_set('Asia/Manila');
    $date_today = date('Y-m-d');
    
	$timezone = new DateTimeZone('Asia/Manila');
?>