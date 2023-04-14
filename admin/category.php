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

<body onload="toCategory()">
    <div class="side_bar">
        <a href='/'>
            <img class="logo" width='200px' src="../images/Logo2.png" alt="logo2" class="logo2">
        </a>
        <div class="nav_section">
            <a href="/admin/user.php" id="user-manage-btn" onclick="toUserManage()">User Manage</a>
            <a href="/admin/product.php" id="product-manage-btn" onclick="toProductManage()">Product
                Manage</a>
            <a href="/admin/order.php" id="order-history-btn" onclick="toOrderHistory()">Order History</a>
            <a href="/admin/category.php" id="category-btn" onclick="toCategory()">
                Category Manage</a>
        </div>
        <img class="logo" src="../images/Logo.png" alt="logo2" class="logo2">
    </div>

    <div class="category-section" id="content">
        <div class="title">
            Category Manage
        </div>
        <hr class="h-line">
        <div class='category-container'>
            <div class='category-container'>
                <div class='Insert-category'>
                    <h2 class="insert_title">Insert Category</h2>
                    <form action="insert_category.php" method="POST">
                        <label class="insert_item" for="category">Category Name:</label>
                        <input class="insert_select" type="text" name="category" required><br>

                        <label class="insert_item" for="subCategory">Sub Category Name: Secperate by , (e.g. Casual, Running)</label>
                        <input class="insert_input" type="text" name="subCategory" required><br>

                        <input class="submit_btn" type="submit" name="submit" value="Add Category">
                    </form>
                </div>
                <div class='Insert-sub-category'>
                    <h2 class='insert_title'>Insert Sub Category</h2>
                    <form action="insert_subCategory.php" method="POST">
                        <label class="insert_item" for="newCategory">Category:</label>
                        <select class="insert_select" id="category" type="select" name="newCategory" onchange="myFunction()" required>
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
                        </select><br>

                        <label class="insert_item" for="newSubCategory">Sub Category Name: Secperate by , (e.g. Casual, Running)</label>
                        <input class='insert_input' type="text" name="newSubCategory" required><br>

                        <input class="submit_btn" type="submit" name="submit" value="Add Sub Category">
                    </form>
                </div>
            </div>
            <!-- end of table -->
            <div class="burger_container">
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
                        <a href="/admin/user.php" id="user-manage-btn" onclick="toUserManage()">User
                            Manage</a>
                        <a href="/admin/product.php" id="product-manage-btn" onclick="toProductManage()">Product
                            Manage</a>
                        <a href="/admin/order.php" id="order-history-btn" onclick="toOrderHistory()">Order
                            History</a>
                        <a href="/admin/category.php" id="category-btn" onclick="toCategory()">
                            Category Manage</a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>