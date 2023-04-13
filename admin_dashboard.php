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
            echo "<tr><td>" . $account["UserID"] . "</td><td>" . $account["Username"] . "</td><td>" . $account["Email"] . "</td><td>" . $account["Password"] . "</td><td>" . $account["isAdmin"] . "</td><td><a href='edit_account.php?id=" . $account["UserID"] . "'>Edit</a></td></tr> . <td><a href='deleteUser.php?name=" . $account["Username"] . "'>Delete</a></td></tr>";
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
        echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Size</th><th>Color</th><th>Positive Vote</th></th><th>Category</th><th>Action</th><th>Action</th></tr>";
        foreach ($products as $product) {
            echo "<tr><td>" . $product["ProductID"] . "</td><td>" . $product["ProductName"] . "</td><td>" . "</td><td>" . $product["ProductQuantity"] . "</td><td>" . $product["ProductSize"] . "</td><td>" . $product["ProductColor"] . "</td><td>" . $product["PositiveVote"] . "</td><td>" . $product["CategoryName"] . "</td><td><a href='edit_product.php?id=" . $product["ProductID"] . "'>Edit</a></td><td><a href='deleteProduct.php?name=" . $product["ProductName"] . "'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No products found.</p>";
    }
    ?>
    <?php
    if (isset($_GET['error'])): ?>
    <p>
        <?php echo $_GET['error']; ?>
    </p>
    <?php endif; ?>
    <h2>Insert Product</h2>
    <form action="insertProduct.php" method="POST" enctype="multipart/form-data">
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

        <label for="productPrice">Price:</label>
        <input type="number" name="productPrice" required><br>

        <label for="category">Category:</label>
        <select id="category" type="select" name="category" onchange="myFunction()" required>
            <option value=""></option>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            require("config/database.php");
            $viewSQL = "SELECT * FROM categories";
            $res = mysqli_query($conn, $viewSQL);
            if (mysqli_num_rows($res) > 0) {
                while ($categories = mysqli_fetch_assoc($res)) {
                    echo "<option value='" . $categories['CategoryName'] . "'>" . $categories['CategoryName'] . "</option>";
                }
            }
            ?>
        </select><br>

        <label for="subCategory">Sub Category:</label>
        <select id="subCategory" type="select" name="subCategory" required>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            require("config/database.php");
            $viewSQL = "SELECT * FROM subcategories";
            $res = mysqli_query($conn, $viewSQL);
            $subCategoriesArray = array();

            // print out categories select value
            if (mysqli_num_rows($res) > 0) {
                while ($subCategories = mysqli_fetch_assoc($res)) {
                    // display subcategories based on category select value
                    array_push($subCategoriesArray, $subCategories['SubCategoryName'], $subCategories['CategoryName']);
                }
            }
            ?>
        </select><br>

        <label for="productImage[]">Product Image:</label>
        <input type="file" name="productImage[]" multiple><br>

        <input type="submit" name="submit" value="Add Product">
    </form>


    <h2>Insert Category</h2>
    <form action="insertCategory.php" method="POST">
        <label for="category">Category Name:</label>
        <input type="text" name="category" required><br>

        <label for="subCategory">Sub Category Name:</label>
        <input type="text" name="subCategory" required><br>

        <input type="submit" name="submit" value="Add Category">
    </form>

    <h2>Insert Sub Category</h2>
    <form action="insertSubCategory.php" method="POST">
        <label for="newCategory">Category:</label>
        <select id="category" type="select" name="newCategory" onchange="myFunction()" required>
            <option value=""></option>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            require("config/database.php");
            $viewSQL = "SELECT * FROM categories";
            $res = mysqli_query($conn, $viewSQL);
            if (mysqli_num_rows($res) > 0) {
                while ($categories = mysqli_fetch_assoc($res)) {
                    echo "<option value='" . $categories['CategoryName'] . "'>" . $categories['CategoryName'] . "</option>";
                }
            }
            ?>
        </select><br>

        <label for="newSubCategory">Sub Category Name:</label>
        <input type="text" name="newSubCategory" required><br>

        <input type="submit" name="submit" value="Add Category">
    </form>

    <h2>View Orders</h2>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require("config/database.php");
    $viewOrderSQL = "SELECT OrderID, GROUP_CONCAT(ProductName) as ProductNames, GROUP_CONCAT(BuyQuantity) as BuyQuantities, SUM(Amount) as TotalAmount, Username, OrderDate, paymentMethod, orderStatus
                        FROM orders
                        GROUP BY OrderID, Username, OrderDate, paymentMethod, orderStatus";
    $resOrder = mysqli_query($conn, $viewOrderSQL);
    if (mysqli_num_rows($resOrder) > 0) {
        echo "<table>";
        //order table have OrderDate OrderID paymentMethod orderStatus Username Amount ProductName BuyQuantity 
    
        echo "<tr><th>OrderID</th><th>ProductName</th><th>BuyQuantity</th><th>Amount</th><th>Username</th><th>OrderStatus</th></th><th>OrderDate</th><th>Action</th></tr>";

        while ($orders = mysqli_fetch_assoc($resOrder)) {
            echo "<tr><td>" . $orders['OrderID'] . "</td><td>" . $orders['ProductNames'] . "</td><td>" . $orders['BuyQuantities'] . "</td><td>" . $orders['TotalAmount'] . "</td><td>" . $orders['Username'] . "</td><td>" . $orders['orderStatus'] . "</td><td>" . $orders['OrderDate'] . "</td><td><a href='edit_order.php?id=" . $orders["OrderID"] . "'>Edit</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No orders found.</p>";
    }
    ?>

</body>

</html>

<script>
var fullCategoriesArray = <?php echo json_encode($subCategoriesArray); ?>;
var categoriesArray = [];
var subCategoriesArray = [];

for (var i = 0; i < fullCategoriesArray.length; i++) {
    if (i % 2 == 0) {
        subCategoriesArray.push(fullCategoriesArray[i]);
    } else {
        categoriesArray.push(fullCategoriesArray[i]);
    }
}

function myFunction() {
    // clear select
    var selectElement = document.getElementById('subCategory');
    while (selectElement.options.length > 0) {
        selectElement.remove(0);
    }

    var categoryName = document.getElementById("category").value;

    for (var i = 0; i < categoriesArray.length; i++) {
        if (categoryName == categoriesArray[i]) {
            // create option for subcategory
            var mySelect = document.getElementById('subCategory'),
                newOption = document.createElement('option');
            newOption.value = subCategoriesArray[i];
            newOption.innerHTML = subCategoriesArray[i];
            mySelect.appendChild(newOption);
        }
    }
}
</script>