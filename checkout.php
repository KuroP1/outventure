<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
    <h1>Checkout</h1>
    <form action="purchase.php" method="post">
        <?php
        // Assuming you have a valid mysqli connection in the $conn variable
        include 'config/database.php';
        $username = 'elvis';
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $sql = "SELECT * FROM cart WHERE Username = '$username'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Cart ID</th><th>Product Name</th><th>Product Thumbnail</th><th>Buy Quantity</th><th>Product Size</th><th>Product Color</th><th>Category Name</th><th>Sub Category Name</th><th>Username</th><th>Product Price</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['CartID'] . "</td>";
                echo "<td>" . $row['ProductName'] . "</td>";
                echo "<td>" . $row['ProductThumbnail'] . "</td>";
                echo "<td>" . $row['BuyQuantity'] . "</td>";
                echo "<td>" . $row['ProductSize'] . "</td>";
                echo "<td>" . $row['ProductColor'] . "</td>";
                echo "<td>" . $row['CategoryName'] . "</td>";
                echo "<td>" . $row['SubCategoryName'] . "</td>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['ProductPrice'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No cart items found for user '$username'";
        }



        ?>
        <button type="submit">Purchase All Items</button>
    </form>
</body>

</html>