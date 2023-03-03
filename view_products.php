<?php
// include the database connection code here

function viewProducts()
{
    include 'config/database.php';
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($conn, $sql);
    $products = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    // close the database connection
    mysqli_close($conn);
    return $products;
}
?>