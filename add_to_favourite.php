<?php
session_start();
require_once 'config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('config/database.php');
function addToFavourite($productname, $conn)
{
    // check if the product is already in the favourite list
    $checkFavouriteSQL = "SELECT * FROM favourite WHERE Username = ? AND ProductName = ?";
    $stmt = $conn->prepare($checkFavouriteSQL);
    $stmt->bind_param('ss', $_SESSION['currentUser'], $productname);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // if the product is already in the favourite list, delete it
        $deleteFavouriteSQL = "DELETE FROM favourite WHERE Username = ? AND ProductName = ?";
        $stmt = $conn->prepare($deleteFavouriteSQL);
        $stmt->bind_param('ss', $_SESSION['currentUser'], $productname);
        $stmt->execute();

        // update product table positive vote
        $updateProductSQL = "UPDATE products SET PositiveVote = IF(PositiveVote > 0, PositiveVote - 1, 0) WHERE ProductName = ?";
        $stmt = $conn->prepare($updateProductSQL);
        $stmt->bind_param('s', $productname);
        $stmt->execute();
    } else {
        $addToFavouriteSQL = "INSERT INTO favourite (Username, ProductName) VALUES (?, ?)";
        $stmt = $conn->prepare($addToFavouriteSQL);
        $stmt->bind_param('ss', $_SESSION['currentUser'], $productname);
        $stmt->execute();

        // update product table positive vote
        $updateProductSQL = "UPDATE products SET PositiveVote = PositiveVote + 1 WHERE ProductName = ?";
        $stmt = $conn->prepare($updateProductSQL);
        $stmt->bind_param('s', $productname);
        $stmt->execute();
    }
}

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $productnametemp = $_GET['name'];
    addToFavourite($productnametemp, $conn);

    // Redirect to currnet page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    error_log("Error: Invalid product name.");
    exit();
}
