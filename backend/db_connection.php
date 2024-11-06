<?php
$servername = "127.0.0.1:3306";
$username = "u780943782_nkp";
$password = "R3|j5Rck"; 
$dbname = "u780943782_nkp";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
