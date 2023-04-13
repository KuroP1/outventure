<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outventure</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="navbar.js"></script>
    <script src="index.js"></script>
    <script src="admin.js"></script>
</head>

<body>
    <div class="top-section" id="top-section">
        <div class="navigationSection">
            <div class="navBar">
                <a href="/outventure">
                    <img class="Logo" src="images/Logo2.png" alt="Logo" />
                </a>
                <div class="navigation">
                    <a class="navItem" href="index.php">Product</a>
                    <a class="navItem" href="/outventure/about_us/about_us.php">About Us</a>
                    <a class="navItem" href="/outventure/profile/profile.php">Profile</a>
                    <?php
                    if (isset($_SESSION["currentUser"])) {
                        echo '<a href="/outventure/authentication/logout.php" class="sub-navbar-middle-text">Logout</a>';
                    } else {
                        echo '<a href="/outventure/authentication/login.php" class="sub-navbar-middle-text">Login</a>';
                    }
                    ?>

                    <?php
                    if (isset($_SESSION["currentUser"]) && $_SESSION["isAdmin"] > "0") {
                        echo '<a href="/outventure/admin/user.php" class="sub-navbar-middle-text">Admin</a>';
                    }
                    ?>
                </div>
                <div class="product">
                    <div class="search-bar">
                        <form action="search.php" method="GET">
                            <input class="search-bar-input" placeholder="Search Product" type"text" name="name" id="name">

                        </form>
                        <button class="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
                                <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                                </path>
                            </svg>
                        </button>
                        </input>
                    </div>
                    <div class="vl"></div>
                    <a class="shopping-cart" href='/outventure/shopping_cart/shopping_cart.php'>
                        <img class="shopping-cart-icon" src="images/Home/shopping-cart.png" alt="Shopping Cart" />
                    </a>
                </div>
                <div class="menu-bar">
                    <svg id="burger-btn" class="ham hamRotate ham1" viewBox="0 0 100 100" width="60" onclick="toggleActive()">
                        <path class="line top" d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                        <path class="line middle" d="m 30,50 h 40" />
                        <path class="line bottom" d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
                    </svg>
                </div>
            </div>
            <div class="top-menu" id="top-menu">
                <div class="search-bar-mobile">

                    <form action="../search.php" method="GET">
                        <input class="search-bar-input" placeholder="Search Product" type"text" name="name" id="name">

                    </form>
                    <button class="search-icon-mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
                            <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                            </path>
                        </svg>
                    </button>
                    </input>
                </div>
                <a class="navItem" href="index.php">Product</a>
                <a class="navItem" href="/outventure/about_us/about_us.php">About Us</a>
                <a class="navItem" href="/outventure/profile/profile.php">Profile</a>
                <?php
                if (isset($_SESSION["currentUser"])) {
                    echo '<a href="/outventure/authentication/logout.php" class="sub-navbar-middle-text">Logout</a>';
                } else {
                    echo '<a href="/outventure/authentication/login.php" class="sub-navbar-middle-text">Login</a>';
                }
                ?>

            </div>
        </div>
        <div class="banner-container">
            <img class="banner" src="images/Home/Banner.png" alt="Banner" />
        </div>
        <div class="filter-section">
            <div class="product-label" id="product-label">
                <span class="product-label-text">PRODUCT</span>
            </div>
            <div class="fliters">
                <div>
                    <div class="select-box-title">Sorting</div>
                    <select class="select-box" type="select" onchange="myFunction()" require>
                        <option value="like">Like</option>
                        <option value="highestprice">Highest Price</option>
                        <option value="lowestprice">Lowest Price</option>
                    </select>
                </div>
                <div>
                    <div class="select-box-title">Category</div>
                    <select class="select-box" id="category" type="select" name="category" onchange="myFunction()" required>
                        <?php
                        ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        require("config/database.php");
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
                <div>
                    <div class="select-box-title">Sub-Category</div>
                    <select class="select-box" id="subCategory" type="select" name="subCategory" required>
                        <?php
                        ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        require_once("config/database.php");
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
    </div>
    <div class="product-section">
        <div class="grid-product-list">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">

                    <?php
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);

                    require_once("config/database.php");
                    $productSQL = "SELECT * FROM products";
                    $res = mysqli_query($conn, $productSQL);

                    if (mysqli_num_rows($res) > 0) {
                        while ($product = mysqli_fetch_assoc($res)) {
                            $productName = $product['ProductName'];
                            $imageSQL = "SELECT ImagePath FROM images WHERE ProductName = '$productName' LIMIT 1";
                            $res2 = mysqli_query($conn, $imageSQL);
                            $imagePath = '';
                            $svgFillColor = 'transparent';

                            if (mysqli_num_rows($res2) > 0) {
                                $image = mysqli_fetch_assoc($res2);
                                $imagePath = $image['ImagePath'];
                                $imagePath = str_replace("../", "", $imagePath);
                            }

                            // check if product and username is in favourite
                            if (isset($_SESSION["currentUser"])) {
                                $username = $_SESSION["currentUser"];
                                $favouriteSQL = "SELECT * FROM favourite WHERE Username = '$username' AND ProductName = '$productName'";
                                $favouriteRes = mysqli_query($conn, $favouriteSQL);
                                if (mysqli_num_rows($favouriteRes) > 0) {
                                    $svgFillColor = 'white';
                                }
                            }

                            echo
                            "
                                        <div class='col-12 col-md-6 col-xl-3'>
                                            <div class='product-card'>
                                                <div class='product-image-container'>
                                                    <a href='/outventure/product/product_detail.php?name=" . $product["ProductName"] . "'><img class='product-image' src='$imagePath' alt='Product' /></a>
                                                </div>
                                                <div class='product-name'> " . $product["ProductName"] . "</div>
                                                <div class='product-category'>" . $product["CategoryName"] . " > " . $product["SubCategoryName"] . "</div>
                                                <div class='product-price'>$" . $product["ProductPrice"] . "</div>
                                                <a href='/outventure/add_to_favourite.php?name=" . $product["ProductName"] . "' style='text-decoration:none;'>
                                                <div class='product-star-rating'>
                                                        <?xml version='1.0' encoding='utf-8'?>
                    <svg width='20px' class='like_btn' height='20px' viewBox='0 0 24 24' fill='" . $svgFillColor . "'
                        xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M8 10V20M8 10L4 9.99998V20L8 20M8 10L13.1956 3.93847C13.6886 3.3633 14.4642 3.11604 15.1992 3.29977L15.2467 3.31166C16.5885 3.64711 17.1929 5.21057 16.4258 6.36135L14 9.99998H18.5604C19.8225 9.99998 20.7691 11.1546 20.5216 12.3922L19.3216 18.3922C19.1346 19.3271 18.3138 20 17.3604 20L8 20'
                            stroke='#000000' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' />
                    </svg>
                    " . $product["PositiveVote"] . "

                </div>
                </a>
                <div class='botton-section'>
                    <a href='/outventure/product/product_detail.php?name=" . $product["ProductName"] . "'>View More</a>
                </div>
            </div>
        </div>
        ";
                        }
                    }

                    ?>
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
</script>