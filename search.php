<?php
if (isset($_GET['submit'])) {
    require_once("searchProducts.php");

    $productName = $_GET['product_name'];
    $productColor = $_GET['product_color'];
    $productSize = $_GET['product_size'];

    if (!empty($productName) || !empty($productColor) || !empty($productSize)) {
        // Call the searchProduct function with the input values
        $results = searchProduct($productName, $productColor, $productSize);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Results</title>
</head>

<body>
    <h1>Search Results</h1>
    <?php if (isset($results) && count($results) > 0): ?>
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
    <?php else: ?>
    <p>No results found.</p>
    <?php endif; ?>
</body>

</html>