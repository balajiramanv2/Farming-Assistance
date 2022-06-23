<?php
	$servername = "localhost";
$username = "nari";
$password = "12august";
// Create connection
$conn = new mysqli($servername, $username, $password,"Farming");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?> 