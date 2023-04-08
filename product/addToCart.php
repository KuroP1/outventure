<?php
// include the database connection code here
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../config/database.php');

// Insert into database
$sql = "INSERT INTO Cart (ProductName, ProductPrice, BuyQuantity, ProductSize, ProductColor, CategoryName, SubCategoryName, Username) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed!";
} else {
    mysqli_stmt_bind_param($stmt, "siisssss", $productName, $productPrice, $BuyQuantity, $productSize, $productColor, $category, $subCategory, $username);
    mysqli_stmt_execute($stmt);

    header("Location: admin_dashboard.php");
}

//close the database connection
mysqli_close($conn);
