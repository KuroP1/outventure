<?php
include("config\database.php");
function searchProductByName($productName)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ?");
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        return;
    }
    $productName = '%' . $productName . '%';
    $stmt->bind_param("s", $productName);
    if (!$stmt) {
        echo "Bind failed: (" . $stmt->errno . ") " . $stmt->error;
        return;
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

?>