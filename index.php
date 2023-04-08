<?php
session_start();
if (!isset($_SESSION["currentUser"])) {
    header("Location: authentication/login.php");
}
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
</head>

<body>
    <div class="top-section" id="top-section">
        <div class="navigationSection">
            <div class="navBar">
                <img class="Logo" src="images/Logo2.png" alt="Logo" />
                <div class="navigation">
                    <a class="navItem" href="index.php">Product</a>
                    <a class="navItem" href="index.php">About Us</a>
                    <a class="navItem" href="index.php">Profile</a>
                    <a class="navItem" href="index.php">Login</a>
                </div>
                <div class="product">
                    <div class="search-bar">
                        <input class="search-bar-input" placeholder="Search Product">
                        <button class="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
                                <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                                </path>
                            </svg>
                        </button>
                        </input>
                    </div>
                    <div class="vl"></div>
                    <div class="shopping-cart">
                        <img class="shopping-cart-icon" src="images/Home/shopping-cart.png" alt="Shopping Cart" />
                    </div>
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
                    <input class="search-bar-input-mobile" placeholder="Search Product">
                    <button class="search-icon-mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
                            <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                            </path>
                        </svg>
                    </button>
                    </input>
                </div>
                <a class="navItem">
                    Product
                </a>
                <a class="navItem">
                    About Us
                </a>
                <a class="navItem">
                    Profile
                </a>
                <a class="navItem">
                    Login
                </a>
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
                    <select class="select-box">
                        <option value="0">Recently popular</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                    </select>
                </div>
                <div>
                    <div class="select-box-title">Category</div>
                    <select class="select-box">
                        <option value="0">Hiking</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                    </select>
                </div>
                <div>
                    <div class="select-box-title">Sub-Category</div>
                    <select class="select-box">
                        <option value="0">Backpack</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="product-section">
        <div class="grid-product-list">
            <div class="container-fluid">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="row">
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="row">
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <img class="product-image" src="images/Home/product.png" alt="Product" />
                                    </div>
                                    <div class="product-name">Loowoko 50L Hiking Backpack</div>
                                    <div class="product-category">Hiking Backpack</div>
                                    <div class="product-price">HKD 500</div>
                                    <div class="product-star-rating">
                                        <script>
                                            function ratingStar(rating) {
                                                //return a div with text hello world
                                                for (var i = 0; i < rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-full-icon.png" alt="Star" />'
                                                    );
                                                }
                                                for (var i = 0; i < 5 - rating; i++) {
                                                    document.write(
                                                        '<img class="star" src="images/Home/star-empty-icon.png" alt="Star" />'
                                                    );
                                                }
                                            }
                                            ratingStar(2);
                                        </script>
                                    </div>
                                    <div class="botton-section">
                                        <a href="">Buy Now</a>
                                        <a href="">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>