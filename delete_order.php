<?php
//make a delete order function by getting the order id from the admin dashboard
function deleteOrder($orderID, $conn)
{
    //require the database connection
    require_once 'config/database.php';
    $deleteOrderSQL = "DELETE FROM orders WHERE OrderID = ?";
    $stmt = $conn->prepare($deleteOrderSQL);
    $stmt->bind_param('i', $orderID);
    $stmt->execute();
}
//check if the order id is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $orderID = $_GET['id'];
    deleteOrder($orderID, $conn);
    // Redirect back to the admin dashboard or another page
    header("Location: admin_dashboard.php");
    exit();
} else {
    error_log("Error: Invalid order id.");
    exit();
}

?>