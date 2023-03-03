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
    <title>Outventure</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-container">
        <div class="left-container">
            <img src="images/Login&Register/LeftBanner.png" alt="Left Banner" />
        </div>
        <?php
        require_once "config/database.php";
        if (isset($_POST["submit"])) {

            $email = $_POST["email"];
            $password = $_POST["password"];
            $username = $_POST["username"];

            $errors = array();

            if (empty($email) or empty($password)) {
                array_push($errors, "All fields are required");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }

            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 charactes long");
            }

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo '<script>alert("'.$error.'");</script>';
                }
            } else {
                $sql = "INSERT INTO users (email, password, Username) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $email, $password, $username);
                    mysqli_stmt_execute($stmt);
                    echo 
                    '<script>
                        alert("Registration Successful")
                        window.location.href = "login.php";
                    </script>';
                } else {
                    echo '<script>alert("Something Went Wrong")</script>';
                    die();
                }
            }
        }
        ?>
        <div class="right-container">
            <form class="form" action="register.php" method="post">
                <img class="Logo" src="images/Logo.png" alt="Logo"/>
                <b class="top-text">Register Your Account</b>
                <input class="form-input" type="email" placeholder="Email Address" name="email">
                <input class="form-input" maxlength="8" type="username" placeholder="Username <=6" name="username">
                <input class="form-input" type="password" placeholder="Password: >=8" name="password">
                <input class="form-button" type="submit" value="Register" name="submit">
                <p class="bottom-text">Already Have a Account ? <a href="login.php"><b>Login</b></a></p>
            </form>
        </div>
    </div>
</body>

</html>