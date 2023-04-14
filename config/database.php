<?php
$servername = "outventure.chfgk5zp2zgw.ap-northeast-1.rds.amazonaws.com";
$database = "outventure";
$username = "admin";
$password = "WH#vCFxKDNGqj9*N";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);



// Check connection

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
