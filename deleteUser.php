<?php
require_once 'config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('config/database.php');
function deleteProduct($username, $conn)
{
    $deleteUserSQL = "DELETE FROM Users WHERE Username = ?";
    $stmt = $conn->prepare($deleteUserSQL);
    $stmt->bind_param('s', $username);
    $stmt->execute();
}

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $usernametemp = $_GET['name'];
    deleteProduct($usernametemp, $conn);

    // Redirect back to the admin dashboard or another page
    header("Location: admin_dashboard.php");
    exit();
} else {
    error_log("Error: Invalid product name.");
    exit();
}
