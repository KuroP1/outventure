<?php
include_once 'config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = 'elvis'; // Retrieve the username from the session or other secure source

    // Get all cart items for the user
    $sql = "SELECT * FROM cart WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);
    $orderStatus = 'Pending';

    if (mysqli_num_rows($result) > 0) {
        while ($cartRow = mysqli_fetch_assoc($result)) {
            $cartID = intval($cartRow['CartID']);
            $productName = $cartRow['ProductName'];
            $buyQuantity = intval($cartRow['BuyQuantity']);
            $productPrice = floatval($cartRow['ProductPrice']);
            $orderID = '1';
            $paymentMethod = 'Cash';

            // Update the product quantity in the products table
            $sqlUpdate = "UPDATE products SET ProductQuantity = ProductQuantity - $buyQuantity WHERE ProductName = '$productName'";
            mysqli_query($conn, $sqlUpdate);

            // Calculate the total amount
            $amount = $productPrice * $buyQuantity;

            // Get the current date and time
            $currentDate = date('Y-m-d');

            // Insert the order into the Orders table
            $sqlInsert = "INSERT INTO Orders (OrderDate, OrderID, paymentMethod, orderStatus, Username, Amount, ProductName, BuyQuantity ) VALUES ('$currentDate', '$orderID', '$paymentMethod', '$orderStatus', '$username', $amount, '$productName', $buyQuantity)";
            mysqli_query($conn, $sqlInsert);

            // Remove item from the cart
            $sqlDelete = "DELETE FROM cart WHERE CartID = $cartID";
            mysqli_query($conn, $sqlDelete);
        }
        //add up all the total amounts  and display them where orderID= 1
        $sql = "SELECT SUM(Amount) FROM Orders WHERE OrderID = 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total = $row['SUM(Amount)'];
        echo "Total Amount: $total";




        echo "Purchase successful!";
    } else {
        echo "No cart items found";
    }
}

?>