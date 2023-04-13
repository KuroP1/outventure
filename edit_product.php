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
        $category = $_POST['category'];
        $subCategory = $_POST['subCategory'];


        // update the product record in the database
        $sql = "UPDATE Products SET ProductName=?, ProductDescription=?, ProductQuantity=?, ProductSize=?, ProductColor=?, CategoryName=?, SubCategoryName=? WHERE ProductID=?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssissssi", $productName, $productDescription, $productQuantity, $productSize, $productColor, $category, $subCategory, $productID);
            mysqli_stmt_execute($stmt);
            //echo "<div class='alert alert-success'>Product updated successfully.</div>";
            // header("Location: admin_dashboard.php");
        } else {
            die("Something went wrong");
        }

        if ($_FILES['productImage']) {
            // insert the new images
            $countImg = count($_FILES["productImage"]["name"]);

            for ($i = 0; $i < $countImg; $i++) {
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
                            $sql2 = "INSERT INTO Images (ImagePath, ProductName) VALUES (?, ?)";
                            $stmt2 = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                                echo "SQL statement failed!";
                            } else {
                                mysqli_stmt_bind_param($stmt2, "ss", $image_upload_path, $productName);
                                mysqli_stmt_execute($stmt2);

                                header("Location: admin_dashboard.php");
                            }
                        } else {
                            $em = "You can't upload files of this type";
                            header("Location: admin_dashboard.php?error=$em");
                        }
                    }

                }
            }
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

    // get the current image
    $sql2 = "SELECT * FROM images WHERE ProductName=?";
    $stmt2 = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt2, $sql2)) {
        mysqli_stmt_bind_param($stmt2, "i", $product['ProductName']);
        mysqli_stmt_execute($stmt2);
        $imagePath = array();
        $result = mysqli_stmt_get_result($stmt2);
        if ($result->num_rows > 0) {
            while ($images = $result->fetch_assoc()) {
                if ($images['ProductName'] == $product['ProductName']) {
                    array_push($imagePath, $images['ImagePath']);
                }
            }
            $imageCount = count($imagePath);
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
    <form action="edit_product.php?id=<?php echo $productID; ?>" method="POST" enctype="multipart/form-data">
        <label for="productImage[]">Product Image:</label><br>
        <input type="file" name="productImage[]" multiple><br>
        <?php foreach ($imagePath as $image) { ?>
            <img src="<?php echo $image; ?>" alt="product image" width="100" height="100">
            <!-- handle delete image -->
            <a
                href="deleteimage.php?image=<?php echo $image; ?>&name=<?php echo $product['ProductName']; ?>&id=<?php echo $productID; ?>&length=<?php echo $imageCount; ?>">Delete</a>
        <?php } ?>

        <br>
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

        <label for="category">Category:</label>
        <select id="category" type="select" name="category" onchange="myFunction()" required>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            require("config/database.php");
            $viewSQL = "SELECT * FROM categories";
            $res = mysqli_query($conn, $viewSQL);
            if (mysqli_num_rows($res) > 0) {
                while ($categories = mysqli_fetch_assoc($res)) {
                    if ($categories['CategoryName'] == $product['CategoryName']) {
                        echo "<option value='" . $categories['CategoryName'] . "' selected>" . $categories['CategoryName'] . "</option>";
                    } else {
                        echo "<option value='" . $categories['CategoryName'] . "'>" . $categories['CategoryName'] . "</option>";
                    }
                }
            }
            ?>
        </select><br>

        <label for="subCategory">Sub Category:</label>
        <select id="subCategory" type="select" name="subCategory" required>
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            require("config/database.php");
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
        </select><br>

        <input type="submit" value="Update Product">
    </form>
</body>

</html>

<script>
    var fullCategoriesArray = <?php echo json_encode($subCategoriesArray); ?>;
    var categoriesArray = [];
    var subCategoriesArray = [];

    var currentCate = <?php echo json_encode($product['CategoryName']); ?>;
    var currentSubCate = <?php echo json_encode($product['SubCategoryName']); ?>;

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

    function setDefaultSubCategory() {
        var selectElement = document.getElementById('subCategory');
        while (selectElement.options.length > 0) {
            selectElement.remove(0);
        }

        for (var i = 0; i < categoriesArray.length; i++) {
            if (currentCate == categoriesArray[i]) {
                // create option for subcategory
                var mySelect = document.getElementById('subCategory'),
                    newOption = document.createElement('option');
                newOption.value = subCategoriesArray[i];
                newOption.innerHTML = subCategoriesArray[i];
                mySelect.appendChild(newOption);
            }
        }

        document.getElementById("subCategory").value = currentSubCate;
    }

    setDefaultSubCategory();
</script>