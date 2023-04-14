<?php

session_start();

require_once "../config/database.php";
if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email= '$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        // $sql2 = "SELECT email FROM users WHERE email= '$email' AND password='$password'";
        // $result2 = mysqli_query($conn, $sql2);
        // $row2 = mysqli_fetch_assoc($result2);
        //check if email is verified
        if ($row = mysqli_fetch_assoc($result)) {
            //check is admin or not
            $checkAdminSql = "SELECT * FROM users WHERE email= '$email' AND password='$password' AND isAdmin = 1";
            $checkAdminResult = mysqli_query($conn, $checkAdminSql);
            //if yes then redirect to admin dashboard
            if ($checkAdminRow = mysqli_fetch_assoc($checkAdminResult)) {
                //session_start();
                $_SESSION["currentUser"] = $row['Username'];
                $_SESSION["isAdmin"] = $row['isAdmin'];
                header("Location: ../profile/profile.php");
                die();
            }
            //session_start();
            $_SESSION["currentUser"] = $row['Username'];
            $_SESSION["isAdmin"] = $row['isAdmin'];
            header("Location: ../profile/profile.php");
            die();
        } else {
            echo '<script>alert("Invalid Email / Username or Password, Plz Try Again")</script>';
        }
    } else {
        $sql = "SELECT * FROM users WHERE username= '$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            //check is admin or not
            $checkAdminSql = "SELECT * FROM users WHERE username= '$email' AND password='$password' AND isAdmin = 1";
            $checkAdminResult = mysqli_query($conn, $checkAdminSql);
            //if yes then redirect to admin dashboard
            if ($checkAdminRow = mysqli_fetch_assoc($checkAdminResult)) {
                //session_start();
                $_SESSION["currentUser"] = $row['Username'];
                $_SESSION["isAdmin"] = $row['isAdmin'];
                header("Location: ../profile/profile.php");
                die();
            }

            //session_start();
            $_SESSION["currentUser"] = $row['Username'];
            $_SESSION["isAdmin"] = $row['isAdmin'];

            header('Location: ../profile/profile.php');
            die();
        } else {
            echo '<script>alert("Invalid Email / Username or Password, Plz Try Again")</script>';
        }
    }
}
?>

<!-- html display part -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outventure</title>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/Logo_Small.png">
</head>

<body>

    <!-- check is login only not -->

    <div class="main-container">
        <div class="left-container">
            <img src="../images/Login&Register/LeftBanner.png" alt="Left Banner" />
        </div>

        <div class="right-container">
            <form class="form" action="login.php" method="post">
                <img class="Logo" src="../images/Logo.png" alt="Logo" />
                <b class="top-text">Login to Your Account</b>
                <input class="form-input" placeholder="Email Address or Username" name="email">
                <input class="form-input" type="password" placeholder="Password:" name="password">
                <input class="form-button" type="submit" value="Login" name="submit">
                <p class="bottom-text">Do Not Have a Account ? <a href="register.php"><b>Sign Up</b></a></p>
            </form>
        </div>
    </div>
</body>

</html>