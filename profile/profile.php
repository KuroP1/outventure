<?php
session_start();
if (!isset($_SESSION["currentUser"])) {
    header("Location: ../authentication/login.php");
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
    <link rel="stylesheet" href="profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="top-container">
            <span class="profile-text">Profile</span>
            <button><a href="../logout.php">Log Out</a></button>
        </div>
        <hr>

        <div class="content-container">
            <div class="left-container">
                <div class="user-info-container">
                    <img class="avatar" src="../images/profile/avatar.png" alt="avatar" />
                    <?php
                    require_once "../config/database.php";
                    $sql = "SELECT * FROM users WHERE UserID ='{$_SESSION['currentUser']}'";
                    $result = mysqli_query($conn, $sql);

                    if ($row = mysqli_fetch_assoc($result)) {
                        echo "<span class='username-text'>{$row['Username']}</span>";
                        echo "<span class='email-text'>{$row['Email']}</span>";
                    }
                    ?>
                </div>
                <div class="menu-container">
                    <span class="menu-text">Personal Information</span>
                    <span class="menu-text">Bill Payment</span>
                    <span class="menu-text">Order History</span>
                    <span class="menu-text">Gift Cards</span>
                </div>
            </div>
            <div class="right-container">
                <div class="right-container-top-text">
                    <span class="right-container-top-text-main">Personal Information</span>
                    <span class="right-container-top-text-sub">Manage your information, including name, email address.</span>
                </div>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-first">
                            <span class="username-text">Username</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: rgba(49, 94, 82, 1);transform: msFilter;">
                                <path d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z"></path>
                                <path d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z"></path>
                            </svg>
                        </div>
                        <?php
                        require_once "../config/database.php";
                        $sql = "SELECT * FROM users WHERE UserID ='{$_SESSION['currentUser']}'";
                        $result = mysqli_query($conn, $sql);

                        if ($row = mysqli_fetch_assoc($result)) {
                            echo "<span class='email-text'>{$row['Username']}</span>";
                        }
                        ?>
                    </div>
                    <div class="card">
                        <div class="card-first">
                            <span class="username-text">Email Address</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: rgba(49, 94, 82, 1);transform: msFilter;">
                                <path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path>
                            </svg>
                        </div>
                        <?php
                        require_once "../config/database.php";
                        $sql = "SELECT * FROM users WHERE UserID ='{$_SESSION['currentUser']}'";
                        $result = mysqli_query($conn, $sql);

                        if ($row = mysqli_fetch_assoc($result)) {
                            echo "<span class='email-text'>{$row['Email']}</span>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>