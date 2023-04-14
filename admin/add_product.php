<?php
//check session isAdmin is >0
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] <= 0) {
    header("Location: ../index.php");
    exit();
}

// include the database connection code here
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('../config/database.php');

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

    require_once '../config/database.php';
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
            echo "<script>
            alert('Product Already Exist.');
            window.location.href='add_product.php';
            </script>";
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
                    if ($countImg > 5) {
                        echo "<script>
                        alert('You Can Only Ppload At Most 5 Images.');
                        window.location.href='add_product.php';
                        </script>";
                    } else {
                        for ($i = 0; $countImg; $i++) {
                            $tmpname = $_FILES['productImage']['tmp_name'][$i];
                            $error = $_FILES['productImage']['error'][$i];
                            if ($error === 0) {
                                // count how many files are uploaded
                                $img_name = $_FILES['productImage']['name'][$i];
                                $img_size = $_FILES['productImage']['size'][$i];

                                if ($img_size > 1250000) {
                                    echo "<script>
                                    alert('File Size Too Large.');
                                    window.location.href='add_product.php';
                                    </script>";
                                } else {
                                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                    $img_ex_lc = strtolower($img_ex);

                                    $allowed_exs = array("jpg", "jpeg", "png");

                                    if (in_array($img_ex_lc, $allowed_exs)) {
                                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                        $image_upload_path = '../uploads/' . $new_img_name;
                                        move_uploaded_file($tmpname, $image_upload_path);

                                        // Insert into database
                                        $sql = "INSERT INTO Products (ProductName, ProductDescription, ProductPrice, ProductQuantity, ProductSize, ProductColor, CategoryName, SubCategoryName, PositiveVote) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                        $sql2 = "INSERT INTO Images (ImagePath, ProductName) VALUES (?, ?)";
                                        $stmt = mysqli_stmt_init($conn);
                                        $stmt2 = mysqli_stmt_init($conn);
                                        $rating = 0;
                                        if (!mysqli_stmt_prepare($stmt, $sql) || !mysqli_stmt_prepare($stmt2, $sql2)) {
                                            echo "SQL statement failed!";
                                        } else {

                                            if ($i == 0) {
                                                mysqli_stmt_bind_param($stmt, "ssiissssi", $productName, $productDescription, $productPrice, $productQuantity, $productSize, $productColor, $category, $subCategory, $rating);
                                                mysqli_stmt_execute($stmt);
                                            }

                                            mysqli_stmt_bind_param($stmt2, "ss", $image_upload_path, $productName);
                                            mysqli_stmt_execute($stmt2);

                                            echo "<script>
                                            alert('Product Created.');
                                            window.location.href='product.php';
                                            </script>";
                                        }
                                    } else {
                                        echo "<script>
                                        alert('File Type Not Supported.');
                                        window.location.href='add_product.php';
                                        </script>";
                                    }
                                }
                            } else {
                                echo "<script>
                                alert('Please Upload at least 1 Image.');
                                window.location.href='add_product.php';
                                </script>";
                                die();
                            }
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="admin.js"></script>
    <title>Document</title>
</head>

<body onload="toProductEdit()">
    <div class="side_bar">
        <a href=' '>
            <img class="logo" width='200px' src="../images/Logo2.png" alt="logo2" class="logo2">
        </a>
        <div class="nav_section">
            <a href="/admin/user.php" id="user-manage-btn" onclick="toUserManage()">User
                Manage</a>
            <a href="/admin/product.php" id="product-manage-btn" onclick="toProductManage()">Product Manage</a>
            <a href="/admin/order.php" id="order-history-btn" onclick="toOrderHistory()">Order
                History</a>
            <a href="/admin/category.php" id="category-btn" onclick="toCategory()">
                Category Manage</a>
        </div>
        <img class="logo" src="../images/Logo.png" alt="logo2" class="logo2">
    </div>

    <div class="product-edit-section" id="product-edit-section">
        <div class="content" id="content">
            <div class="title">
                Product Manage
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    Add Product
                </div>
            </div>

            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <div class="product-edit-container">
                    <div class="product-edit-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-3 pt-3">
                                    <div class='field'>
                                        <b>Name:</b>
                                        <input class='name-edit-input' type="text" name="productName" id="productName" required>
                                        </input>
                                    </div>
                                </div>
                                <div class="col-3 pt-3">
                                    <div class='field'>
                                        <b>Price:</b>
                                        <input class='name-edit-input' type="number" name="productPrice" min="1" required>
                                        </input>
                                    </div>
                                </div>
                                <div class="col-3 pt-3">
                                    <div class='field'>
                                        <b>Stock:</b>
                                        <input class='name-edit-input' type="number" name="productQuantity" min="1" required>
                                        </input>
                                    </div>
                                </div>
                                <div class="col-3 edit-btn-container">
                                    <label class="edit-btn">
                                        <input id="upload_img" style="display:none;" type="file" name="productImage[]" multiple>
                                        <div id="file-upload-filename">
                                            <span>Upload Image</span>
                                            <svg class='mb-1' width=" 18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7974 0.745559C15.7726 -0.230749 14.1112 -0.230758 13.0865 0.745559L11.6172 2.14539L4.70189 8.73368C4.58979 8.84052 4.51027 8.97435 4.47182 9.12085L3.59713 12.4542C3.52261 12.7382 3.60994 13.0386 3.8272 13.2455C4.04445 13.4525 4.35977 13.5358 4.65785 13.4648L8.15656 12.6314C8.31041 12.5948 8.4508 12.519 8.56294 12.4122L15.4279 5.87183L16.9475 4.42407C17.9723 3.44776 17.9723 1.86484 16.9475 0.888534L16.7974 0.745559ZM14.3234 1.92407C14.665 1.59863 15.2189 1.59863 15.5604 1.92407L15.7105 2.06704C16.0521 2.39248 16.0521 2.92013 15.7105 3.24556L14.8214 4.09266L13.4609 2.74583L14.3234 1.92407ZM12.2237 3.92456L13.5842 5.27138L7.49731 11.0705L5.64784 11.511L6.11019 9.74902L12.2237 3.92456ZM1.82164 5.1563C1.82164 4.69607 2.21325 4.32297 2.69633 4.32297H7.06976C7.55285 4.32297 7.94445 3.94988 7.94445 3.48963C7.94445 3.0294 7.55285 2.6563 7.06976 2.6563H2.69633C1.2471 2.6563 0.0722656 3.77559 0.0722656 5.1563V14.3229C0.0722656 15.7037 1.2471 16.8229 2.69633 16.8229H12.3179C13.7671 16.8229 14.9419 15.7037 14.9419 14.3229V10.1563C14.9419 9.6961 14.5503 9.32293 14.0673 9.32293C13.5842 9.32293 13.1926 9.6961 13.1926 10.1563V14.3229C13.1926 14.7832 12.801 15.1563 12.3179 15.1563H2.69633C2.21325 15.1563 1.82164 14.7832 1.82164 14.3229V5.1563Z" fill="white" />
                                            </svg>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row row-cols-2">
                                <div class='col-12'>
                                    <div class='field'>
                                        <b>Description: Type \\n when you want to start a new line</b>
                                        <textarea class='name-edit-inputarea' type="text" id="productDescription" name="productDescription"></textarea>
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <div class='field'>
                                        <b>Size: Type , when input more than one size (e.g. S, M)</b>
                                        <input class='name-edit-input' type="text" id="size" name="productSize">
                                        </input>
                                    </div>
                                    <div class='field'>
                                        <b>Category</b>
                                        <select class='name-edit-input' id="category" type="select" name="category" onchange="myFunction()" required>
                                            <option value=""></option>
                                            <?php
                                            ini_set('display_errors', 1);
                                            error_reporting(E_ALL);
                                            require("../config/database.php");
                                            $viewSQL = "SELECT * FROM categories";
                                            $res = mysqli_query($conn, $viewSQL);
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($categories = mysqli_fetch_assoc($res)) {
                                                    echo "<option value='" . $categories['CategoryName'] . "'>" . $categories['CategoryName'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class='field'>
                                        <b>Color: Type , when input more than one color (e.g. Red, Yellow)</b>
                                        <input class='name-edit-input' type="category" name="productColor">
                                        </input>
                                    </div>
                                    <div class='field'>
                                        <b>Sub-Category</b>
                                        <select class='name-edit-input' id="subCategory" type="select" name="subCategory" required>
                                            <?php
                                            ini_set('display_errors', 1);
                                            error_reporting(E_ALL);
                                            require("../config/database.php");
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='button-section'>
                                <button class='update-btn' type="submit">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end of table -->
            <div class=" burger_container">
                <svg id="burger-btn" class="ham hamRotate ham1" viewBox="0 0 100 100" width="60" onclick="toggleActive()">
                    <path class="line top" d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                    <path class="line middle" d="m 30,50 h 40" />
                    <path class="line bottom" d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
                </svg>
            </div>
            <div class="dropdown-container" id="dropdown-container">
                <div class="dropdown-content">
                    <img class="logo" src="../images/Logo2.png" alt="logo2" class="logo2">
                    <div class="nav_section">
                        <a href="#" onclick="toUserManage()">User Manage</a>
                        <a href="#" onclick="toProductManage()">Product Manage</a>
                        <a href="#" onclick="toOrderHistory()">Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    // image upload handling
    var input = document.getElementById('upload_img');
    var infoArea = document.getElementById('file-upload-filename');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;

        if (input.files.length === 1) {
            var fileName = input.files[0].name;

            infoArea.textContent = 'File name: ' + fileName;
        } else {
            infoArea.textContent = input.files.length + " files added";
        }
    }
</script>