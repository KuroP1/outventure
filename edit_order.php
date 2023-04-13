<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require("config/database.php");
if (isset($_GET['id'])) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $id = $_GET['id'];
    $viewOrderSQL = "SELECT * FROM orders WHERE OrderID = $id";
    $resOrder = mysqli_query($conn, $viewOrderSQL);
    if (mysqli_num_rows($resOrder) > 0) {
        $orders = mysqli_fetch_assoc($resOrder);
        $orderID = $orders['OrderID'];
        $productName = $orders['ProductName'];
        $buyQuantity = $orders['BuyQuantity'];
        $amount = $orders['Amount'];
        $username = $orders['Username'];
        $orderDate = $orders['OrderDate'];
        $paymentMethod = $orders['paymentMethod'];
        $orderStatus = $orders['orderStatus'];


    }

    //make a form to edit the order
    echo "<h2>Edit Order</h2>";
    echo "<form action='edit_order.php' method='POST'>";
    echo "<label for='orderID'>Order ID:</label>";
    echo "<input type='text' name='orderID'  value='$orderID' >";
    echo "<input type='hidden' name='orderID' value='$orderID' ><br>";

    echo "<label for='username'>Username:</label>";
    echo "<input type='text' name='username' value='$username'  disabled><br>";
    echo "<label for='orderDate'>Order Date:</label>";
    echo "<input type='text' name='orderDate' value='$orderDate'  disabled><br>";

    echo "<label for='orderStatus'>Order Status:</label>";
    echo "<input type='text' name='orderStatus' value='$orderStatus' required><br>";
    echo "<input type='submit' name='submit' value='Update Order'>";
    echo "</form>";

}
if (isset($_POST['submit'])) {
    $orderID = $_POST['orderID'];
    $newOrderStatus = $_POST['orderStatus'];
    $updateOrderStatusSQL = "UPDATE orders SET orderStatus = ? WHERE OrderID = ?";

    // Prepare and execute the query using prepared statements
    $stmt = mysqli_prepare($conn, $updateOrderStatusSQL);
    mysqli_stmt_bind_param($stmt, 'si', $newOrderStatus, $orderID);
    $resOrder = mysqli_stmt_execute($stmt);

    if ($resOrder) {
        echo "<script>alert('Order updated successfully!');window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Order update failed!');window.location.href='admin_dashboard.php';</script>";
    }

}

?>