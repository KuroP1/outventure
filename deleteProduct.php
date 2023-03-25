<?php
//connect database
require_once 'config/database.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Products WHERE ProductID = :product_id");
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();

    // Redirect back to the admin dashboard or another page
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "Error: Invalid product ID.";
    exit();
}
?>