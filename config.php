<?php
session_start();
$servername = "****.*****.**";
$username = "*******";
$password = "********";
$dbname = "DB********";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>