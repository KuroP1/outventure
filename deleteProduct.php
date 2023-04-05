<?php
require_once 'config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('config/database.php');
function deleteProduct($product_id, $conn)
{
    $deleteProductSQL = "DELETE FROM Products WHERE ProductID = ?";
    $stmt = $conn->prepare($deleteProductSQL);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];
    deleteProduct($product_id, $conn);

    // Redirect back to the admin dashboard or another page
    header("Location: admin_dashboard.php");
    exit();
} else {
    error_log("Error: Invalid product ID.");
    exit();
}
?>