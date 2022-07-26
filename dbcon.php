<?php
$servername = "localhost";
// REPLACE with your Database name
$dbname = "e-wallet_db";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>