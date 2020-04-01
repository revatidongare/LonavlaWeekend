<?php

$user='root';
	$pass='';
    $dbname='lonavla_weekend';
	

$conn = new PDO('mysql:host=localhost;dbname=lonavla_weekend', $user, $pass);
	if (!$conn) {
		die("Connection failed: " . $conn->connect_error);
	}
  	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



// $con = mysqli_connect("localhost","root","","lonavla_weekend");
// print_r($_POST);

// $con = mysqli_connect("localhost","u762435158_lonavalawknd","lonavalawknd","u762435158_lonavalawknd");
// $user='u762435158_lonavalawknd';
// 	$pass='lonavalawknd';
//     $dbname='u762435158_lonavalawknd';
	

// $conn = new PDO('mysql:host=localhost;dbname=u762435158_lonavalawknd', $user, $pass);
// 	if (!$conn) {
// 		die("Connection failed: " . $conn->connect_error);
// 	}
//   	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>	