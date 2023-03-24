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
    $search_query = $_GET['search'];

    // Sanitize the search query to prevent SQL injection
    $search_query = $conn->real_escape_string($search_query);

    // Prepare SQL query using LIKE to search for partial product names
    $sql = "SELECT * FROM Products WHERE ProductName LIKE '%$search_query%'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any results were found
    if ($result->num_rows > 0) {
        // Output the results in an HTML table
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Product ID</th>";
        echo "<th>Product Name</th>";
        echo "<th>Product Description</th>";
        echo "<th>Product Quantity</th>";
        echo "<th>Product Size</th>";
        echo "<th>Product Color</th>";
        echo "<th>Positive Vote</th>";
        echo "<th>Category ID</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ProductID"] . "</td>";
            echo "<td>" . $row["ProductName"] . "</td>";
            echo "<td>" . $row["ProductDescription"] . "</td>";
            echo "<td>" . $row["ProductQuantity"] . "</td>";
            echo "<td>" . $row["ProductSize"] . "</td>";
            echo "<td>" . $row["ProductColor"] . "</td>";
            echo "<td>" . $row["PositiveVote"] . "</td>";
            echo "<td>" . $row["CategoryID"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
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