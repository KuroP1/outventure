<?php

//check session isAdmin is >0
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] <= 0) {
    header("Location: ../index.php");
    exit();
}

require_once '../config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../config/database.php');
function updateCart($cart, $action, $cartNumber, $conn)
{   
    if ($action == "add") {
        $updateCartSQL2 = "UPDATE Cart SET ProductPrice = ProductPrice + (ProductPrice / BuyQuantity)  WHERE CartID = ?";
        $stmt2 = $conn->prepare($updateCartSQL2);
        $stmt2->bind_param('s', $cart);
        $stmt2->execute();

        $updateCartSQL = "UPDATE Cart SET BuyQuantity = BuyQuantity + 1 WHERE CartID = ?";
        $stmt = $conn->prepare($updateCartSQL);
        $stmt->bind_param('s', $cart);
        $stmt->execute();
    } else if ($action == "minus" && $cartNumber > 1) {
        $updateCartSQL2 = "UPDATE Cart SET ProductPrice = ProductPrice - (ProductPrice / BuyQuantity)  WHERE CartID = ?";
        $stmt2 = $conn->prepare($updateCartSQL2);
        $stmt2->bind_param('s', $cart);
        $stmt2->execute();

        $updateCartSQL = "UPDATE Cart SET BuyQuantity = BuyQuantity - 1 WHERE CartID = ?";
        $stmt = $conn->prepare($updateCartSQL);
        $stmt->bind_param('s', $cart);
        $stmt->execute();
    } else if ($action == "delete") {
        $updateCartSQL = "DELETE FROM Cart WHERE CartID = ?";
        $stmt = $conn->prepare($updateCartSQL);
        $stmt->bind_param('s', $cart);
        $stmt->execute();
    }
}

if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['action']) && !empty($_GET['action'] && isset($_GET['cart']) && !empty($_GET['cart']))) {
    $carttemp = $_GET['name'];
    $actiontemp = $_GET['action'];
    $cartnumbertemp = $_GET['cart'];
    updateCart($carttemp, $actiontemp, $cartnumbertemp, $conn);

    // Redirect back to the admin dashboard or another page
    header("Location: shopping_cart.php");
    exit();
} else {
    error_log("Error: Invalid product name.");
    exit();
}