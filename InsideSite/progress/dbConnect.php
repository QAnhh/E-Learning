<?php
	$servername = "localhost";
	$database = "elearning";
	$username = "root";
	$password = "";
	$charset = "utf8";

	try {
	  $conn = new PDO("mysql:host=$servername;dbname=$database;charset=$charset", $username, $password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
	include_once 'student-class.php';
    $student = new student($conn);
    include_once 'role-class.php';
    $role = new role_user($conn);
?>