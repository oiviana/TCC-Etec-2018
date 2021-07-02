<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "bd_reinvisit";
// Create connection
$conn = new mysqli($server, $user, $pass, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
