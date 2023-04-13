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

<body onload="toProductManage()">
    <div class="side_bar">
        <a href=' /outventure'>
            <img class="logo" width='200px' src="../images/Logo2.png" alt="logo2" class="logo2">
        </a>
        <div class="nav_section">
            <a href="#" id="user-manage-btn" onclick="toUserManage()">User Manage</a>
            <a href="#" id="product-manage-btn" onclick="toProductManage()">Product Manage</a>
            <a href="#" id="order-history-btn" onclick="toOrderHistory()">Order History</a>
            <a href="#" id="order-history-btn" onclick="toUserEdit()">User Edit</a>
        </div>
        <img class="logo" src="../images/Logo.png" alt="logo2" class="logo2">
    </div>

    <div class="user-manage-section" id="user-manage-section">
        <div class="content" id="content">
            <div class="title">
                User Manage
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    User List
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
                                Email
                            </div>
                            <div class="col table-header">
                                Username
                            </div>
                            <div class="col table-header">
                                Edit
                            </div>
                            <div class="col table-header-2">
                                Remove
                            </div>
                        </div>

                        <hr class="h-line3">
                        <?php
                        require_once("../view_accounts.php");
                        $accounts = getAccounts();
                        if (count($accounts) > 0) {
                            foreach ($accounts as $account) {
                                if ($account["isAdmin"] == 0) {
                                    echo
                                        "
                                        <div class='row'>
                                        <div class='col table-content'>
                                            " . $account["UserID"] . "
                                        </div>
                                        <div class='col table-content'>
                                            <div class='email'>
                                            " . $account["Email"] . "
                                            </div>
                                        </div>
                                        <div class='col table-content'>
                                            " . $account["Username"] . "
                                        </div>
                                        <div class='col table-content'>
                                            <a href='#'>
                                                <svg width='26' height='26' viewBox='0 0 26 26' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                    <path fill-rule='evenodd' clip-rule='evenodd' d='M22.9571 3.6421C21.7367 2.42171 19.7581 2.4217 18.5377 3.6421L16.7879 5.39189L8.55249 13.6273C8.41899 13.7608 8.32429 13.9281 8.2785 14.1112L7.23683 18.2779C7.14808 18.6329 7.25209 19.0084 7.51082 19.267C7.76955 19.5258 8.14506 19.6299 8.50004 19.5411L12.6667 18.4994C12.8499 18.4536 13.0171 18.3589 13.1506 18.2254L21.3261 10.0499L23.1358 8.24024C24.3562 7.01985 24.3562 5.0412 23.1358 3.82082L22.9571 3.6421ZM20.0108 5.11523C20.4176 4.70844 21.0772 4.70844 21.484 5.11523L21.6627 5.29395C22.0695 5.70076 22.0695 6.36031 21.6627 6.7671L20.6039 7.82597L18.9836 6.14244L20.0108 5.11523ZM17.5102 7.61585L19.1304 9.29938L11.8816 16.5483L9.67903 17.0989L10.2296 14.8964L17.5102 7.61585ZM5.1224 9.15553C5.1224 8.58023 5.58877 8.11386 6.16406 8.11386H11.3724C11.9477 8.11386 12.4141 7.6475 12.4141 7.07219C12.4141 6.4969 11.9477 6.03053 11.3724 6.03053H6.16406C4.43818 6.03053 3.03906 7.42964 3.03906 9.15553V20.6138C3.03906 22.3398 4.43818 23.7388 6.16406 23.7388H17.6224C19.3483 23.7388 20.7474 22.3398 20.7474 20.6138V15.4055C20.7474 14.8303 20.281 14.3638 19.7057 14.3638C19.1304 14.3638 18.6641 14.8303 18.6641 15.4055V20.6138C18.6641 21.1891 18.1977 21.6555 17.6224 21.6555H6.16406C5.58877 21.6555 5.1224 21.1891 5.1224 20.6138V9.15553Z' fill='#E1980A' />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class='col table-content-2'>
                                        <a href=''>
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
                                        <hr class='h-line3'>
                                        ";
                                }
                            }
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
                        <a href="#" onclick="toUserManage()">User Manage</a>
                        <a href="#" onclick="toProductManage()">Product Manage</a>
                        <a href="#" onclick="toOrderHistory()">Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-manage-section" id="product-manage-section">
        <div class="content" id="content">
            <div class="title">
                Product Manage
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    Product List
                </div>
                <button class="product-add-button">
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
                                Name
                            </div>

                            <div class="col table-header-2">
                                Description
                            </div>
                            <div class="col table-header">
                                Quantity
                            </div>
                            <div class="col table-header-2">
                                Rating
                            </div>
                            <div class="col table-header-2">
                                Category
                            </div>
                            <div class="col table-header-2">
                                Sub-Category
                            </div>
                            <div class="col table-header">
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
                        require_once("../view_products.php");
                        $products = viewProducts();
                        if (count($products) > 0) {
                            foreach ($products as $product) {
                                echo
                                    "
                                <div class='row'>
                                <div class='col table-content'>
                                    " . $product["ProductID"] . "
                                </div>
                                <div class='col table-content'>
                                    <div class='product-name'>
                                        " . $product["ProductName"] . "
                                    </div>
                                </div>
                                <div class='col table-content-2'>
                                    <div class='product-description'>
                                        " . $product["ProductDescription"] . "
                                    </div>
                                </div>
                                <div class='col table-content'>
                                    " . $product["ProductQuantity"] . "
                                </div>
                                <div class='col table-content-2'>
                                    " . $product["PositiveVote"] . "
                                </div>
                                <div class='col table-content-2'>
                                    " . $product["CategoryName"] . "
                                </div>
                                <div class='col table-content-2'>
                                    " . $product["SubCategoryName"] . "
                                </div>
                                <div class='col table-content'>
                                    <a href='/outventure/admin/edit_product.php?id=" . $product["ProductID"] . "' onclick='toProductEdit()'>
                                        <svg width='26' height='26' viewBox='0 0 26 26' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M22.9571 3.6421C21.7367 2.42171 19.7581 2.4217 18.5377 3.6421L16.7879 5.39189L8.55249 13.6273C8.41899 13.7608 8.32429 13.9281 8.2785 14.1112L7.23683 18.2779C7.14808 18.6329 7.25209 19.0084 7.51082 19.267C7.76955 19.5258 8.14506 19.6299 8.50004 19.5411L12.6667 18.4994C12.8499 18.4536 13.0171 18.3589 13.1506 18.2254L21.3261 10.0499L23.1358 8.24024C24.3562 7.01985 24.3562 5.0412 23.1358 3.82082L22.9571 3.6421ZM20.0108 5.11523C20.4176 4.70844 21.0772 4.70844 21.484 5.11523L21.6627 5.29395C22.0695 5.70076 22.0695 6.36031 21.6627 6.7671L20.6039 7.82597L18.9836 6.14244L20.0108 5.11523ZM17.5102 7.61585L19.1304 9.29938L11.8816 16.5483L9.67903 17.0989L10.2296 14.8964L17.5102 7.61585ZM5.1224 9.15553C5.1224 8.58023 5.58877 8.11386 6.16406 8.11386H11.3724C11.9477 8.11386 12.4141 7.6475 12.4141 7.07219C12.4141 6.4969 11.9477 6.03053 11.3724 6.03053H6.16406C4.43818 6.03053 3.03906 7.42964 3.03906 9.15553V20.6138C3.03906 22.3398 4.43818 23.7388 6.16406 23.7388H17.6224C19.3483 23.7388 20.7474 22.3398 20.7474 20.6138V15.4055C20.7474 14.8303 20.281 14.3638 19.7057 14.3638C19.1304 14.3638 18.6641 14.8303 18.6641 15.4055V20.6138C18.6641 21.1891 18.1977 21.6555 17.6224 21.6555H6.16406C5.58877 21.6555 5.1224 21.1891 5.1224 20.6138V9.15553Z' fill='#E1980A' />
                                        </svg>
                                    </a>
                                </div>
                                <div class='col table-content-2'>
                                    <a href=''>
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
                        } else {
                            echo "<p>No products found.</p>";
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
                        <a href="#" onclick="toUserManage()">User Manage</a>
                        <a href="#" onclick="toProductManage()">Product Manage</a>
                        <a href="#" onclick="toOrderHistory()">Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="order-history-section" id="order-history-section">
        <div class="content" id="content">
            <div class="title">
                Order History
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    Product List
                </div>
                <button class="product-add-button">
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
                                Name
                            </div>

                            <div class="col table-header-2">
                                Description
                            </div>
                            <div class="col table-header">
                                Quantity
                            </div>
                            <div class="col table-header-2">
                                Rating
                            </div>
                            <div class="col table-header-2">
                                Category
                            </div>
                            <div class="col table-header-2">
                                Sub-Category
                            </div>
                            <div class="col table-header">
                                Edit
                            </div>
                            <div class="col table-header-2">
                                Remove
                            </div>
                        </div>
                        <hr class="h-line2">
                        <div class="row">
                            <div class="col table-content">
                                0
                            </div>
                            <div class="col table-content">
                                <div class="product-name">
                                    Backpack
                                </div>
                            </div>
                            <div class="col table-content-2">
                                <div class="product-description">
                                    Hiking Backpack
                                </div>
                            </div>
                            <div class="col table-content">
                                2
                            </div>
                            <div class="col table-content-2">
                                5
                            </div>
                            <div class="col table-content-2">
                                Hiking
                            </div>
                            <div class="col table-content-2">
                                Sub-Backpack
                            </div>
                            <div class="col table-content">
                                <a href="">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.9571 3.6421C21.7367 2.42171 19.7581 2.4217 18.5377 3.6421L16.7879 5.39189L8.55249 13.6273C8.41899 13.7608 8.32429 13.9281 8.2785 14.1112L7.23683 18.2779C7.14808 18.6329 7.25209 19.0084 7.51082 19.267C7.76955 19.5258 8.14506 19.6299 8.50004 19.5411L12.6667 18.4994C12.8499 18.4536 13.0171 18.3589 13.1506 18.2254L21.3261 10.0499L23.1358 8.24024C24.3562 7.01985 24.3562 5.0412 23.1358 3.82082L22.9571 3.6421ZM20.0108 5.11523C20.4176 4.70844 21.0772 4.70844 21.484 5.11523L21.6627 5.29395C22.0695 5.70076 22.0695 6.36031 21.6627 6.7671L20.6039 7.82597L18.9836 6.14244L20.0108 5.11523ZM17.5102 7.61585L19.1304 9.29938L11.8816 16.5483L9.67903 17.0989L10.2296 14.8964L17.5102 7.61585ZM5.1224 9.15553C5.1224 8.58023 5.58877 8.11386 6.16406 8.11386H11.3724C11.9477 8.11386 12.4141 7.6475 12.4141 7.07219C12.4141 6.4969 11.9477 6.03053 11.3724 6.03053H6.16406C4.43818 6.03053 3.03906 7.42964 3.03906 9.15553V20.6138C3.03906 22.3398 4.43818 23.7388 6.16406 23.7388H17.6224C19.3483 23.7388 20.7474 22.3398 20.7474 20.6138V15.4055C20.7474 14.8303 20.281 14.3638 19.7057 14.3638C19.1304 14.3638 18.6641 14.8303 18.6641 15.4055V20.6138C18.6641 21.1891 18.1977 21.6555 17.6224 21.6555H6.16406C5.58877 21.6555 5.1224 21.1891 5.1224 20.6138V9.15553Z"
                                            fill="#E1980A" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col table-content-2">
                                <a href="">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_124_294)">
                                            <path
                                                d="M10.8633 21.213C10.6288 21.2379 10.4187 21.0667 10.394 20.8305L9.62933 13.5176C9.60468 13.2815 9.77477 13.0699 10.0093 13.0451L10.434 13.0001C10.6685 12.9753 10.8787 13.1465 10.9033 13.3826L11.668 20.6955C11.6927 20.9317 11.5226 21.1432 11.2881 21.168L10.8633 21.213Z"
                                                fill="#BA1A1A" />
                                            <path
                                                d="M14.7066 21.168C14.472 21.1432 14.3019 20.9317 14.3266 20.6955L15.0912 13.3826C15.116 13.1465 15.3261 12.9753 15.5606 13.0001L15.9853 13.0451C16.2198 13.0699 16.39 13.2815 16.3653 13.5176L15.6006 20.8305C15.576 21.0667 15.3658 21.2379 15.1312 21.213L14.7066 21.168Z"
                                                fill="#BA1A1A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.9282 1.84497C10.4158 1.84497 9.95254 2.15243 9.75067 2.62662L8.8024 4.85423H4.66901C3.72567 4.85423 2.96094 5.62411 2.96094 6.57381V8.72327C2.96094 9.59964 3.61213 10.3229 4.45396 10.4293L7.09428 24.3681C7.17412 24.77 7.52463 25.0593 7.93173 25.0593H18.4526C18.8754 25.0593 19.2345 24.7479 19.2972 24.327L21.2169 10.4125C22.0067 10.2612 22.6038 9.56243 22.6038 8.72327V6.57381C22.6038 5.62411 21.8391 4.85423 20.8958 4.85423H16.761L15.8127 2.62662C15.6108 2.15243 15.1477 1.84497 14.6352 1.84497H10.9282ZM14.9026 4.85423L14.5755 4.08565C14.4409 3.76952 14.1321 3.56455 13.7905 3.56455H11.7729C11.4313 3.56455 11.1225 3.76952 10.9879 4.08565L10.6608 4.85423H14.9026ZM19.4515 10.8196C19.4813 10.6046 19.314 10.4129 19.0969 10.4135L6.63442 10.4418C6.41104 10.4424 6.24295 10.6455 6.28426 10.8651L8.49492 22.6119C8.57434 23.034 8.94295 23.3397 9.37237 23.3397H16.9394C17.3852 23.3397 17.7627 23.0109 17.8239 22.5693L19.4515 10.8196ZM20.0417 8.72327C20.5133 8.72327 20.8958 8.33834 20.8958 7.86349V7.4336C20.8958 6.95875 20.5133 6.57381 20.0417 6.57381H5.52305C5.05137 6.57381 4.66901 6.95875 4.66901 7.4336V7.86349C4.66901 8.33834 5.05137 8.72327 5.52304 8.72327H20.0417Z"
                                                fill="#BA1A1A" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_124_294">
                                                <rect width="25" height="25" fill="white"
                                                    transform="translate(0.283203 0.952148)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <hr class="h-line3">

                        <div class="row">
                            <div class="col table-content">
                                1
                            </div>
                            <div class="col table-content">
                                <div class="product-name">
                                    Trekking sticks
                                </div>
                            </div>
                            <div class="col table-content-2">
                                <div class="product-description">
                                    Hiking Trekking sticks
                                </div>
                            </div>
                            <div class="col table-content">
                                1
                            </div>
                            <div class="col table-content-2">
                                5
                            </div>
                            <div class="col table-content-2">
                                Hiking
                            </div>
                            <div class="col table-content-2">
                                Trekking sticks
                            </div>
                            <div class="col table-content">
                                <a href="">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.9571 3.6421C21.7367 2.42171 19.7581 2.4217 18.5377 3.6421L16.7879 5.39189L8.55249 13.6273C8.41899 13.7608 8.32429 13.9281 8.2785 14.1112L7.23683 18.2779C7.14808 18.6329 7.25209 19.0084 7.51082 19.267C7.76955 19.5258 8.14506 19.6299 8.50004 19.5411L12.6667 18.4994C12.8499 18.4536 13.0171 18.3589 13.1506 18.2254L21.3261 10.0499L23.1358 8.24024C24.3562 7.01985 24.3562 5.0412 23.1358 3.82082L22.9571 3.6421ZM20.0108 5.11523C20.4176 4.70844 21.0772 4.70844 21.484 5.11523L21.6627 5.29395C22.0695 5.70076 22.0695 6.36031 21.6627 6.7671L20.6039 7.82597L18.9836 6.14244L20.0108 5.11523ZM17.5102 7.61585L19.1304 9.29938L11.8816 16.5483L9.67903 17.0989L10.2296 14.8964L17.5102 7.61585ZM5.1224 9.15553C5.1224 8.58023 5.58877 8.11386 6.16406 8.11386H11.3724C11.9477 8.11386 12.4141 7.6475 12.4141 7.07219C12.4141 6.4969 11.9477 6.03053 11.3724 6.03053H6.16406C4.43818 6.03053 3.03906 7.42964 3.03906 9.15553V20.6138C3.03906 22.3398 4.43818 23.7388 6.16406 23.7388H17.6224C19.3483 23.7388 20.7474 22.3398 20.7474 20.6138V15.4055C20.7474 14.8303 20.281 14.3638 19.7057 14.3638C19.1304 14.3638 18.6641 14.8303 18.6641 15.4055V20.6138C18.6641 21.1891 18.1977 21.6555 17.6224 21.6555H6.16406C5.58877 21.6555 5.1224 21.1891 5.1224 20.6138V9.15553Z"
                                            fill="#E1980A" />
                                    </svg>
                                </a>
                            </div>

                            <div class="col table-content-2">
                                <a href="">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_124_294)">
                                            <path
                                                d="M10.8633 21.213C10.6288 21.2379 10.4187 21.0667 10.394 20.8305L9.62933 13.5176C9.60468 13.2815 9.77477 13.0699 10.0093 13.0451L10.434 13.0001C10.6685 12.9753 10.8787 13.1465 10.9033 13.3826L11.668 20.6955C11.6927 20.9317 11.5226 21.1432 11.2881 21.168L10.8633 21.213Z"
                                                fill="#BA1A1A" />
                                            <path
                                                d="M14.7066 21.168C14.472 21.1432 14.3019 20.9317 14.3266 20.6955L15.0912 13.3826C15.116 13.1465 15.3261 12.9753 15.5606 13.0001L15.9853 13.0451C16.2198 13.0699 16.39 13.2815 16.3653 13.5176L15.6006 20.8305C15.576 21.0667 15.3658 21.2379 15.1312 21.213L14.7066 21.168Z"
                                                fill="#BA1A1A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.9282 1.84497C10.4158 1.84497 9.95254 2.15243 9.75067 2.62662L8.8024 4.85423H4.66901C3.72567 4.85423 2.96094 5.62411 2.96094 6.57381V8.72327C2.96094 9.59964 3.61213 10.3229 4.45396 10.4293L7.09428 24.3681C7.17412 24.77 7.52463 25.0593 7.93173 25.0593H18.4526C18.8754 25.0593 19.2345 24.7479 19.2972 24.327L21.2169 10.4125C22.0067 10.2612 22.6038 9.56243 22.6038 8.72327V6.57381C22.6038 5.62411 21.8391 4.85423 20.8958 4.85423H16.761L15.8127 2.62662C15.6108 2.15243 15.1477 1.84497 14.6352 1.84497H10.9282ZM14.9026 4.85423L14.5755 4.08565C14.4409 3.76952 14.1321 3.56455 13.7905 3.56455H11.7729C11.4313 3.56455 11.1225 3.76952 10.9879 4.08565L10.6608 4.85423H14.9026ZM19.4515 10.8196C19.4813 10.6046 19.314 10.4129 19.0969 10.4135L6.63442 10.4418C6.41104 10.4424 6.24295 10.6455 6.28426 10.8651L8.49492 22.6119C8.57434 23.034 8.94295 23.3397 9.37237 23.3397H16.9394C17.3852 23.3397 17.7627 23.0109 17.8239 22.5693L19.4515 10.8196ZM20.0417 8.72327C20.5133 8.72327 20.8958 8.33834 20.8958 7.86349V7.4336C20.8958 6.95875 20.5133 6.57381 20.0417 6.57381H5.52305C5.05137 6.57381 4.66901 6.95875 4.66901 7.4336V7.86349C4.66901 8.33834 5.05137 8.72327 5.52304 8.72327H20.0417Z"
                                                fill="#BA1A1A" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_124_294">
                                                <rect width="25" height="25" fill="white"
                                                    transform="translate(0.283203 0.952148)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <hr class="h-line3">
                        <div class="row">
                            <div class="col table-content">
                                2
                            </div>
                            <div class="col table-content">
                                <div class="product-name">
                                    Backpack
                                </div>
                            </div>
                            <div class="col table-content-2">
                                <div class="product-description">
                                    Hiking Backpack
                                </div>
                            </div>
                            <div class="col table-content">
                                2
                            </div>
                            <div class="col table-content-2">
                                5
                            </div>
                            <div class="col table-content-2">
                                Hiking
                            </div>
                            <div class="col table-content-2">
                                Sub-Backpack
                            </div>

                            <div class="col table-content">
                                <a href="">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.9571 3.6421C21.7367 2.42171 19.7581 2.4217 18.5377 3.6421L16.7879 5.39189L8.55249 13.6273C8.41899 13.7608 8.32429 13.9281 8.2785 14.1112L7.23683 18.2779C7.14808 18.6329 7.25209 19.0084 7.51082 19.267C7.76955 19.5258 8.14506 19.6299 8.50004 19.5411L12.6667 18.4994C12.8499 18.4536 13.0171 18.3589 13.1506 18.2254L21.3261 10.0499L23.1358 8.24024C24.3562 7.01985 24.3562 5.0412 23.1358 3.82082L22.9571 3.6421ZM20.0108 5.11523C20.4176 4.70844 21.0772 4.70844 21.484 5.11523L21.6627 5.29395C22.0695 5.70076 22.0695 6.36031 21.6627 6.7671L20.6039 7.82597L18.9836 6.14244L20.0108 5.11523ZM17.5102 7.61585L19.1304 9.29938L11.8816 16.5483L9.67903 17.0989L10.2296 14.8964L17.5102 7.61585ZM5.1224 9.15553C5.1224 8.58023 5.58877 8.11386 6.16406 8.11386H11.3724C11.9477 8.11386 12.4141 7.6475 12.4141 7.07219C12.4141 6.4969 11.9477 6.03053 11.3724 6.03053H6.16406C4.43818 6.03053 3.03906 7.42964 3.03906 9.15553V20.6138C3.03906 22.3398 4.43818 23.7388 6.16406 23.7388H17.6224C19.3483 23.7388 20.7474 22.3398 20.7474 20.6138V15.4055C20.7474 14.8303 20.281 14.3638 19.7057 14.3638C19.1304 14.3638 18.6641 14.8303 18.6641 15.4055V20.6138C18.6641 21.1891 18.1977 21.6555 17.6224 21.6555H6.16406C5.58877 21.6555 5.1224 21.1891 5.1224 20.6138V9.15553Z"
                                            fill="#E1980A" />
                                    </svg>
                                </a>
                            </div>

                            <div class="col table-content-2">
                                <a href="">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_124_294)">
                                            <path
                                                d="M10.8633 21.213C10.6288 21.2379 10.4187 21.0667 10.394 20.8305L9.62933 13.5176C9.60468 13.2815 9.77477 13.0699 10.0093 13.0451L10.434 13.0001C10.6685 12.9753 10.8787 13.1465 10.9033 13.3826L11.668 20.6955C11.6927 20.9317 11.5226 21.1432 11.2881 21.168L10.8633 21.213Z"
                                                fill="#BA1A1A" />
                                            <path
                                                d="M14.7066 21.168C14.472 21.1432 14.3019 20.9317 14.3266 20.6955L15.0912 13.3826C15.116 13.1465 15.3261 12.9753 15.5606 13.0001L15.9853 13.0451C16.2198 13.0699 16.39 13.2815 16.3653 13.5176L15.6006 20.8305C15.576 21.0667 15.3658 21.2379 15.1312 21.213L14.7066 21.168Z"
                                                fill="#BA1A1A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.9282 1.84497C10.4158 1.84497 9.95254 2.15243 9.75067 2.62662L8.8024 4.85423H4.66901C3.72567 4.85423 2.96094 5.62411 2.96094 6.57381V8.72327C2.96094 9.59964 3.61213 10.3229 4.45396 10.4293L7.09428 24.3681C7.17412 24.77 7.52463 25.0593 7.93173 25.0593H18.4526C18.8754 25.0593 19.2345 24.7479 19.2972 24.327L21.2169 10.4125C22.0067 10.2612 22.6038 9.56243 22.6038 8.72327V6.57381C22.6038 5.62411 21.8391 4.85423 20.8958 4.85423H16.761L15.8127 2.62662C15.6108 2.15243 15.1477 1.84497 14.6352 1.84497H10.9282ZM14.9026 4.85423L14.5755 4.08565C14.4409 3.76952 14.1321 3.56455 13.7905 3.56455H11.7729C11.4313 3.56455 11.1225 3.76952 10.9879 4.08565L10.6608 4.85423H14.9026ZM19.4515 10.8196C19.4813 10.6046 19.314 10.4129 19.0969 10.4135L6.63442 10.4418C6.41104 10.4424 6.24295 10.6455 6.28426 10.8651L8.49492 22.6119C8.57434 23.034 8.94295 23.3397 9.37237 23.3397H16.9394C17.3852 23.3397 17.7627 23.0109 17.8239 22.5693L19.4515 10.8196ZM20.0417 8.72327C20.5133 8.72327 20.8958 8.33834 20.8958 7.86349V7.4336C20.8958 6.95875 20.5133 6.57381 20.0417 6.57381H5.52305C5.05137 6.57381 4.66901 6.95875 4.66901 7.4336V7.86349C4.66901 8.33834 5.05137 8.72327 5.52304 8.72327H20.0417Z"
                                                fill="#BA1A1A" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_124_294">
                                                <rect width="25" height="25" fill="white"
                                                    transform="translate(0.283203 0.952148)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <hr class="h-line3">
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
                        <a href="#" onclick="toUserManage()">User Manage</a>
                        <a href="#" onclick="toProductManage()">Product Manage</a>
                        <a href="#" onclick="toOrderHistory()">Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-edit-section" id="product-edit-section">
        <div class="content" id="content">
            <div class="title">
                Product Manage
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    Product Edit
                </div>
            </div>
            <div class="product-edit-container">
                <div class="product-edit-content">
                    <div class="container">
                        <div class="row">.
                            <div class="col-12 col-lg">
                                <img src=" ../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 pt-3">
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="text" name="name" id="name" placeholder="Name">
                                    </input>
                                </div>
                            </div>
                            <div class="col-6 edit-btn-container">
                                <button class='edit-btn'>
                                    Edit Image
                                    <svg class='mb-1' width=" 18" height="17" viewBox="0 0 18 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.7974 0.745559C15.7726 -0.230749 14.1112 -0.230758 13.0865 0.745559L11.6172 2.14539L4.70189 8.73368C4.58979 8.84052 4.51027 8.97435 4.47182 9.12085L3.59713 12.4542C3.52261 12.7382 3.60994 13.0386 3.8272 13.2455C4.04445 13.4525 4.35977 13.5358 4.65785 13.4648L8.15656 12.6314C8.31041 12.5948 8.4508 12.519 8.56294 12.4122L15.4279 5.87183L16.9475 4.42407C17.9723 3.44776 17.9723 1.86484 16.9475 0.888534L16.7974 0.745559ZM14.3234 1.92407C14.665 1.59863 15.2189 1.59863 15.5604 1.92407L15.7105 2.06704C16.0521 2.39248 16.0521 2.92013 15.7105 3.24556L14.8214 4.09266L13.4609 2.74583L14.3234 1.92407ZM12.2237 3.92456L13.5842 5.27138L7.49731 11.0705L5.64784 11.511L6.11019 9.74902L12.2237 3.92456ZM1.82164 5.1563C1.82164 4.69607 2.21325 4.32297 2.69633 4.32297H7.06976C7.55285 4.32297 7.94445 3.94988 7.94445 3.48963C7.94445 3.0294 7.55285 2.6563 7.06976 2.6563H2.69633C1.2471 2.6563 0.0722656 3.77559 0.0722656 5.1563V14.3229C0.0722656 15.7037 1.2471 16.8229 2.69633 16.8229H12.3179C13.7671 16.8229 14.9419 15.7037 14.9419 14.3229V10.1563C14.9419 9.6961 14.5503 9.32293 14.0673 9.32293C13.5842 9.32293 13.1926 9.6961 13.1926 10.1563V14.3229C13.1926 14.7832 12.801 15.1563 12.3179 15.1563H2.69633C2.21325 15.1563 1.82164 14.7832 1.82164 14.3229V5.1563Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="row row-cols-2">
                            <div class='col-12'>
                                <div class='field'>
                                    Product description:
                                    <textarea class='name-edit-inputarea' type="text" name="description"
                                        id="description" placeholder="Description">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class='field'>
                                    Product Size:
                                    <input class='name-edit-input' type="text" name="size" id="size" placeholder="Size">
                                    </input>
                                </div>
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="text" name="product" id="product"
                                        placeholder="Product">
                                    </input>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="category" name="category" id="category"
                                        placeholder="Category">
                                    </input>
                                </div>
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="text" name="sub-category" id="sub-category"
                                        placeholder="Sub-category">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class='button-section'>
                            <button class='update-btn'>
                                Update
                                <svg class='mb-1' width="15" height="15" 0 viewBox="0 0 17 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_185_1067)">
                                        <path
                                            d="M8.47266 17.5251C5.73932 17.5251 3.27266 16.1084 1.80599 13.7001V17.5251H0.472656V11.1501H6.47266V12.5667H2.67266C3.87266 14.7626 6.00599 16.1084 8.47266 16.1084C12.1393 16.1084 15.1393 12.9209 15.1393 9.02505H16.4727C16.4727 13.7001 12.8727 17.5251 8.47266 17.5251ZM1.80599 9.02505H0.472656C0.472656 4.35005 4.07266 0.525055 8.47266 0.525055C11.206 0.525055 13.6727 1.94172 15.1393 4.35005V0.525055H16.4727V6.90005H10.4727V5.48339H14.2727C13.0727 3.28755 10.9393 1.94172 8.47266 1.94172C4.80599 1.94172 1.80599 5.12922 1.80599 9.02505Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_185_1067">
                                            <rect width="16" height="17" fill="white"
                                                transform="translate(0.472656 0.525055)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button class='delete-btn'>
                                Delete
                                <svg class='mb-1' width="18" height="18" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_185_1073)">
                                        <path
                                            d="M8.7313 16.2285C8.54366 16.2485 8.37559 16.1115 8.3558 15.9225L7.74409 10.0722C7.72437 9.88334 7.86044 9.71405 8.04809 9.69419L8.3878 9.65819C8.57544 9.63834 8.74359 9.77534 8.7633 9.96419L9.37501 15.8146C9.3948 16.0035 9.25873 16.1727 9.07109 16.1926L8.7313 16.2285Z"
                                            fill="white" />
                                        <path
                                            d="M11.8059 16.1926C11.6183 16.1727 11.4822 16.0035 11.5019 15.8146L12.1136 9.96419C12.1334 9.77534 12.3015 9.63834 12.4891 9.65819L12.8288 9.69419C13.0165 9.71405 13.1526 9.88334 13.1328 10.0722L12.5211 15.9225C12.5014 16.1115 12.3333 16.2485 12.1456 16.2285L11.8059 16.1926Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.78394 0.734131C8.37401 0.734131 8.00344 0.980095 7.84194 1.35945L7.08333 3.14154H3.77661C3.02194 3.14154 2.41016 3.75745 2.41016 4.5172V6.23677C2.41016 6.93787 2.93111 7.51649 3.60457 7.60163L5.71683 18.7526C5.7807 19.0741 6.06111 19.3056 6.38679 19.3056H14.8035C15.1417 19.3056 15.429 19.0565 15.4792 18.7198L17.0149 7.58813C17.6468 7.46713 18.1244 6.9081 18.1244 6.23677V4.5172C18.1244 3.75745 17.5127 3.14154 16.758 3.14154H13.4502L12.6916 1.35945C12.5301 0.980095 12.1596 0.734131 11.7496 0.734131H8.78394ZM11.9635 3.14154L11.7018 2.52667C11.5942 2.27377 11.3471 2.1098 11.0738 2.1098H9.45973C9.18644 2.1098 8.93944 2.27377 8.83173 2.52667L8.57001 3.14154H11.9635ZM15.6026 7.91385C15.6264 7.74185 15.4926 7.58849 15.3189 7.58892L5.34894 7.61163C5.17023 7.61206 5.03576 7.77456 5.06881 7.9502L6.83734 17.3477C6.90088 17.6853 7.19576 17.9299 7.5393 17.9299H13.5929C13.9496 17.9299 14.2516 17.6668 14.3005 17.3136L15.6026 7.91385ZM16.0747 6.23677C16.4521 6.23677 16.758 5.92882 16.758 5.54894V5.20503C16.758 4.82515 16.4521 4.5172 16.0747 4.5172H4.45985C4.08251 4.5172 3.77661 4.82515 3.77661 5.20503V5.54894C3.77661 5.92882 4.08251 6.23677 4.45984 6.23677H16.0747Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_185_1073">
                                            <rect width="20" height="20" fill="white"
                                                transform="translate(0.267578 0.0198364)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of table -->
            <div class=" burger_container">
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
                        <a href="#" onclick="toUserManage()">User Manage</a>
                        <a href="#" onclick="toProductManage()">Product Manage</a>
                        <a href="#" onclick="toOrderHistory()">Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-edit-section" id="product-edit-section">
        <div class="content" id="content">
            <div class="title">
                Product Manage
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    Product Edit
                </div>
            </div>
            <div class="product-edit-container">
                <div class="product-edit-content">
                    <div class="container">
                        <div class="row">.
                            <div class="col-12 col-lg">
                                <img src=" ../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                            <div class="col-12 col-lg">
                                <img src="../images/Home/product.png" width="100%" alt="product_image"
                                    class="product_image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 pt-3">
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="text" name="name" id="name" placeholder="Name">
                                    </input>
                                </div>
                            </div>
                            <div class="col-6 edit-btn-container">
                                <button class='edit-btn'>
                                    Edit Image
                                    <svg class='mb-1' width=" 18" height="17" viewBox="0 0 18 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.7974 0.745559C15.7726 -0.230749 14.1112 -0.230758 13.0865 0.745559L11.6172 2.14539L4.70189 8.73368C4.58979 8.84052 4.51027 8.97435 4.47182 9.12085L3.59713 12.4542C3.52261 12.7382 3.60994 13.0386 3.8272 13.2455C4.04445 13.4525 4.35977 13.5358 4.65785 13.4648L8.15656 12.6314C8.31041 12.5948 8.4508 12.519 8.56294 12.4122L15.4279 5.87183L16.9475 4.42407C17.9723 3.44776 17.9723 1.86484 16.9475 0.888534L16.7974 0.745559ZM14.3234 1.92407C14.665 1.59863 15.2189 1.59863 15.5604 1.92407L15.7105 2.06704C16.0521 2.39248 16.0521 2.92013 15.7105 3.24556L14.8214 4.09266L13.4609 2.74583L14.3234 1.92407ZM12.2237 3.92456L13.5842 5.27138L7.49731 11.0705L5.64784 11.511L6.11019 9.74902L12.2237 3.92456ZM1.82164 5.1563C1.82164 4.69607 2.21325 4.32297 2.69633 4.32297H7.06976C7.55285 4.32297 7.94445 3.94988 7.94445 3.48963C7.94445 3.0294 7.55285 2.6563 7.06976 2.6563H2.69633C1.2471 2.6563 0.0722656 3.77559 0.0722656 5.1563V14.3229C0.0722656 15.7037 1.2471 16.8229 2.69633 16.8229H12.3179C13.7671 16.8229 14.9419 15.7037 14.9419 14.3229V10.1563C14.9419 9.6961 14.5503 9.32293 14.0673 9.32293C13.5842 9.32293 13.1926 9.6961 13.1926 10.1563V14.3229C13.1926 14.7832 12.801 15.1563 12.3179 15.1563H2.69633C2.21325 15.1563 1.82164 14.7832 1.82164 14.3229V5.1563Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="row row-cols-2">
                            <div class='col-12'>
                                <div class='field'>
                                    Product description:
                                    <textarea class='name-edit-inputarea' type="text" name="description"
                                        id="description" placeholder="Description">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class='field'>
                                    Product Size:
                                    <input class='name-edit-input' type="text" name="size" id="size" placeholder="Size">
                                    </input>
                                </div>
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="text" name="product" id="product"
                                        placeholder="Product">
                                    </input>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="category" name="category" id="category"
                                        placeholder="Category">
                                    </input>
                                </div>
                                <div class='field'>
                                    Product Name:
                                    <input class='name-edit-input' type="text" name="sub-category" id="sub-category"
                                        placeholder="Sub-category">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class='button-section'>
                            <button class='update-btn'>
                                Update
                                <svg class='mb-1' width="15" height="15" 0 viewBox="0 0 17 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_185_1067)">
                                        <path
                                            d="M8.47266 17.5251C5.73932 17.5251 3.27266 16.1084 1.80599 13.7001V17.5251H0.472656V11.1501H6.47266V12.5667H2.67266C3.87266 14.7626 6.00599 16.1084 8.47266 16.1084C12.1393 16.1084 15.1393 12.9209 15.1393 9.02505H16.4727C16.4727 13.7001 12.8727 17.5251 8.47266 17.5251ZM1.80599 9.02505H0.472656C0.472656 4.35005 4.07266 0.525055 8.47266 0.525055C11.206 0.525055 13.6727 1.94172 15.1393 4.35005V0.525055H16.4727V6.90005H10.4727V5.48339H14.2727C13.0727 3.28755 10.9393 1.94172 8.47266 1.94172C4.80599 1.94172 1.80599 5.12922 1.80599 9.02505Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_185_1067">
                                            <rect width="16" height="17" fill="white"
                                                transform="translate(0.472656 0.525055)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button class='delete-btn'>
                                Delete
                                <svg class='mb-1' width="18" height="18" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_185_1073)">
                                        <path
                                            d="M8.7313 16.2285C8.54366 16.2485 8.37559 16.1115 8.3558 15.9225L7.74409 10.0722C7.72437 9.88334 7.86044 9.71405 8.04809 9.69419L8.3878 9.65819C8.57544 9.63834 8.74359 9.77534 8.7633 9.96419L9.37501 15.8146C9.3948 16.0035 9.25873 16.1727 9.07109 16.1926L8.7313 16.2285Z"
                                            fill="white" />
                                        <path
                                            d="M11.8059 16.1926C11.6183 16.1727 11.4822 16.0035 11.5019 15.8146L12.1136 9.96419C12.1334 9.77534 12.3015 9.63834 12.4891 9.65819L12.8288 9.69419C13.0165 9.71405 13.1526 9.88334 13.1328 10.0722L12.5211 15.9225C12.5014 16.1115 12.3333 16.2485 12.1456 16.2285L11.8059 16.1926Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.78394 0.734131C8.37401 0.734131 8.00344 0.980095 7.84194 1.35945L7.08333 3.14154H3.77661C3.02194 3.14154 2.41016 3.75745 2.41016 4.5172V6.23677C2.41016 6.93787 2.93111 7.51649 3.60457 7.60163L5.71683 18.7526C5.7807 19.0741 6.06111 19.3056 6.38679 19.3056H14.8035C15.1417 19.3056 15.429 19.0565 15.4792 18.7198L17.0149 7.58813C17.6468 7.46713 18.1244 6.9081 18.1244 6.23677V4.5172C18.1244 3.75745 17.5127 3.14154 16.758 3.14154H13.4502L12.6916 1.35945C12.5301 0.980095 12.1596 0.734131 11.7496 0.734131H8.78394ZM11.9635 3.14154L11.7018 2.52667C11.5942 2.27377 11.3471 2.1098 11.0738 2.1098H9.45973C9.18644 2.1098 8.93944 2.27377 8.83173 2.52667L8.57001 3.14154H11.9635ZM15.6026 7.91385C15.6264 7.74185 15.4926 7.58849 15.3189 7.58892L5.34894 7.61163C5.17023 7.61206 5.03576 7.77456 5.06881 7.9502L6.83734 17.3477C6.90088 17.6853 7.19576 17.9299 7.5393 17.9299H13.5929C13.9496 17.9299 14.2516 17.6668 14.3005 17.3136L15.6026 7.91385ZM16.0747 6.23677C16.4521 6.23677 16.758 5.92882 16.758 5.54894V5.20503C16.758 4.82515 16.4521 4.5172 16.0747 4.5172H4.45985C4.08251 4.5172 3.77661 4.82515 3.77661 5.20503V5.54894C3.77661 5.92882 4.08251 6.23677 4.45984 6.23677H16.0747Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_185_1073">
                                            <rect width="20" height="20" fill="white"
                                                transform="translate(0.267578 0.0198364)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of table -->
            <div class=" burger_container">
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
                        <a href="#" onclick="toUserManage()">User Manage</a>
                        <a href="#" onclick="toProductManage()">Product Manage</a>
                        <a href="#" onclick="toOrderHistory()">Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-edit-section" id="user-edit-section">
        <div class="content" id="content">
            <div class="title">
                User Manage
            </div>
            <hr class="h-line">
            <div class="top-section">
                <div class="sub-title">
                    User Edit
                </div>
            </div>
            <div class="product-edit-container">
                <div class="product-edit-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 pt-3">
                                <div class='field'>
                                    User ID:
                                    <input class='name-edit-input' type="text" name="name" id="name" placeholder="Name">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-2">
                            <div class="col-6">
                                <div class='field'>
                                    User Name:
                                    <input class='name-edit-input' type="text" name="size" id="size" placeholder="Size">
                                    </input>
                                </div>
                                <div class='field'>
                                    User Email:
                                    <input class='name-edit-input' type="text" name="product" id="product"
                                        placeholder="Product">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class='button-section'>
                            <button class='update-btn'>
                                Update
                                <svg class='mb-1' width="15" height="15" 0 viewBox="0 0 17 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_185_1067)">
                                        <path
                                            d="M8.47266 17.5251C5.73932 17.5251 3.27266 16.1084 1.80599 13.7001V17.5251H0.472656V11.1501H6.47266V12.5667H2.67266C3.87266 14.7626 6.00599 16.1084 8.47266 16.1084C12.1393 16.1084 15.1393 12.9209 15.1393 9.02505H16.4727C16.4727 13.7001 12.8727 17.5251 8.47266 17.5251ZM1.80599 9.02505H0.472656C0.472656 4.35005 4.07266 0.525055 8.47266 0.525055C11.206 0.525055 13.6727 1.94172 15.1393 4.35005V0.525055H16.4727V6.90005H10.4727V5.48339H14.2727C13.0727 3.28755 10.9393 1.94172 8.47266 1.94172C4.80599 1.94172 1.80599 5.12922 1.80599 9.02505Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_185_1067">
                                            <rect width="16" height="17" fill="white"
                                                transform="translate(0.472656 0.525055)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button class='delete-btn'>
                                Delete
                                <svg class='mb-1' width="18" height="18" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_185_1073)">
                                        <path
                                            d="M8.7313 16.2285C8.54366 16.2485 8.37559 16.1115 8.3558 15.9225L7.74409 10.0722C7.72437 9.88334 7.86044 9.71405 8.04809 9.69419L8.3878 9.65819C8.57544 9.63834 8.74359 9.77534 8.7633 9.96419L9.37501 15.8146C9.3948 16.0035 9.25873 16.1727 9.07109 16.1926L8.7313 16.2285Z"
                                            fill="white" />
                                        <path
                                            d="M11.8059 16.1926C11.6183 16.1727 11.4822 16.0035 11.5019 15.8146L12.1136 9.96419C12.1334 9.77534 12.3015 9.63834 12.4891 9.65819L12.8288 9.69419C13.0165 9.71405 13.1526 9.88334 13.1328 10.0722L12.5211 15.9225C12.5014 16.1115 12.3333 16.2485 12.1456 16.2285L11.8059 16.1926Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.78394 0.734131C8.37401 0.734131 8.00344 0.980095 7.84194 1.35945L7.08333 3.14154H3.77661C3.02194 3.14154 2.41016 3.75745 2.41016 4.5172V6.23677C2.41016 6.93787 2.93111 7.51649 3.60457 7.60163L5.71683 18.7526C5.7807 19.0741 6.06111 19.3056 6.38679 19.3056H14.8035C15.1417 19.3056 15.429 19.0565 15.4792 18.7198L17.0149 7.58813C17.6468 7.46713 18.1244 6.9081 18.1244 6.23677V4.5172C18.1244 3.75745 17.5127 3.14154 16.758 3.14154H13.4502L12.6916 1.35945C12.5301 0.980095 12.1596 0.734131 11.7496 0.734131H8.78394ZM11.9635 3.14154L11.7018 2.52667C11.5942 2.27377 11.3471 2.1098 11.0738 2.1098H9.45973C9.18644 2.1098 8.93944 2.27377 8.83173 2.52667L8.57001 3.14154H11.9635ZM15.6026 7.91385C15.6264 7.74185 15.4926 7.58849 15.3189 7.58892L5.34894 7.61163C5.17023 7.61206 5.03576 7.77456 5.06881 7.9502L6.83734 17.3477C6.90088 17.6853 7.19576 17.9299 7.5393 17.9299H13.5929C13.9496 17.9299 14.2516 17.6668 14.3005 17.3136L15.6026 7.91385ZM16.0747 6.23677C16.4521 6.23677 16.758 5.92882 16.758 5.54894V5.20503C16.758 4.82515 16.4521 4.5172 16.0747 4.5172H4.45985C4.08251 4.5172 3.77661 4.82515 3.77661 5.20503V5.54894C3.77661 5.92882 4.08251 6.23677 4.45984 6.23677H16.0747Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_185_1073">
                                            <rect width="20" height="20" fill="white"
                                                transform="translate(0.267578 0.0198364)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of table -->
            <div class=" burger_container">
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