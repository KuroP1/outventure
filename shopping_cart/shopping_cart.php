<?php
session_start();
if (!isset($_SESSION['currentUser'])) {
    header("Location: ../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Outventure</title>
    <link rel='stylesheet' href='../global.css'>
    <link rel='stylesheet' href='shopping_cart.css'>
    <link rel='stylesheet' href='modal.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../images/Logo_Small.png">
    <script src='shopping_cart.js'></script>
    <script src='../navbar.js'></script>
</head>

<body>
    <div>
        <!-- NavBar -->
        <div class='sub-navbar'>
            <div class='sub-navbar-container'>
                <a href='/'><img class='sub-navbar-logo' src='../images/Logo2.png' alt='Logo' /></a>
                <div onclick='ShowMobileMainMenu()' class='main-burger-tag-container'>
                    <svg class='burger-tag' xmlns='http://www.w3.org/2000/svg' width='35' height='35' viewBox='0 0 24 24' style='fill: rgba(255, 255, 255, 1);transform: msFilter;'>
                        <path d='M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z'></path>
                    </svg>
                </div>
                <div class='sub-navbar-middle'>
                    <a href='/index.php#product-section"' class='sub-navbar-middle-text'>Product</a>
                    <a href='/about_us/about_us.php' class='sub-navbar-middle-text'>About Us</a>
                    <a href='/profile/profile.php' class='sub-navbar-middle-text'>Profile</a>
                    <?php
                    if (isset($_SESSION["currentUser"])) {
                        echo '<a href="/authentication/logout.php" class="sub-navbar-middle-text">Logout</a>';
                    } else {
                        echo '<a href="/authentication/login.php" class="sub-navbar-middle-text">Login</a>';
                    }
                    ?>

                    <?php
                    if (isset($_SESSION["currentUser"]) && $_SESSION["isAdmin"] > "0") {
                        echo '<a href="/admin/user.php" class="sub-navbar-middle-text">Admin</a>';
                    }
                    ?>
                </div>
                <div class='sub-navbar-right'>
                    <div class='search-bar'>
                        <input class='search-bar-input' placeholder='Search Product'>
                        <button class='search-icon'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(255, 255, 255, 1);transform: msFilter;'>
                                <path d='M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z'>
                                </path>
                            </svg>
                        </button>
                        </input>
                    </div>
                    <span class='sub-navbar-right-vline'>|</span>
                    <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' style='fill: rgba(255, 255, 255, 1);transform: msFilter;'>
                        <path d='M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921zM17.307 15h-6.64l-2.5-6h11.39l-2.25 6z'>
                        </path>
                        <circle cx='10.5' cy='19.5' r='1.5'></circle>
                        <circle cx='17.5' cy='19.5' r='1.5'></circle>
                    </svg>
                </div>
            </div>
        </div>
        <div id='mobile-sub-navbar-middle' style='transform: translateY(-100%); z-index: -1;'>
            <span id='mobile-sub-navbar-middle-text-1'>Product</span>
            <span id='mobile-sub-navbar-middle-text-2'>About Us</span>
            <span id='mobile-sub-navbar-middle-text-3' style='color: #FFC700;'>Profile</span>
        </div>
    </div>
    <div class='content_container'>
        <div class='cart_list'>
            <div class='container desktop'>
                <div class='cart_title'>
                    Shopping Cart
                </div>
                <div class='row ml-0 cart-header'>
                    <div class='col text-center'>
                        Image
                    </div>
                    <div class='col text-center'>
                        Name
                    </div>
                    <div class='col text-center'>
                        Color
                    </div>
                    <div class='col text-center'>
                        Size
                    </div>
                    <div class='col text-center'>
                        Quantity
                    </div>
                    <div class='col text-center'>
                        Price
                    </div>
                    <div class='col text-center'>
                        Remove
                    </div>
                </div>
                <div class='container p-0'>
                    <?php
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                    require("../config/database.php");
                    $cartSQL = "SELECT * FROM cart";
                    $res = mysqli_query($conn, $cartSQL);

                    if (mysqli_num_rows($res) > 0) {
                        while ($cart = mysqli_fetch_assoc($res)) {
                            if ($cart["Username"] == $_SESSION["currentUser"]) {

                                $productName = $cart['ProductName'];
                                $imageSQL = "SELECT ImagePath FROM images WHERE ProductName = '$productName' LIMIT 1";
                                $res2 = mysqli_query($conn, $imageSQL);
                                $imagePath = '';

                                if (mysqli_num_rows($res2) > 0) {
                                    $image = mysqli_fetch_assoc($res2);
                                    $imagePath = $image['ImagePath'];
                                }

                                echo "
                            <div class='row ml-0 cart-content'>
                            <div class='col text-center'>
                                <img src='$imagePath' height='80px' width='80px' alt='product' />
                            </div>
                            <div class='col text-center'>
                                " . $cart['ProductName'] . "
                            </div>
                            <div class='col text-center'>
                                " . $cart['ProductColor'] . "
                            </div>
                            <div class='col text-center'>
                                " . $cart['ProductSize'] . "
                            </div>
                            <div class='col text-center'>
                                <a class='minus-button' href='/shopping_cart/edit_cart.php?name=" . $cart["CartID"] . "&action=minus&cart=" . $cart["BuyQuantity"] . "'>
                                    <button class='minus-button'>-</button>
                                </a>
                                " . $cart['BuyQuantity'] . "
                                <a class='add-button' href='/shopping_cart/edit_cart.php?name=" . $cart["CartID"] . "&action=add&cart=" . $cart["BuyQuantity"] . "'>
                                    <button class='add-button'>+</button>
                                </a>
                            </div>
                            <div class='col text-center'>
                            " . '$' . $cart['ProductPrice'] . "
                            </div>
                            <div class='col text-center'>
                                <a class='add-button' href='/shopping_cart/edit_cart.php?name=" . $cart["CartID"] . "&action=delete&cart=" . $cart["BuyQuantity"] . "'>
                                    <svg width='26' height='26' viewBox='0 0 26 26' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <g clip-path='url(#clip0_124_294)'>
                                            <path d='M10.8633 21.213C10.6288 21.2379 10.4187 21.0667 10.394 20.8305L9.62933 13.5176C9.60468 13.2815 9.77477 13.0699 10.0093 13.0451L10.434 13.0001C10.6685 12.9753 10.8787 13.1465 10.9033 13.3826L11.668 20.6955C11.6927 20.9317 11.5226 21.1432 11.2881 21.168L10.8633 21.213Z' fill='#BA1A1A' />
                                            <path d='M14.7066 21.168C14.472 21.1432 14.3019 20.9317 14.3266 20.6955L15.0912 13.3826C15.116 13.1465 15.3261 12.9753 15.5606 13.0001L15.9853 13.0451C16.2198 13.0699 16.39 13.2815 16.3653 13.5176L15.6006 20.8305C15.576 21.0667 15.3658 21.2379 15.1312 21.213L14.7066 21.168Z' fill='#BA1A1A' />
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M10.9282 1.84497C10.4158 1.84497 9.95254 2.15243 9.75067 2.62662L8.8024 4.85423H4.66901C3.72567 4.85423 2.96094 5.62411 2.96094 6.57381V8.72327C2.96094 9.59964 3.61213 10.3229 4.45396 10.4293L7.09428 24.3681C7.17412 24.77 7.52463 25.0593 7.93173 25.0593H18.4526C18.8754 25.0593 19.2345 24.7479 19.2972 24.327L21.2169 10.4125C22.0067 10.2612 22.6038 9.56243 22.6038 8.72327V6.57381C22.6038 5.62411 21.8391 4.85423 20.8958 4.85423H16.761L15.8127 2.62662C15.6108 2.15243 15.1477 1.84497 14.6352 1.84497H10.9282ZM14.9026 4.85423L14.5755 4.08565C14.4409 3.76952 14.1321 3.56455 13.7905 3.56455H11.7729C11.4313 3.56455 11.1225 3.76952 10.9879 4.08565L10.6608 4.85423H14.9026ZM19.4515 10.8196C19.4813 10.6046 19.314 10.4129 19.0969 10.4135L6.63442 10.4418C6.41104 10.4424 6.24295 10.6455 6.28426 10.8651L8.49492 22.6119C8.57434 23.034 8.94295 23.3397 9.37237 23.3397H16.9394C17.3852 23.3397 17.7627 23.0109 17.8239 22.5693L19.4515 10.8196ZM20.0417 8.72327C20.5133 8.72327 20.8958 8.33834 20.8958 7.86349V7.4336C20.8958 6.95875 20.5133 6.57381 20.0417 6.57381H5.52305C5.05137 6.57381 4.66901 6.95875 4.66901 7.4336V7.86349C4.66901 8.33834 5.05137 8.72327 5.52304 8.72327H20.0417Z' fill='#BA1A1A' />
                                        </g>
                                        <defs>
                                            <clipPath id='clip0_124_294'>
                                                <rect width='25' height='25' fill='white' transform='translate(0.283203 0.952148)' />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                            ";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class='mobile'>
                <div class='cart_title'>
                    Shopping Cart
                </div>
                <!-- item-card -->
                <div class='cart-content-mobile-container'>
                    <?php
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                    require("../config/database.php");
                    $cartSQL = "SELECT * FROM cart";
                    $res = mysqli_query($conn, $cartSQL);

                    if (mysqli_num_rows($res) > 0) {
                        while ($cart = mysqli_fetch_assoc($res)) {
                            if ($cart["Username"] == $_SESSION["currentUser"]) {

                                $productName = $cart['ProductName'];
                                $imageSQL = "SELECT ImagePath FROM images WHERE ProductName = '$productName' LIMIT 1";
                                $res2 = mysqli_query($conn, $imageSQL);
                                $imagePath = '';

                                if (mysqli_num_rows($res2) > 0) {
                                    $image = mysqli_fetch_assoc($res2);
                                    $imagePath = $image['ImagePath'];
                                }

                                echo "
                                <div class='cart-content-mobile'>
                                <img src='$imagePath' height='80px' width='80px' alt='product' />
                                <div class='mobile_content'>
                                    <div class='name'>
                                        " . $cart['ProductName'] . "
                                    </div>
                                    <div class='content'>
                                        <span class='header'>
                                            Color:
                                        </span>
                                        <span>
                                            " . $cart['ProductColor'] . "
                                        </span>
                                    </div>
                                    <div class='content'>
                                        <span class='header'>
                                            Size:
                                        </span>
                                        <span>
                                            " . $cart['ProductSize'] . "
                                        </span>
                                    </div>
                                    <div class='content'>
                                        <span class='header'>
                                            Quantity:
                                        </span>
                                        <span>
                                            " . $cart['BuyQuantity'] . "
                                        </span>
                                    </div>
                                    <div class='col text-center'>
                                    <a class='minus-button' href='/shopping_cart/edit_cart.php?name=" . $cart["CartID"] . "&action=minus&cart=" . $cart["BuyQuantity"] . "'>
                                        <button class='minus-button'>-</button>
                                    </a>
                                    " . $cart['BuyQuantity'] . "
                                    <a class='add-button' href='/shopping_cart/edit_cart.php?name=" . $cart["CartID"] . "&action=add&cart=" . $cart["BuyQuantity"] . "'>
                                        <button class='add-button'>+</button>
                                    </a>
                                </div>
                                    <div class='content'>
                                        <span class='header'>
                                            Price:
                                        </span>
                                        <span>
                                            " . '$' . $cart['ProductPrice'] . "
                                        </span>
                                    </div>
                                    <div class='col text-center pt-2'>
                                        <a class='add-button' href='/shopping_cart/edit_cart.php?name=" . $cart["CartID"] . "&action=delete&cart=" . $cart["BuyQuantity"] . "'>
                                            <svg width='26' height='26' viewBox='0 0 26 26' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                <g clip-path='url(#clip0_124_294)'>
                                                    <path d='M10.8633 21.213C10.6288 21.2379 10.4187 21.0667 10.394 20.8305L9.62933 13.5176C9.60468 13.2815 9.77477 13.0699 10.0093 13.0451L10.434 13.0001C10.6685 12.9753 10.8787 13.1465 10.9033 13.3826L11.668 20.6955C11.6927 20.9317 11.5226 21.1432 11.2881 21.168L10.8633 21.213Z' fill='#BA1A1A' />
                                                    <path d='M14.7066 21.168C14.472 21.1432 14.3019 20.9317 14.3266 20.6955L15.0912 13.3826C15.116 13.1465 15.3261 12.9753 15.5606 13.0001L15.9853 13.0451C16.2198 13.0699 16.39 13.2815 16.3653 13.5176L15.6006 20.8305C15.576 21.0667 15.3658 21.2379 15.1312 21.213L14.7066 21.168Z' fill='#BA1A1A' />
                                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M10.9282 1.84497C10.4158 1.84497 9.95254 2.15243 9.75067 2.62662L8.8024 4.85423H4.66901C3.72567 4.85423 2.96094 5.62411 2.96094 6.57381V8.72327C2.96094 9.59964 3.61213 10.3229 4.45396 10.4293L7.09428 24.3681C7.17412 24.77 7.52463 25.0593 7.93173 25.0593H18.4526C18.8754 25.0593 19.2345 24.7479 19.2972 24.327L21.2169 10.4125C22.0067 10.2612 22.6038 9.56243 22.6038 8.72327V6.57381C22.6038 5.62411 21.8391 4.85423 20.8958 4.85423H16.761L15.8127 2.62662C15.6108 2.15243 15.1477 1.84497 14.6352 1.84497H10.9282ZM14.9026 4.85423L14.5755 4.08565C14.4409 3.76952 14.1321 3.56455 13.7905 3.56455H11.7729C11.4313 3.56455 11.1225 3.76952 10.9879 4.08565L10.6608 4.85423H14.9026ZM19.4515 10.8196C19.4813 10.6046 19.314 10.4129 19.0969 10.4135L6.63442 10.4418C6.41104 10.4424 6.24295 10.6455 6.28426 10.8651L8.49492 22.6119C8.57434 23.034 8.94295 23.3397 9.37237 23.3397H16.9394C17.3852 23.3397 17.7627 23.0109 17.8239 22.5693L19.4515 10.8196ZM20.0417 8.72327C20.5133 8.72327 20.8958 8.33834 20.8958 7.86349V7.4336C20.8958 6.95875 20.5133 6.57381 20.0417 6.57381H5.52305C5.05137 6.57381 4.66901 6.95875 4.66901 7.4336V7.86349C4.66901 8.33834 5.05137 8.72327 5.52304 8.72327H20.0417Z' fill='#BA1A1A' />
                                                </g>
                                                <defs>
                                                    <clipPath id='clip0_124_294'>
                                                        <rect width='25' height='25' fill='white' transform='translate(0.283203 0.952148)' />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            ";
                            }
                        }
                    }
                    ?>
                    <!-- mobile ver end -->
                </div>
            </div>
        </div>
        <div class='buy_info'>
            <div class='delivery_address_container'>
                <div class='title'> Delivery Address</div>
                <div class='description'> please input Delivery Address</div>

                <div class='input_field'>

                    <div class='district_input'>
                        <div class='title'>
                            District
                        </div>
                        <select class='district_select' name='district' id='district'>
                            <option value='Central and Western'>Central and Western</option>
                            <option value='Eastern'>Eastern</option>
                            <option value='Islands'>Islands</option>
                            <option value='Kowloon City'>Kowloon City</option>
                            <option value='Kwai Tsing'>Kwai Tsing</option>
                            <option value='Kwun Tong'>Kwun Tong</option>
                            <option value='North'>North</option>
                            <option value='Sai Kung'>Sai Kung</option>
                            <option value='Sha Tin'>Sha Tin</option>
                            <option value='Sham Shui Po'>Sham Shui Po</option>
                            <option value='Southern'>Southern</option>
                            <option value='Tai Po'>Tai Po</option>
                            <option value='Tsuen Wan'>Tsuen Wan</option>
                            <option value='Tuen Mun'>Tuen Mun</option>
                            <option value='Wan Chai'>Wan Chai</option>
                            <option value='Wong Tai Sin'>Wong Tai Sin</option>
                            <option value='Yau Tsim Mong'>Yau Tsim Mong</option>
                            <option value='Yuen Long'>Yuen Long</option>
                        </select>
                    </div>
                    <div class='address'>
                        <div class='title'>
                            Address
                        </div>
                        <input class='address_input' type='text' name='address' id='address' placeholder='Address'>
                    </div>
                    <div class='location_detail'>
                        <div class='location_input'>
                            <div class='location_input_content'>
                                <div class='title'>
                                    Block
                                </div>
                                <input class='location_block' type='text' name='block' id='block' placeholder='Address'>
                            </div>
                            <div class='location_input_content'>
                                <div class='title'>
                                    Floor
                                </div>
                                <input class='location_floor' type='text' name='floor' id='floor' placeholder='Address'>
                            </div>
                            <div class='location_input_content'>
                                <div class='title'>
                                    Room
                                </div>
                                <input class='location_room' type='text' name='room' id='room' placeholder='Address'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='payment_method_container'>
                <div class='title'> Payment Method</div>
                <div class='description'> Select your payment method</div>
                <div class='container'>
                    <div class='row'>
                        <button onclick="SetPayment('fps')" class='col payment fps'>
                            <img width='70' src='../images/Shopping_Cart/fps.png' alt='fps' />
                        </button>
                        <button onclick="SetPayment('payme')" class='col payment'>
                            <img width='100' src='../images/Shopping_Cart/payme.png' alt='payme' />
                        </button>
                    </div>
                    <div class='row'>
                        <button onclick="SetPayment('alipay')" class='col payment'>
                            <img width='80' src='../images/Shopping_Cart/alipay.png' alt='alipay' />
                        </button>
                        <button onclick="SetPayment('cash')" class='col payment'>
                            <img width='80' src='../images/Shopping_Cart/cash-payment.png' alt='cash-payment' />
                        </button>
                    </div>
                </div>
                <button onclick="OpenPopup()" id="checkOutButton" class='btn btn-primary' type='submit'>Confirm</button>
            </div>
        </div>
    </div>
    <div class='total_price_full'>
        <div class='total_price'>
            <div class='total_price_container'>
                <span>Total Price:</span>
                <?php
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                require("../config/database.php");
                $cartSQL = "SELECT ProductPrice, Username FROM cart";
                $res = mysqli_query($conn, $cartSQL);

                $total = 0;

                // Loop through the results and calculate the total price
                while ($row = mysqli_fetch_assoc($res)) {
                    if ($row["Username"] == $_SESSION["currentUser"]) {
                        $total += $row['ProductPrice'];
                    }
                }

                // Close the database connection
                mysqli_close($conn);

                // Display the total price
                echo "$";
                echo $total;
                ?>
                </span>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div id="checkOutModal" class="checkOutModal">
        <!-- Modal content -->
        <div class="checkOutModal-content">
            <span class="close">&times;</span>
            <div class="modal-detail">
                <h3>Address Detail:</h3>
                <span id="addressInfo1"></span>
                <span id="addressInfo2"></span>
                <span id="addressInfo3"></span>
                <span id="addressInfo4"></span>
                <span id="addressInfo5"></span>
                <h3 id="paymentMethod"></h3>
                <span id="message" class="message"></span>
                <img id="paymentCode" src="" width="250">
                <button onclick="Checkout()" id="checkOutButton" class='btn btn-primary' type='submit'>Check
                    Out</button>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    var payment = ""
    var district = ""
    var address = ""
    var block = ""
    var floor = ""
    var room = ""

    // Get the modal
    var modal = document.getElementById("checkOutModal");

    // Get the button that opens the modal
    var btn = document.getElementById("checkOutButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function SetPayment(pay) {
        if (pay === "alipay") {
            payment = "Alipay"
            document.getElementById("paymentMethod").innerHTML = "Payment: Alipay"
            document.getElementById("paymentCode").src = "../images/Shopping_Cart/AlipayQRCode.png"
            document.getElementById("message").innerHTML =
                "Scan the following QR Code to pay and click \"Check Out\". After checkout, please send us the payment verification by screen cap to +852 5577 8560."
        } else if (pay === "cash") {
            payment = "Cash On Delivery"
            document.getElementById("paymentMethod").innerHTML = "Payment: Cash"
            document.getElementById("paymentCode").src = ""
            document.getElementById("message").innerHTML = "Click \"Check Out\" to order and pay for cash upon delivery"
        } else if (pay === "fps") {
            payment = "FPS"
            document.getElementById("paymentMethod").innerHTML = "Payment: FPS"
            document.getElementById("paymentCode").src = "../images/Shopping_Cart/FPSQRCode.png"
            document.getElementById("message").innerHTML =
                "Scan the following QR Code to pay and click \"Check Out\". After checkout, please send us the payment verification by screen cap to +852 5577 8560."
        } else if (pay === "payme") {
            payment = "PayMe"
            document.getElementById("paymentMethod").innerHTML = "Payment: PayMe"
            document.getElementById("paymentCode").src = "../images/Shopping_Cart/PayMeQRCode.png"
            document.getElementById("message").innerHTML =
                "Scan the following QR Code to pay and click \"Check Out\". After checkout, please send us the payment verification by screen cap to +852 5577 8560."
        }
    }

    // function popup() {}
    function OpenPopup() {
        district = document.getElementById("district").value
        address = document.getElementById("address").value
        block = document.getElementById("block").value
        floor = document.getElementById("floor").value
        room = document.getElementById("room").value
        if (district == "" || address == "" || block == "" || floor == "" || room == "") {
            alert("Please fill in all the address information")
        } else {
            document.getElementById("addressInfo1").innerHTML = "District: " + district
            document.getElementById("addressInfo2").innerHTML = "Address: " + address
            document.getElementById("addressInfo3").innerHTML = "Block: " + block
            document.getElementById("addressInfo4").innerHTML = "Floor: " + floor
            document.getElementById("addressInfo5").innerHTML = "Room: " + room
            modal.style.display = "block";
        }
    }

    // post value handle
    function Checkout() {
        var wholeAddress = district + "," + address + "," + block + "," + floor + "," + room

        let data = {
            address: wholeAddress,
            payment: payment
        }

        fetch("purchase.php", {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }).then(
            alert('Successful Payment!')
        )

        window.location.href = "../index.php"
    }
</script>