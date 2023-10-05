<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pharmio";

// Create connection
$conn = new mysqli("localhost", "root", "", "pharmio");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
