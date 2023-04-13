<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("../view_products.php");
$products = viewProducts();
if (count($products) > 0) {
    foreach ($products as $product) {
        if ($product["ProductName"] == $_GET["name"]) {
            $productName = $product["ProductName"];
            $productDescription = $product["ProductDescription"];
            $productQuantity = $product["ProductQuantity"];
            $productSize = $product["ProductSize"];
            $productColor = $product["ProductColor"];
            $productCategory = $product["CategoryName"];
            $productSubCategory = $product["SubCategoryName"];
            $productPrice = $product["ProductPrice"];
            $productRating = $product["PositiveVote"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outventure</title>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="product_detail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="../navbar.js"></script>
</head>

<body>
    <div class='content_container'>
        <!-- NavBar -->
        <div class="sub-navbar">
            <div class="sub-navbar-container">
                <a href="/outventure/">
                    <a href="../index.php"><img class="sub-navbar-logo" src="../images/Logo2.png" alt="Logo" /></a>
                    <div onclick="ShowMobileMainMenu()" class="main-burger-tag-container">
                        <svg class="burger-tag" xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                            viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
                            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                        </svg>
                    </div>
                    <div class="sub-navbar-middle">
                        <a href="/outventure/" class="sub-navbar-middle-text">Product</a>
                        <a href="#" class="sub-navbar-middle-text" style="color: #FFC700;">About Us</a>
                        <a href="/outventure/profile/profile.php" class="sub-navbar-middle-text">Profile</a>
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
                    <div class="sub-navbar-right">
                        <div class="search-bar">
                            <form action="../search.php" method="GET">
                                <input class="search-bar-input" placeholder="Search Product" type"text" name="name"
                                    id="name">

                            </form>
                            <button class="search-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
                                    <path
                                        d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                                    </path>
                                </svg>
                            </button>
                            </input>
                        </div>
                        <span class="sub-navbar-right-vline">|</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
                            <path
                                d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921zM17.307 15h-6.64l-2.5-6h11.39l-2.25 6z">
                            </path>
                            <circle cx="10.5" cy="19.5" r="1.5"></circle>
                            <circle cx="17.5" cy="19.5" r="1.5"></circle>
                        </svg>
                    </div>
            </div>
        </div>
        <div id="mobile-sub-navbar-middle" style="transform: translateY(-100%); z-index: -1;">
            <span id="mobile-sub-navbar-middle-text-1">Product</span>
            <span id="mobile-sub-navbar-middle-text-2">About Us</span>
            <span id="mobile-sub-navbar-middle-text-3" style="color: #FFC700;">Profile</span>
        </div>
        <!-- product detail content -->
        <div class="main-container">
            <div class='col-content-container'>
                <div class="product-detail-container">
                    <div class="product-detail-image-container">
                        <!-- slide show container -->
                        <div class="slide-show-container">
                            <!-- left react button -->
                            <div class="left-react-button">
                                <svg fill="#000000" width="100%" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 511.787 511.787" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M508.667,125.707c-4.16-4.16-10.88-4.16-15.04,0L255.76,363.573L18,125.707c-4.267-4.053-10.987-3.947-15.04,0.213
                                            c-3.947,4.16-3.947,10.667,0,14.827L248.293,386.08c4.16,4.16,10.88,4.16,15.04,0l245.333-245.333
                                            C512.827,136.693,512.827,129.867,508.667,125.707z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <!-- image -->
                            <?php
                            ini_set('display_errors', 1);
                            error_reporting(E_ALL);
                            require("../config/database.php");
                            $viewSQL = "SELECT * FROM images ORDER BY ImageID";
                            $res = mysqli_query($conn, $viewSQL);

                            // image array
                            $imageArray = array();

                            if (mysqli_num_rows($res) > 0) {
                                while ($images = mysqli_fetch_assoc($res)) {
                                    if ($images["ProductName"] == $_GET["name"]) {
                                        array_push($imageArray, $images["ImagePath"]);
                                    }
                                }
                            }
                            ?>
                            <img class="slide" src="" alt="">
                            <!-- right react button -->
                            <div class="right-react-button">
                                <svg fill="#000000" width="100%" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 511.787 511.787" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M508.667,125.707c-4.16-4.16-10.88-4.16-15.04,0L255.76,363.573L18,125.707c-4.267-4.053-10.987-3.947-15.04,0.213
                                             c-3.947,4.16-3.947,10.667,0,14.827L248.293,386.08c4.16,4.16,10.88,4.16,15.04,0l245.333-245.333
                                            C512.827,136.693,512.827,129.867,508.667,125.707z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="product-detail-info-container">
                        <div class="product-detail-info">
                            <div class="product-detail-info-title">
                                <span class='product-detail-info-title-text'>
                                    <?php
                                    echo $productName;
                                    ?>
                                </span>
                            </div>
                            <div class="product-detail-info-cate">
                                <?php
                                ini_set('display_errors', 1);
                                error_reporting(E_ALL);
                                require_once("../view_products.php");

                                $colorsArray = array();
                                $products = viewProducts();
                                if (count($products) > 0) {
                                    foreach ($products as $product) {
                                        if ($product["ProductName"] == $_GET["name"]) {
                                            // remove element space 
                                            $colorsArray = explode(",", $product["ProductColor"]);
                                        }
                                    }
                                }
                                ?>
                                <span class="product-detail-info-cate-text">
                                    <?php
                                    echo "$productCategory > $productSubCategory";
                                    ?>
                                    <?php
                                    // check if product and username is in favourite
                                    $svgFillColor = 'transparent';
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
                                        <a href='/outventure/add_to_favourite.php?name=" . $productName . "' style='text-decoration:none;'>
                                            <div class='product-star-rating'>
                                                    <?xml version='1.0' encoding='utf-8'?>
                                    <svg width='20px' class='like_btn' height='20px' viewBox='0 0 24 24'
                                        fill='" . $svgFillColor . "' xmlns='http://www.w3.org/2000/svg'>
                                        <path
                                            d='M8 10V20M8 10L4 9.99998V20L8 20M8 10L13.1956 3.93847C13.6886 3.3633 14.4642 3.11604 15.1992 3.29977L15.2467 3.31166C16.5885 3.64711 17.1929 5.21057 16.4258 6.36135L14 9.99998H18.5604C19.8225 9.99998 20.7691 11.1546 20.5216 12.3922L19.3216 18.3922C19.1346 19.3271 18.3138 20 17.3604 20L8 20'
                                            stroke='#000000' stroke-width='1.5' stroke-linecap='round'
                                            stroke-linejoin='round' />
                                    </svg>
                                    " . $productRating . "
                            </div>
                            </a>
                            ";

                                    ?>
                                </span>
                            </div>

                            <div class="product-detail-info-color">
                                <span class="product-detail-info-color-text">Color: </span>
                                <?php
                                ini_set('display_errors', 1);
                                error_reporting(E_ALL);
                                require_once("../view_products.php");

                                $colorsArray = array();
                                $products = viewProducts();
                                if (count($products) > 0) {
                                    foreach ($products as $product) {
                                        if ($product["ProductName"] == $_GET["name"]) {
                                            // remove element space 
                                            $colorsArray = explode(",", $product["ProductColor"]);
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="product-detail-info-size">
                                <span class="product-detail-info-size-text">Size: </span>
                                <?php
                                ini_set('display_errors', 1);
                                error_reporting(E_ALL);
                                require_once("../view_products.php");

                                $sizesArray = array();
                                $products = viewProducts();
                                if (count($products) > 0) {
                                    foreach ($products as $product) {
                                        if ($product["ProductName"] == $_GET["name"]) {
                                            $sizesArray = explode(",", $product["ProductSize"]);
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="product-detail-info-price">
                                <span class="product-detail-info-price-text">
                                    Price:
                                    <?php
                                    echo "$" . $productPrice;
                                    ?>
                                </span>
                            </div>
                            <div class="counter">
                                <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                <input type="text" value="1">
                                <span class="up" onClick='increaseCount(event, this)'>+</span>
                            </div>
                            <div class="product-detail-info-addtocart">
                                <button class="product-detail-info-addtocart-button">Add to Cart</button>

                            </div>
                        </div>
                        <div class="product-detail-spec">
                            <div class="product-detail-info-spec-title">
                                <span class="product-detail-info-spec-text">
                                    <center>Descriptions:</center>
                                </span>
                            </div>
                            <div class="product-detail-info-spec-detail">
                                <span class="product-detail-info-spec-detail-text">
                                    <?php
                                    $productDescription = str_replace("\\n", "<p>", $productDescription);
                                    $productDescription = str_replace("\\", "", $productDescription);
                                    echo nl2br($productDescription);
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='title'>
                    Comment
                </div>
                <div class="product-detail-comment">

                    <div class='comment_content-2'>
                        <div class='top-section'>
                            <?php
                            //get username
                            
                            $username = $_SESSION['currentUser'];
                            echo $username;
                            ?>
                            <div class='name'>
                                <?php
                                //get date
                                $date = date("d/m/Y");
                                echo $date;

                                ?>
                            </div>
                        </div>
                        <div class="comment">
                            <form action="" method="post">
                                <textarea class='comment' name="comment" id="comment" cols="30" rows="10"></textarea>
                                <button type='submit' class='reply-btn'>Reply</button>
                            </form>
                            <?php
                            //user input comment and saved to database
                            if (isset($_POST['comment'])) {
                                $comment = $_POST['comment'];
                                $username = $_SESSION['currentUser'];
                                $date = date("Y-m-d");
                                $product_name = $_GET["name"];
                                // Connect to the database
                                require("../config/database.php");

                                // Check the connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Prepare the SQL query to insert the comment
                                $InsertCommentsql = "INSERT INTO Comments (Comment, Username, ProductName,CommentDate ) VALUES (?, ?, ?, ?)";
                                $InsertCommentstmt = $conn->prepare($InsertCommentsql);
                                $InsertCommentstmt->bind_param("ssss", $comment, $username, $product_name, $date);

                                // Execute the query
                                $InsertCommentstmt->execute();

                                // Close the connection
                                $InsertCommentstmt->close();
                                $conn->close();
                            }
                            ?>

                        </div>

                    </div>
                </div>

                <?php
                //get comment
                ini_set('display_errors', 1);
                error_reporting(E_ALL);

                $product_name = $_GET["name"];
                //view all the comments of the product use sql
                function view_all_comments($product_name)
                {
                    // Connect to the database
                    require("../config/database.php");

                    // Check the connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Prepare the SQL query to fetch comments for the given product name
                    $ViewCommentsql = "SELECT * FROM Comments WHERE ProductName = ?";
                    $ViewCommentstmt = $conn->prepare($ViewCommentsql);
                    $ViewCommentstmt->bind_param("s", $product_name);

                    // Execute the query
                    $ViewCommentstmt->execute();

                    // Fetch the results as an associative array
                    $ViewCommentresult = $ViewCommentstmt->get_result();
                    $comments = $ViewCommentresult->fetch_all(MYSQLI_ASSOC);

                    // Close the connection
                    $ViewCommentstmt->close();
                    $conn->close();

                    // Return the comments
                    return $comments;
                }
                $comments = view_all_comments($product_name);

                //display all the comments
                foreach ($comments as $comment) {
                    echo "<div class='product-detail-comment'>";
                    echo "<div class='comment_content'>";
                    echo $comment['Username'] . "<br>";

                    echo "<br>";
                    echo "<textarea class='comment' name='comment' id='comment' cols='30' rows='10>";
                    echo "</textarea>";
                    echo "<br>";
                    echo "Date: " . $comment['CommentDate'] . "<br>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>



            </div>
        </div>
</body>

</html>
<!-- Option Button -->
<script>
    var colorArray = <?php echo json_encode($colorsArray); ?>;
    var sizeArray = <?php echo json_encode($sizesArray); ?>;
    // post value handle
    var productName = <?php echo json_encode($productName); ?>;
    var productPrice = <?php echo json_encode($productPrice); ?>;
    var productCategory = <?php echo json_encode($productCategory); ?>;
    var productSubCategory = <?php echo json_encode($productSubCategory); ?>;
    var buyQuantity = 1;
    var selectedColor = "";
    var selectedSize = "";


    // handle counter
    function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
        buyQuantity = value;
    }

    function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value) ? 0 : value;
            value--;
            input.value = value;
            buyQuantity = value;
        }
    }

    for (var i = 0; i < colorArray.length; i++) {
        var button = document.createElement("button");
        button.className = "product-detail-info-color-button";
        button.innerHTML = colorArray[i];
        document.querySelector(".product-detail-info-color").appendChild(button);
    }

    for (var i = 0; i < sizeArray.length; i++) {
        var button = document.createElement("button");
        button.className = "product-detail-info-size-button";
        button.innerHTML = sizeArray[i];
        document.querySelector(".product-detail-info-size").appendChild(button);
    }

    // handle color button
    var colorButtons = document.querySelectorAll(".product-detail-info-color-button");
    for (var i = 0; i < colorButtons.length; i++) {
        colorButtons[i].addEventListener("click", function () {
            for (var j = 0; j < colorButtons.length; j++) {
                colorButtons[j].style.backgroundColor = "white";
                colorButtons[j].style.color = "black";
            }
            this.style.backgroundColor = "#FFC700";
            this.style.color = "white";
            document.querySelector(".product-detail-info-addtocart-button").style.border = "#FFC700";
            selectedColor = this.innerHTML.trim();
        });
    }

    // handle size button
    var sizeButtons = document.querySelectorAll(".product-detail-info-size-button");
    for (var i = 0; i < sizeButtons.length; i++) {
        sizeButtons[i].addEventListener("click", function () {
            for (var j = 0; j < sizeButtons.length; j++) {
                sizeButtons[j].style.backgroundColor = "white";
                sizeButtons[j].style.color = "black";
            }
            this.style.backgroundColor = "#FFC700";
            this.style.color = "white";
            document.querySelector(".product-detail-info-addtocart-button").style.border = "#FFC700";
            selectedSize = this.innerHTML.trim();
        });
    }

    // handle add to cart button
    if (selectedColor === "" || selectedSize === "") {
        document.querySelector(".product-detail-info-addtocart-button").style.color = "white";
        document.querySelector(".product-detail-info-addtocart-button").style.backgroundColor = "gray";
        document.querySelector(".product-detail-info-addtocart-button").style.border = "gray";
        document.querySelector(".product-detail-info-addtocart-button").style.cursor = "pointer";
    }

    document.querySelector(".product-detail-info-addtocart-button").addEventListener("mouseover", function () {
        if (selectedColor !== "" && selectedSize !== "") {
            document.querySelector(".product-detail-info-addtocart-button").style.color = "white";
            document.querySelector(".product-detail-info-addtocart-button").style.backgroundColor = "#FFC700";
            document.querySelector(".product-detail-info-addtocart-button").style.border = "#FFC700";
            document.querySelector(".product-detail-info-addtocart-button").style.cursor = "pointer";
        }
    });

    document.querySelector(".product-detail-info-addtocart-button").addEventListener("click", function () {
        if (selectedColor === "" || selectedSize === "") {
            alert("Please select color and size");
        } else {
            addToCart();
        }
    });

    // post value handle
    function addToCart() {
        let data = {
            productName: productName,
            productPrice: productPrice * buyQuantity,
            buyQuantity: buyQuantity,
            selectedSize: selectedSize,
            selectedColor: selectedColor,
            productCategory: productCategory,
            productSubCategory: productSubCategory,
        }

        fetch("addToCart.php", {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }).then(
            alert('Added To Cart!')
        )

        window.location.href = "../shopping_cart/shopping_cart.php"
    }
</script>

<!-- Image Slider -->
<script>
    // imageArray from php
    var imageArray = <?php echo json_encode($imageArray); ?>;

    // all array index
    var currentImageArrayIndex = 0

    // set first image
    document.querySelector(".slide").src = imageArray[currentImageArrayIndex]

    // handle image next or prev with passed action
    function handleImage(action) {
        if (action === "next") {
            if (currentImageArrayIndex < imageArray.length - 1) {
                currentImageArrayIndex++;
                document.querySelector(".slide").src = imageArray[currentImageArrayIndex]
            } else {
                currentImageArrayIndex = 0;
                document.querySelector(".slide").src = imageArray[currentImageArrayIndex]
            }
        } else {
            if (currentImageArrayIndex > 0) {
                currentImageArrayIndex--;
                document.querySelector(".slide").src = imageArray[currentImageArrayIndex]
            } else {
                currentImageArrayIndex = imageArray.length - 1;
                document.querySelector(".slide").src = imageArray[currentImageArrayIndex]
            }
        }
    }


    // add event listener to next and prev button
    var slideNext = document.querySelector(".right-react-button")
    slideNext.addEventListener("click", function () {
        handleImage("next")
    })
    var slidePrev = document.querySelector(".left-react-button")
    slidePrev.addEventListener("click", function () {
        handleImage("prev")
    })
</script>