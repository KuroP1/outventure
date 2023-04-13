<?php
require_once('../config/database.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

function deleteProduct($product_name, $conn)
{
    $deleteProductSQL = "DELETE FROM Products WHERE ProductName = ?";
    $stmt = $conn->prepare($deleteProductSQL);
    $stmt->bind_param('s', $product_name);
    $stmt->execute();

    $deleteProductSQL2 = "DELETE FROM Images WHERE ProductName = ?";
    $stmt2 = $conn->prepare($deleteProductSQL2);
    $stmt2->bind_param('s', $product_name);
    $stmt2->execute();
}

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $product_name = $_GET['name'];
    deleteProduct($product_name, $conn);

    var_dump($product_name);

    // Redirect back to the admin dashboard or another page
    header("Location: product.php");
    exit();
} else {
    error_log("Error: Invalid product name.");
    exit();
}
?>