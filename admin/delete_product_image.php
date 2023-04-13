<?php
require_once '../config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

function deleteImage($image_upload_path, $productName, $conn)
{
    $deleteProductSQL2 = "DELETE FROM Images WHERE ProductName = ? AND ImagePath = ?";
    $stmt2 = $conn->prepare($deleteProductSQL2);
    $stmt2->bind_param('ss', $productName, $image_upload_path);
    $stmt2->execute();
}

if (isset($_GET['image']) && !empty($_GET['image'])) {
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $productName = $_GET['name'];
        $path = $_GET['image'];

        if ($_GET['length'] <= 1) {
            echo "<script>
            alert('You cannot delete the last image.');
            window.location.href='edit_product.php?id=$_GET[id]';
            </script>";
        } else {
            deleteImage($path, $productName, $conn);
            // Redirect back to current page    
            header("Location: edit_product.php?id=$_GET[id]");
        }

        exit();
    }
} else {
    error_log("Error: Invalid product name.");
    exit();
}
