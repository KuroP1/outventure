<?php
session_start();
if (!isset($_SESSION["currentUser"])) {
    header("Location: ../authentication/login.php");
}
?>
<?php
// include the database connection code here
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../config/database.php');

if (isset($_POST)) {
    $dataFromJS = file_get_contents('php://input');

    $data = json_decode($dataFromJS, true);

    $productName = $data['productName'];
    $productPrice = $data['productPrice'];
    $buyQuantity = $data['buyQuantity'];
    $productSize = $data['selectedSize'];
    $productColor = $data['selectedColor'];
    $productCategory = $data['productCategory'];
    $productSubCategory = $data['productSubCategory'];
    $username = $_SESSION["currentUser"];

    $sql = "INSERT INTO Cart (ProductName, ProductPrice, BuyQuantity, ProductSize, ProductColor, CategoryName, SubCategoryName, Username) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed!";
    } else {
        $checkSameCartSQL = "SELECT ProductName, BuyQuantity, ProductColor, ProductColor, Username FROM cart WHERE ProductName = '$productName' AND ProductColor = '$productColor' AND ProductSize = '$productSize' AND Username = '$username'";
        $result = mysqli_query($conn, $checkSameCartSQL);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $updateSameCartSQL = "UPDATE cart SET BuyQuantity = BuyQuantity + '$buyQuantity', ProductPrice = ProductPrice + '$productPrice' WHERE ProductName = '$productName' AND ProductColor = '$productColor' AND ProductSize = '$productSize' AND Username = '$username'";
            mysqli_query($conn, $updateSameCartSQL);
        } else {
            mysqli_stmt_bind_param($stmt, "siisssss", $productName, $productPrice, $buyQuantity, $productSize, $productColor, $productCategory, $productSubCategory, $username);
            mysqli_stmt_execute($stmt);
        }
    }
}

//close the database connection
mysqli_close($conn);
?>