<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require("../config/database.php");
if (isset($_GET['id'])) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $id = $_GET['id'];
    $viewOrderSQL = "SELECT * FROM orders WHERE OrderID = $id";
    $resOrder = mysqli_query($conn, $viewOrderSQL);
    if (mysqli_num_rows($resOrder) > 0) {
        $orders = mysqli_fetch_assoc($resOrder);
        $orderID = $orders['OrderID'];
        $productName = $orders['ProductName'];
        $buyQuantity = $orders['BuyQuantity'];
        $amount = $orders['Amount'];
        $username = $orders['Username'];
        $orderDate = $orders['OrderDate'];
        $paymentMethod = $orders['paymentMethod'];
        $orderStatus = $orders['orderStatus'];
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newOrderStatus = $_POST['orderStatus'];
    $updateOrderStatusSQL = "UPDATE orders SET orderStatus = ? WHERE OrderID = ?";

    // Prepare and execute the query using prepared statements
    $stmt = mysqli_prepare($conn, $updateOrderStatusSQL);
    mysqli_stmt_bind_param($stmt, 'si', $newOrderStatus, $id);
    $resOrder = mysqli_stmt_execute($stmt);

    if ($resOrder) {
        echo "<script>alert('Order updated successfully!');window.location.href='order.php';</script>";
    } else {
        echo "<script>alert('Order update failed!');window.location.href='order.php';</script>";
    }
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
            <a href="/outventure/admin/product.php" id="product-manage-btn" onclick="toProductManage()">Product Manage</a>
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
                    Order
                    <?php
                    ini_set('display_errors', 1);
                    error_reporting(E_ALL);
                    require("../config/database.php");

                    $currentOrderID = $_GET['id'];
                    $viewOrderProductSQL = "SELECT * from orders WHERE OrderID='$currentOrderID'";
                    $result = mysqli_query($conn, $viewOrderProductSQL);
                    $orderProduct = array();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $orderProduct[] = $row;
                        }
                    }
                    echo $currentOrderID;
                    ?>
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
                                Product Name
                            </div>
                            <div class="col table-header-2">
                                Price
                            </div>
                        </div>
                        <hr class="h-line2">
                        <?php
                        foreach ($orderProduct as $resOrderProduct) {
                            echo
                            "
                            <div class='row'>
                                <div class='col table-content'>
                                    " . $resOrderProduct["ProductName"] . "
                                </div>
                            <div class='col table-content'>
                                " . $resOrderProduct["Amount"] . "
                            </div>

                            </div> 
                            <hr class='h-line3'>";
                        }
                        ?>
                        <?php
                        ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        require("../config/database.php");

                        $viewOrderSQL = "SELECT OrderID, GROUP_CONCAT(ProductName) as ProductNames, GROUP_CONCAT(BuyQuantity) as BuyQuantities, SUM(Amount) as TotalAmount, Username, OrderDate, paymentMethod, orderStatus
                        FROM orders WHERE OrderID='$currentOrderID'
                        GROUP BY OrderID, Username, OrderDate, paymentMethod, orderStatus";
                        $resOrder = mysqli_query($conn, $viewOrderSQL);
                        $orders = mysqli_fetch_assoc($resOrder);
                        echo
                        "
                                <div>
                                    <span>Create Date: </span> " . $orders["OrderDate"] . "
                                </div>
                                <div>
                                    <span>Username: </span> " . $orders["Username"] . "
                                </div>
                                <div>
                                    <span>Total Price: </span>    " . $orders["TotalAmount"] . "
                                </div>
                                <div>
                                    <span>Payment Method: </span>     " . $orders["paymentMethod"] . "
                                </div>";
                        ?>
                        <form action="edit_order.php?id=<?php echo $orders["OrderID"]; ?>" method="POST" enctype="multipart/form-data">
                            <div class='field'>
                                <b>Status</b>
                                <select class='name-edit-input' id="status" type="select" name="orderStatus">

                                </select>
                            </div>
                            <div class='button-section'>
                                <button class='update-btn' type="submit">
                                    Update
                                    <svg class='mb-1' width="15" height="15" 0 viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_185_1067)">
                                            <path d="M8.47266 17.5251C5.73932 17.5251 3.27266 16.1084 1.80599 13.7001V17.5251H0.472656V11.1501H6.47266V12.5667H2.67266C3.87266 14.7626 6.00599 16.1084 8.47266 16.1084C12.1393 16.1084 15.1393 12.9209 15.1393 9.02505H16.4727C16.4727 13.7001 12.8727 17.5251 8.47266 17.5251ZM1.80599 9.02505H0.472656C0.472656 4.35005 4.07266 0.525055 8.47266 0.525055C11.206 0.525055 13.6727 1.94172 15.1393 4.35005V0.525055H16.4727V6.90005H10.4727V5.48339H14.2727C13.0727 3.28755 10.9393 1.94172 8.47266 1.94172C4.80599 1.94172 1.80599 5.12922 1.80599 9.02505Z" fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_185_1067">
                                                <rect width="16" height="17" fill="white" transform="translate(0.472656 0.525055)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </button>
                                <a href="/outventure/admin/delete_order.php?id=<?php echo $currentOrderID; ?>" onclick='toOrderHistory()'>
                                    <button class='delete-btn' type="button">
                                        Delete
                                        <svg class='mb-1' width="18" height="18" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_185_1073)">
                                                <path d="M8.7313 16.2285C8.54366 16.2485 8.37559 16.1115 8.3558 15.9225L7.74409 10.0722C7.72437 9.88334 7.86044 9.71405 8.04809 9.69419L8.3878 9.65819C8.57544 9.63834 8.74359 9.77534 8.7633 9.96419L9.37501 15.8146C9.3948 16.0035 9.25873 16.1727 9.07109 16.1926L8.7313 16.2285Z" fill="white" />
                                                <path d="M11.8059 16.1926C11.6183 16.1727 11.4822 16.0035 11.5019 15.8146L12.1136 9.96419C12.1334 9.77534 12.3015 9.63834 12.4891 9.65819L12.8288 9.69419C13.0165 9.71405 13.1526 9.88334 13.1328 10.0722L12.5211 15.9225C12.5014 16.1115 12.3333 16.2485 12.1456 16.2285L11.8059 16.1926Z" fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.78394 0.734131C8.37401 0.734131 8.00344 0.980095 7.84194 1.35945L7.08333 3.14154H3.77661C3.02194 3.14154 2.41016 3.75745 2.41016 4.5172V6.23677C2.41016 6.93787 2.93111 7.51649 3.60457 7.60163L5.71683 18.7526C5.7807 19.0741 6.06111 19.3056 6.38679 19.3056H14.8035C15.1417 19.3056 15.429 19.0565 15.4792 18.7198L17.0149 7.58813C17.6468 7.46713 18.1244 6.9081 18.1244 6.23677V4.5172C18.1244 3.75745 17.5127 3.14154 16.758 3.14154H13.4502L12.6916 1.35945C12.5301 0.980095 12.1596 0.734131 11.7496 0.734131H8.78394ZM11.9635 3.14154L11.7018 2.52667C11.5942 2.27377 11.3471 2.1098 11.0738 2.1098H9.45973C9.18644 2.1098 8.93944 2.27377 8.83173 2.52667L8.57001 3.14154H11.9635ZM15.6026 7.91385C15.6264 7.74185 15.4926 7.58849 15.3189 7.58892L5.34894 7.61163C5.17023 7.61206 5.03576 7.77456 5.06881 7.9502L6.83734 17.3477C6.90088 17.6853 7.19576 17.9299 7.5393 17.9299H13.5929C13.9496 17.9299 14.2516 17.6668 14.3005 17.3136L15.6026 7.91385ZM16.0747 6.23677C16.4521 6.23677 16.758 5.92882 16.758 5.54894V5.20503C16.758 4.82515 16.4521 4.5172 16.0747 4.5172H4.45985C4.08251 4.5172 3.77661 4.82515 3.77661 5.20503V5.54894C3.77661 5.92882 4.08251 6.23677 4.45984 6.23677H16.0747Z" fill="white" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_185_1073">
                                                    <rect width="20" height="20" fill="white" transform="translate(0.267578 0.0198364)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
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
                    <img class="logo" src="/images/Logo2.png" alt="logo2" class="logo2">
                    <div class="nav_section">
                        <a href="/outventure/admin/user.php" id="user-manage-btn" onclick="toUserManage()">User Manage</a>
                        <a href="/outventure/admin/product.php" id="product-manage-btn" onclick="toProductManage()">Product Manage</a>
                        <a href="/outventure/admin/order.php" id="order-history-btn" onclick="toOrderHistory()">Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    var statusArray = [
        "Pending",
        "Processing",
        "Shipped",
        "Delivered",
        "Cancelled",
        "Paid"
    ]

    var currentStatus = "<?php echo $orders['orderStatus']; ?>";

    function setDefaultSubCategory() {
        var selectElement = document.getElementById('status');
        while (selectElement.options.length > 0) {
            selectElement.remove(0);
        }

        var option = document.createElement("option");
        option.text = currentStatus;
        option.value = currentStatus;
        selectElement.add(option);

        for (var i = 0; i < statusArray.length; i++) {
            if (statusArray[i] != currentStatus) {
                var option = document.createElement("option");
                option.text = statusArray[i];
                option.value = statusArray[i];
                selectElement.add(option);
            }
        }
    }

    setDefaultSubCategory();
</script>