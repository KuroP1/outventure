<?php
// include the database connection code here
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the form input values
    $category = $_POST['category'];
    $subCategory = $_POST['subCategory'];

    //add a checking function if product is already exist
    $categoriesfindquery = "SELECT * FROM Categories WHERE CategoryName=?";
    $categoriesfindstmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($categoriesfindstmt, $categoriesfindquery)) {
        mysqli_stmt_bind_param($categoriesfindstmt, "s", $category);
        mysqli_stmt_execute($categoriesfindstmt);
        $categoriesfindresult = mysqli_stmt_get_result($categoriesfindstmt);
        if ($categoriesfindresult->num_rows > 0) {
            echo "<div class='alert alert-danger'>Category is already exist.</div>";
        } else {
            // add cate
            $sql = "INSERT INTO Categories (CategoryName) VALUES (?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed!";
            } else {
                mysqli_stmt_bind_param($stmt, "s", $category);
                mysqli_stmt_execute($stmt);

                header("Location: admin_dashboard.php");
            }

            // add subcate
            $subCategoryArray = explode(",", $subCategory);

            for ($i = 0; $i < count($subCategoryArray); $i++) {
                $subCategoryArray[$i] = str_replace(" ", "", $subCategoryArray[$i]);
            }

            for ($i = 0; $i < count($subCategoryArray); $i++) {
                $sql2 = "INSERT INTO SubCategories (SubCategoryName, CategoryName) VALUES (?, ?)";
                $stmt2 = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                    echo "SQL statement failed!";
                } else {
                    mysqli_stmt_bind_param($stmt2, "ss", $subCategoryArray[$i], $category);
                    mysqli_stmt_execute($stmt2);

                    header("Location: category.php");
                }
            }
        }
    }
}

//close the database connection
mysqli_close($conn);
