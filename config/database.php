<?php
$servername = "outventure-2.chfgk5zp2zgw.ap-northeast-1.rds.amazonaws.com";
$database = "outventure";
$username = "admin";
$password = "CtwMZN3+cy7bN6$B";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);



// Check connection

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
