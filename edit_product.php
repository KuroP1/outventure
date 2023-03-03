<?php
require_once 'config/database.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    // check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // get the form input values
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productQuantity = $_POST['productQuantity'];
        $productSize = $_POST['productSize'];
        $productColor = $_POST['productColor'];
        $categoryID = $_POST['categoryID'];

        // update the product record in the database
        $sql = "UPDATE Products SET ProductName=?, ProductDescription=?, ProductQuantity=?, ProductSize=?, ProductColor=?, CategoryID=? WHERE ProductID=?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssissii", $productName, $productDescription, $productQuantity, $productSize, $productColor, $categoryID, $productID);
            mysqli_stmt_execute($stmt);
            //echo "<div class='alert alert-success'>Product updated successfully.</div>";
            header("Location: admin_dashboard.php");
        } else {
            die("Something went wrong");
        }
    }

    // get the current product record from the database
    $sql = "SELECT * FROM Products WHERE ProductID=?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $productID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            die("Product not found");
        }
    } else {
        die("Something went wrong");
    }

    // close the database connection
    mysqli_close($conn);

} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>
    <form action="edit_product.php?id=<?php echo $productID; ?>" method="POST">
        <label for="productName">Product Name:</label>
        <input type="text" name="productName" value="<?php echo $product['ProductName']; ?>" required><br>

        <label for="productDescription">Product Description:</label>
        <input type="text" name="productDescription" value="<?php echo $product['ProductDescription']; ?>" required><br>

        <label for="productQuantity">Product Quantity:</label>
        <input type="number" name="productQuantity" value="<?php echo $product['ProductQuantity']; ?>" required><br>

        <label for="productSize">Product Size:</label>
        <input type="text" name="productSize" value="<?php echo $product['ProductSize']; ?>"><br>

        <label for="productColor">Product Color:</label>
        <input type="text" name="productColor" value="<?php echo $product['ProductColor']; ?>"><br>

        <label for="categoryID">Category ID:</label>
        <input type="number" name="categoryID" value="<?php echo $product['CategoryID']; ?>" required><br>

        <input type="submit" value="Update Product">
    </form>
</body>

</html>