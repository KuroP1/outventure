<!-- check is login only not -->
<?php
session_start();
// if already login then redirect to index
if (isset($_SESSION["user"])) {
    header("Location: index.php");
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
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-container">
        <div class="left-container">
            <img src="../images/Login&Register/LeftBanner.png" alt="Left Banner" />
        </div>

        <?php
        require_once "../config/database.php";
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE email= '$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            $sql2 = "SELECT email FROM users WHERE email= '$email' AND password='$password'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            if ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION["user"] = "$row[email]";
                header("Location: ../index.php");
                die();
            } else {
                echo '<script>alert("Invalid Email / Username or Password, Plz Try Again")</script>';
            }
        }
        ?>
        <div class="right-container">
            <form class="form" action="login.php" method="post">
                <img class="Logo" src="../images/Logo.png" alt="Logo"/>
                <b class="top-text">Login to Your Account</b>
                <input class="form-input" type="email" placeholder="Email Address" name="email">
                <input class="form-input" type="password" placeholder="Password:" name="password">
                <input class="form-button" type="submit" value="Login" name="submit">
                <p class="bottom-text">Do Not Have a Account ? <a href="register.php"><b>Sign Up</b></a></p>
            </form>
        </div>
    </div>
</body>

</html>