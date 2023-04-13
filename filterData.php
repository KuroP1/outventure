<?php
$category = isset($_POST['category']) ? $_POST['category'] : '';
$subCategory = isset($_POST['subCategory']) ? $_POST['subCategory'] : '';

// Use the $category and $subCategory variables to sort your data in the database query

// For example, you can modify the WHERE clause in the SQL query to filter by category and sub-category
$sql = "SELECT * FROM products WHERE category = '$category' AND subCategory = '$subCategory'";
$result = mysqli_query($conn, $sql);


// Fetch the sorted data and return it as the response
?>