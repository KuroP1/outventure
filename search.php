<?php
// Include the searchProducts.php file
require_once("searchProducts.php");

// Call the searchProductByName function with the input value
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $results = searchProductByName($name);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Results</title>
</head>

<body>
    <h1>Search Results</h1>
    <?php if (isset($results)): ?>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Size</th>
            <th>Product Color</th>
        </tr>
        <?php foreach ($results as $row): ?>
        <tr>
            <td>
                <?php echo $row['product_name']; ?>
            </td>
            <td>
                <?php echo $row['product_des']; ?>
            </td>
            <td>
                <?php echo $row['product_size']; ?>
            </td>
            <td>
                <?php echo $row['product_color']; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</body>

</html>