<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>

<body>
    <h1>Search Results</h1>

    <?php
    require_once("config/database.php");
    // Get search query from the user input
    $search_query = $_GET['name'];

    // Sanitize the search query to prevent SQL injection
    $search_query = $conn->real_escape_string($search_query);

    // sql query to search for products with exact match
    $sql = "SELECT * FROM Products WHERE ProductName = '$search_query'";



    // Execute the query
    $result = $conn->query($sql);

    // Check if any results were found
    if ($result->num_rows > 0) {
        //go to product_detail with name parameter immediately
        header("Location: /outventure/product/product_detail.php?name=" . $search_query);

    } else {
        echo "No products found matching your search.";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>

</html>

<?php
$content = ob_get_clean();
echo $content;
?>