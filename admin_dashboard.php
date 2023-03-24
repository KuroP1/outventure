<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <h2>User Accounts</h2>
    <?php
    require_once("view_accounts.php");

    $accounts = getAccounts();

    if (count($accounts) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th><th>Admin</th><th>Action</th></tr>";
        foreach ($accounts as $account) {
            echo "<tr><td>" . $account["UserID"] . "</td><td>" . $account["Username"] . "</td><td>" . $account["Email"] . "</td><td>" . $account["Password"] . "</td><td>" . $account["isAdmin"] . "</td><td><a href='edit_account.php?id=" . $account["UserID"] . "'>Edit</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No accounts found.</p>";
    }
    ?>

    <h2>Products</h2>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require_once("view_products.php");
    $products = viewProducts();
    if (count($products) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Quantity</th><th>Size</th><th>Color</th><th>Positive Vote</th></th><th>Category</th><th>Action</th></tr>";
        foreach ($products as $product) {
            echo "<tr><td>" . $product["ProductID"] . "</td><td>" . $product["ProductName"] . "</td><td>" . $product["ProductDescription"] . "</td><td>" . $product["ProductQuantity"] . "</td><td>" . $product["ProductSize"] . "</td><td>" . $product["ProductColor"] . "</td><td>" . $product["PositiveVote"] . "</td><td>" . $product["CategoryID"] . "</td><td><a href='edit_product.php?id=" . $product["ProductID"] . "'>Edit</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No products found.</p>";
    }
    ?>

    <h2>Insert Product</h2>
    <form action="insertProduct.php" method="POST">
        <label for="productName">Product Name:</label>
        <input type="text" name="productName" required><br>

        <label for="productDescription">Product Description:</label>
        <input type="text" name="productDescription" required><br>

        <label for="productQuantity">Product Quantity:</label>
        <input type="number" name="productQuantity" required><br>

        <label for="productSize">Product Size:</label>
        <input type="text" name="productSize"><br>

        <label for="productColor">Product Color:</label>
        <input type="text" name="productColor"><br>

        <label for="categoryID">Category ID:</label>
        <input type="number" name="categoryID" required><br>

        <input type="submit" value="Add Product">
    </form>

</body>

</html>