<?php
session_start();
if (!isset($_SESSION["currentUser"])) {
    header("Location: ../authentication/login.php");
}
include_once '../config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION["currentUser"];
    $dataFromJS = file_get_contents('php://input');
    $data = json_decode($dataFromJS, true);
    $address = $data['address'];
    $paymentMethod = $data['payment'];

    $sql = "SELECT * FROM cart WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);
    $orderStatus = 'Pending';

    if (mysqli_num_rows($result) > 0) {
        // Generate a unique orderID outside the loop
        do {
            $orderID = rand(0, 999999);
            $sqlCheck = "SELECT * FROM Orders WHERE OrderID = $orderID";
            $resultCheck = mysqli_query($conn, $sqlCheck);
        } while (mysqli_num_rows($resultCheck) > 0);

        while ($cartRow = mysqli_fetch_assoc($result)) {
            $cartID = intval($cartRow['CartID']);
            $productName = $cartRow['ProductName'];
            $productColor = $cartRow['ProductColor'];
            $productSize = $cartRow['ProductSize'];
            $buyQuantity = intval($cartRow['BuyQuantity']);
            $productPrice = floatval($cartRow['ProductPrice']);

            // Update the product quantity in the products table
            $sqlUpdate = "UPDATE products SET ProductQuantity = ProductQuantity - $buyQuantity WHERE ProductName = '$productName'";
            mysqli_query($conn, $sqlUpdate);

            // Calculate the total amount
            $amount = $productPrice;

            // Get the current date and time
            $currentDate = date("Y-m-d h:m:s");

            // Insert the order into the Orders table
            $sqlInsert = "INSERT INTO Orders (OrderDate, OrderID, paymentMethod, orderStatus, Username, Address, Amount, ProductName, BuyQuantity, ProductColor, ProductSize) VALUES ('$currentDate', '$orderID', '$paymentMethod', '$orderStatus', '$username', '$address', $amount, '$productName', $buyQuantity, '$productColor', '$productSize')";
            mysqli_query($conn, $sqlInsert);

            // Remove item from the cart
            $sqlDelete = "DELETE FROM cart WHERE CartID = $cartID";
            mysqli_query($conn, $sqlDelete);
        }

        echo "Purchase successful!";
    } else {
        echo "No cart items found";
    }
}
