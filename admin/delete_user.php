<?php

//check session isAdmin is >0
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] <= 0) {
    header("Location: ../index.php");
    exit();
}

require_once '../config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../config/database.php');
function deleteUser($username, $conn)
{
    $deleteUserSQL = "DELETE FROM users WHERE Username = ?";
    $stmt = $conn->prepare($deleteUserSQL);
    $stmt->bind_param('s', $username);
    $stmt->execute();
}

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $usernametemp = $_GET['name'];
    deleteUser($usernametemp, $conn);

    // Redirect back to the admin dashboard or another page
    header("Location: user.php");
    exit();
} else {
    error_log("Error: Invalid product name.");
    exit();
}
