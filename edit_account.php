<?php
require_once("config/database.php");

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "UPDATE users SET email = '" . $email . "', password = '" . $password . "' WHERE id = " . $id;
    $conn->query($sql);

    header("Location: admin_dashboard.php");
    exit();
} else {
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = " . $id;
    $result = $conn->query($sql);

    $account = $result->fetch_assoc();
}

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Account</title>
</head>

<body>
    <h1>Edit Account</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $account["UserID"]; ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $account["email"]; ?>"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $account["password"]; ?>"><br>
        <button type="submit" name="submit">Save Changes</button>
    </form>
</body>

</html>