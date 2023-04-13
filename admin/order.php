<?php
//check session isAdmin is >0
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] <= 0) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="admin.js"></script>
    <title>Document</title>
</head>

<body onload="toOrderHistory()">
    <div class="side_bar">
        <a href=' /outventure'>
            <img class="logo" width='200px' src="../images/Logo2.png" alt="logo2" class="logo2">
        </a>
        <div class="nav_section">
            <a href="/outventure/admin/user.php" id="user-manage-btn" onclick="toUserManage()">User Manage</a>
            <a href="/outventure/admin/product.php" id="product-manage-btn" onclick="toProductManage()">Product
                Manage</a>
            <a href="/outventure/admin/order.php" id="order-history-btn" onclick="toOrderHistory()">Order History</a>
        </div>
        <img class="logo" src="../images/Logo.png" alt="logo2" class="logo2">
    </div>

    <div class="order-history-section" id="order-history-section">
        <div class="content" id="content">
            <div class="title">
                Order History
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    Order List
                </div>
                <button class="user-add-button">
                    Add Product
                </button>
            </div>
            <div class="product-list-container">
                <div class="product-list-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col table-header">
                                ID
                            </div>
                            <div class="col table-header">
                                Create Date
                            </div>
                            <div class="col table-header-2">
                                Username
                            </div>
                            <div class="col table-header-2">
                                Total Price
                            </div>
                            <div class="col table-header">
                                Payment Method
                            </div>
                            <div class="col table-header-2">
                                Status
                            </div>
                            <div class="col table-header-2">
                                Edit
                            </div>
                            <div class="col table-header-2">
                                Remove
                            </div>
                        </div>
                        <hr class="h-line2">
                        <?php
                        ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        require("../config/database.php");
                        $viewOrderSQL = "SELECT OrderID, GROUP_CONCAT(ProductName) as ProductNames, GROUP_CONCAT(BuyQuantity) as BuyQuantities, SUM(Amount) as TotalAmount, Username, OrderDate, paymentMethod, orderStatus
                        FROM orders
                        GROUP BY OrderID, Username, OrderDate, paymentMethod, orderStatus";
                        $resOrder = mysqli_query($conn, $viewOrderSQL);
                        if (mysqli_num_rows($resOrder) > 0) {
                            while ($orders = mysqli_fetch_assoc($resOrder)) {
                                // echo "<tr><td>" . $orders['OrderID'] . "</td><td>" . $orders['ProductNames'] . "</td><td>" . $orders['BuyQuantities'] . "</td><td>" . $orders['TotalAmount'] . "</td><td>" . $orders['Username'] . "</td><td>" . $orders['orderStatus'] . "</td><td>" . $orders['OrderDate'] . "</td><td><a href='edit_order.php?id=" . $orders["OrderID"] . "'>Edit</a></td></tr>";
                                echo
                                    "
                                <div class='row'>
                                <div class='col table-content'>
                                    " . $orders["OrderID"] . "
                                </div>
                                <div class='col table-content'>
                                    " . $orders["OrderDate"] . "
                                </div>
                                <div class='col table-content-2'>
                                    " . $orders["Username"] . "
                                </div>
                                <div class='col table-content-2'>
                                    " . $orders["TotalAmount"] . "
                                </div>
                                <div class='col table-content-2'>
                                    " . $orders["paymentMethod"] . "
                                </div>
                                <div class='col table-content-2'>
                                " . $orders["orderStatus"] . "
                                </div>
                                <div class='col table-content'>
                                    <a href='/outventure/admin/edit_order.php?id=" . $orders["OrderID"] . "' onclick='toProductEdit()'>
                                        <svg width='26' height='26' viewBox='0 0 26 26' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M22.9571 3.6421C21.7367 2.42171 19.7581 2.4217 18.5377 3.6421L16.7879 5.39189L8.55249 13.6273C8.41899 13.7608 8.32429 13.9281 8.2785 14.1112L7.23683 18.2779C7.14808 18.6329 7.25209 19.0084 7.51082 19.267C7.76955 19.5258 8.14506 19.6299 8.50004 19.5411L12.6667 18.4994C12.8499 18.4536 13.0171 18.3589 13.1506 18.2254L21.3261 10.0499L23.1358 8.24024C24.3562 7.01985 24.3562 5.0412 23.1358 3.82082L22.9571 3.6421ZM20.0108 5.11523C20.4176 4.70844 21.0772 4.70844 21.484 5.11523L21.6627 5.29395C22.0695 5.70076 22.0695 6.36031 21.6627 6.7671L20.6039 7.82597L18.9836 6.14244L20.0108 5.11523ZM17.5102 7.61585L19.1304 9.29938L11.8816 16.5483L9.67903 17.0989L10.2296 14.8964L17.5102 7.61585ZM5.1224 9.15553C5.1224 8.58023 5.58877 8.11386 6.16406 8.11386H11.3724C11.9477 8.11386 12.4141 7.6475 12.4141 7.07219C12.4141 6.4969 11.9477 6.03053 11.3724 6.03053H6.16406C4.43818 6.03053 3.03906 7.42964 3.03906 9.15553V20.6138C3.03906 22.3398 4.43818 23.7388 6.16406 23.7388H17.6224C19.3483 23.7388 20.7474 22.3398 20.7474 20.6138V15.4055C20.7474 14.8303 20.281 14.3638 19.7057 14.3638C19.1304 14.3638 18.6641 14.8303 18.6641 15.4055V20.6138C18.6641 21.1891 18.1977 21.6555 17.6224 21.6555H6.16406C5.58877 21.6555 5.1224 21.1891 5.1224 20.6138V9.15553Z' fill='#E1980A' />
                                        </svg>
                                    </a>
                                </div>
                                <div class='col table-content-2'>
                                    <a href='/outventure/admin/delete_product.php?name=" . $orders["OrderID"] . "' onclick='toProductManage()'>
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
                                <hr class='h-line3'>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p>No orders found.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- end of table -->
            <div class="burger_container">
                <svg id="burger-btn" class="ham hamRotate ham1" viewBox="0 0 100 100" width="60"
                    onclick="toggleActive()">
                    <path class="line top"
                        d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                    <path class="line middle" d="m 30,50 h 40" />
                    <path class="line bottom"
                        d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
                </svg>
            </div>
            <div class="dropdown-container" id="dropdown-container">
                <div class="dropdown-content">
                    <img class="logo" src="/images/Logo2.png" alt="logo2" class="logo2">
                    <div class="nav_section">
                        <a href="/outventure/admin/user.php" id="user-manage-btn" onclick="toUserManage()">User
                            Manage</a>
                        <a href="/outventure/admin/product.php" id="product-manage-btn"
                            onclick="toProductManage()">Product Manage</a>
                        <a href="/outventure/admin/order.php" id="order-history-btn" onclick="toOrderHistory()">Order
                            History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>