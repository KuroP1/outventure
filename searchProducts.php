<?php

function searchProduct($productName, $productColor, $productSize)
{
    require_once("config/database.php");
    $productName = "%" . $productName . "%";
    $productColor = "%" . $productColor . "%";
    $productSize = "%" . $productSize . "%";

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ? AND product_size LIKE ? AND product_color LIKE ?");
    $stmt->bind_param("sss", $productName, $productSize, $productColor);
    $stmt->execute();


    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $rows;
}

?>