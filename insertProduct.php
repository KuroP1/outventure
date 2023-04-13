<?php
// include the database connection code here
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES['productImage']) {
    // get the form input values
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productQuantity = $_POST['productQuantity'];
    $productSize = $_POST['productSize'];
    $productColor = $_POST['productColor'];
    $category = $_POST['category'];
    $subCategory = $_POST['subCategory'];
    $productPrice = $_POST['productPrice']; 

    require_once 'config/database.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //add a checking function if product is already exist
    $productfindquery = "SELECT * FROM Products WHERE ProductName=?";
    $productfindstmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($productfindstmt, $productfindquery)) {
        mysqli_stmt_bind_param($productfindstmt, "s", $productName);
        mysqli_stmt_execute($productfindstmt);
        $productfindresult = mysqli_stmt_get_result($productfindstmt);
        if ($productfindresult->num_rows > 0) {
            echo "<div class='alert alert-danger'>Product is already exist.</div>";
        } else {
            //add a checking function if categoryID is valid, if valid then insert the product
            $findCategoryquery = "SELECT * FROM Categories WHERE CategoryName=?";
            $findCategorystmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($findCategorystmt, $findCategoryquery)) {
                mysqli_stmt_bind_param($findCategorystmt, "i", $category);
                mysqli_stmt_execute($findCategorystmt);
                $findCategoryresult = mysqli_stmt_get_result($findCategorystmt);
                if ($findCategoryresult->num_rows > 0) {
                    // multiple images
                    $countImg = count($_FILES["productImage"]["name"]);
                    for ($i = 0; $countImg; $i++) {
                        $tmpname = $_FILES['productImage']['tmp_name'][$i];
                        $error = $_FILES['productImage']['error'][$i];
                        if ($error === 0) {
                            // count how many files are uploaded
                            $img_name = $_FILES['productImage']['name'][$i];
                            $img_size = $_FILES['productImage']['size'][$i];

                            if ($img_size > 1250000) {
                                $em = "Sorry, your file is too large.";
                                header("Location: admindashboard.php?error=$em");
                            } else {
                                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                $img_ex_lc = strtolower($img_ex);

                                $allowed_exs = array("jpg", "jpeg", "png");

                                if (in_array($img_ex_lc, $allowed_exs)) {
                                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                    $image_upload_path = 'uploads/' . $new_img_name;
                                    move_uploaded_file($tmpname, $image_upload_path);

                                    // Insert into database
                                    $sql = "INSERT INTO Products (ProductName, ProductDescription, ProductPrice, ProductQuantity, ProductSize, ProductColor, CategoryName, SubCategoryName) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                                    $sql2 = "INSERT INTO Images (ImagePath, ProductName) VALUES (?, ?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    $stmt2 = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql) || !mysqli_stmt_prepare($stmt2, $sql2)) {
                                        echo "SQL statement failed!";
                                    } else {

                                        if ($i == 0) {
                                            mysqli_stmt_bind_param($stmt, "ssiissss", $productName, $productDescription, $productPrice, $productQuantity, $productSize, $productColor, $category, $subCategory);
                                            mysqli_stmt_execute($stmt);
                                        }

                                        mysqli_stmt_bind_param($stmt2, "ss", $image_upload_path, $productName);
                                        mysqli_stmt_execute($stmt2);

                                        header("Location: admin_dashboard.php");
                                    }
                                } else {
                                    $em = "You can't upload files of this type";
                                    header("Location: admin_dashboard.php?error=$em");
                                }
                            }
                        } else {
                            die("Something went wrong");
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>Category ID is not valid.</div>";
                }
            } else {
                die("Something went wrong");
            }
        }
    }
}

//close the database connection
mysqli_close($conn);
?>