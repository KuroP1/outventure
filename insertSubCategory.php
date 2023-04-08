<?php
// include the database connection code here
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the form input values
    $category = $_POST['newCategory'];
    $subCategory = $_POST['newSubCategory'];

    // add subcate
    $subCategoryArray = explode(",", $subCategory);

    for ($i = 0; $i < count($subCategoryArray); $i++) {
        $subCategoryArray[$i] = str_replace(" ", "", $subCategoryArray[$i]);
    }

    for ($i = 0; $i < count($subCategoryArray); $i++) {
        $subCategoriesfindquery = "SELECT SubCategoryName, CategoryName FROM SubCategories WHERE SubCategoryName=? AND CategoryName=?";
        $subCategoriesfindstmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($subCategoriesfindstmt, $subCategoriesfindquery)) {
            mysqli_stmt_bind_param($subCategoriesfindstmt, "ss", $subCategoryArray[$i], $category);
            mysqli_stmt_execute($subCategoriesfindstmt);
            $subCategoriesfindresult = mysqli_stmt_get_result($subCategoriesfindstmt);
            if ($subCategoriesfindresult->num_rows > 0) {
                echo "<div class='alert alert-danger'>Sub Category is already exist.</div>";
            } else {
                $sql2 = "INSERT INTO SubCategories (SubCategoryName, CategoryName) VALUES (?, ?)";
                $stmt2 = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                    echo "SQL statement failed!";
                } else {
                    mysqli_stmt_bind_param($stmt2, "ss", $subCategoryArray[$i], $category);
                    mysqli_stmt_execute($stmt2);

                    header("Location: admin_dashboard.php");
                }
            }
        }
    }
}

//close the database connection
mysqli_close($conn);
