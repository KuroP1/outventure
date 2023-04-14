<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] <= 0) {
    header("Location: ../index.php");
    exit();
}

require_once('../config/database.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $orderID = $_GET['id'];
    deleteOrder($orderID, $conn);

    // Redirect back to the admin dashboard or another page
    header("Location: order.php");
    exit();
} else {
    error_log("Error: Invalid order id.");
    exit();
}

function deleteOrder($orderID, $conn)
{
    //require the database connection
    require_once '../config/database.php';
    $deleteOrderSQL = "DELETE FROM orders WHERE OrderID = ?";
    $stmt = $conn->prepare($deleteOrderSQL);
    $stmt->bind_param('i', $orderID);
    $stmt->execute();
}
