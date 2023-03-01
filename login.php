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
</head>
<body>
    <div class="main-container">
        <div>
            <img src="images/Login&Register/LeftBanner.png" alt="Left Banner" />
        </div>
        
        <?php
        require_once "config/database.php";
        if (isset($_POST["login"])) {
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
                header("Location: index.php");
                die();
            } else {
                echo "Your username or password is incorrect!";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="">
            </div>
        </form>
        <div>
            <p>Not registered yet <a href="register.php">Register Here</a></p>
        </div>
    </div>
</body>

</html>
