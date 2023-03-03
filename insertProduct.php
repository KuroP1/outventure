<?php
// include the database connection code here
ini_set('display_errors', 1);
error_reporting(E_ALL);

// check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the form input values
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productQuantity = $_POST['productQuantity'];
    $productSize = $_POST['productSize'];
    $productColor = $_POST['productColor'];
    $categoryID = $_POST['categoryID'];
    require_once 'config/database.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // call the insertProduct function


    $sql = "INSERT INTO Products (ProductName, ProductDescription, ProductQuantity, ProductSize, ProductColor, CategoryID) 
    VALUES ( ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {

        mysqli_stmt_bind_param($stmt, "ssissi", $productName, $productDescription, $productQuantity, $productSize, $productColor, $categoryID);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>You are insert successfully.</div>";
    } else {
        die("Something went wrong");
    }

}

// close the database connection
mysqli_close($conn);
?>