<?php
session_start();
if (!isset($_SESSION["currentUser"])) {
    header("Location: authentication/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>

<body>
    <div class="container">
        <h1>Welcome to Dashboard</h1>
        <?php
        require_once "config/database.php";
        $sql = "SELECT * FROM users WHERE UserID ='{$_SESSION['currentUser']}'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            echo "<h3>Hi, {$row['Username']}</h3>";
            echo "<h3>Email: {$row['Email']}</h3>";
        }
        ?>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>

</html>