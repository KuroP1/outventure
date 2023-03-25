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

    //add a checking function if product is already exist
    $productfindquery = "SELECT * FROM Products WHERE ProductName=?";
    $productfindstmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($productfindstmt, $productfindquery)) {
        mysqli_stmt_bind_param($productfindstmt, "s", $productName);
        mysqli_stmt_execute($productfindstmt);
        $productfindresult = mysqli_stmt_get_result($productfindstmt);
        if ($productfindresult->num_rows > 0) {
            echo "<div class='alert alert-danger'>Product is already exist.</div>";
        } else {
            //add a checking function if categoryID is valid, if valid then insert the product
            $findCategoryquery = "SELECT * FROM Categories WHERE CategoryID=?";
            $findCategorystmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($findCategorystmt, $findCategoryquery)) {
                mysqli_stmt_bind_param($findCategorystmt, "i", $categoryID);
                mysqli_stmt_execute($findCategorystmt);
                $findCategoryresult = mysqli_stmt_get_result($findCategorystmt);
                if ($findCategoryresult->num_rows > 0) {
                    $insertProductquery = "INSERT INTO Products (ProductName, ProductDescription, ProductQuantity, ProductSize, ProductColor, CategoryID) 
    VALUES ( ?, ?, ?, ?, ?, ?)";
                    $insertProductstmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($insertProductstmt, $insertProductquery);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($insertProductstmt, "ssissi", $productName, $productDescription, $productQuantity, $productSize, $productColor, $categoryID);
                        mysqli_stmt_execute($insertProductstmt);
                        echo "<div class='alert alert-success'>You are insert successfully.</div>";
                    } else {
                        die("Something went wrong");
                    }
                } else {
                    echo "<div class='alert alert-danger'>Category ID is not valid.</div>";
                }
            } else {
                die("Something went wrong");
            }
        }


    }



}

// close the database connection
mysqli_close($conn);
?>