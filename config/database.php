<?php
$servername = "localhost";
$database = "Outventure";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
    exit();
}



mysqli_close($conn);