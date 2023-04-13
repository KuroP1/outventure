<?php
session_start();
if (!isset($_SESSION["currentUser"])) {
    header("Location: ../authentication/login.php");
}
?>
<?php
include_once '../config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION["currentUser"]; // Retrieve the username from the session or other secure source

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
            $orderID = rand(0, 999999);
            $paymentMethod = 'Cash';
            //check order id is unique
            $sqlCheck = "SELECT * FROM Orders WHERE OrderID = $orderID";
            $resultCheck = mysqli_query($conn, $sqlCheck);
            if (mysqli_num_rows($resultCheck) > 0) {
                $orderID = rand(999999);
                // Update the product quantity in the products table
                $sqlUpdate = "UPDATE products SET ProductQuantity = ProductQuantity - $buyQuantity WHERE ProductName = '$productName'";
                mysqli_query($conn, $sqlUpdate);

                // Calculate the total amount
                $amount = $productPrice;

                // Get the current date and time
                $currentDate = date('Y-m-d');

                // Insert the order into the Orders table
                $sqlInsert = "INSERT INTO Orders (OrderDate, OrderID, paymentMethod, orderStatus, Username, Amount, ProductName, BuyQuantity ) VALUES ('$currentDate', '$orderID', '$paymentMethod', '$orderStatus', '$username', $amount, '$productName', $buyQuantity)";
                mysqli_query($conn, $sqlInsert);

                // Remove item from the cart
                $sqlDelete = "DELETE FROM cart WHERE CartID = $cartID";
                mysqli_query($conn, $sqlDelete);
            } else {
                // Update the product quantity in the products table
                $sqlUpdate = "UPDATE products SET ProductQuantity = ProductQuantity - $buyQuantity WHERE ProductName = '$productName'";
                mysqli_query($conn, $sqlUpdate);

                // Calculate the total amount
                $amount = $productPrice;

                // Get the current date and time
                $currentDate = date('Y-m-d');

                // Insert the order into the Orders table
                $sqlInsert = "INSERT INTO Orders (OrderDate, OrderID, paymentMethod, orderStatus, Username, Amount, ProductName, BuyQuantity ) VALUES ('$currentDate', '$orderID', '$paymentMethod', '$orderStatus', '$username', $amount, '$productName', $buyQuantity)";
                mysqli_query($conn, $sqlInsert);

                // Remove item from the cart
                $sqlDelete = "DELETE FROM cart WHERE CartID = $cartID";
                mysqli_query($conn, $sqlDelete);
            }
        }
        //add up all the total amounts  and display them where orderID= 1

        //select sum(amount) from orders where orderid = $orderID
        $sql = "SELECT SUM(Amount) FROM Orders WHERE OrderID = $orderID";

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