<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
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
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p>Not registered yet <a href="register.php">Register Here</a></p>
        </div>
    </div>
</body>

</html>