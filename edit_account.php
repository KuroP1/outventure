<?php
require_once("config/database.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $name = $_POST["Username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //update user info
    $updateUserquery = "UPDATE users SET Username = ?, email = ?, password = ? WHERE UserID = ?";
    $stmt = $conn->prepare($updateUserquery);
    $stmt->bind_param('sssi', $name, $email, $password, $id);
    $stmt->execute();


    //$sql = "UPDATE users SET email = '" . $email . "', password = '" . $password . "' WHERE id = " . $UserID;


    header("Location: admin_dashboard.php");
    exit();
} else {
    $id = $_GET["id"];
    // Get the user's information query
    $getUserAccount = "SELECT * FROM users WHERE UserID = ?";
    $stmt = $conn->prepare($getUserAccount);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $account = $result->fetch_assoc();


}

$conn->close();
?>
<?php
//write a edit account page

//get user id from the url
//get user info from the database
//display user info in the form
//update user info in the database
//redirect to the admin dashboard



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
        <label for="email">Username:</label>
        <input type="text" name="Username" id="Username" value="<?php echo $account["Username"]; ?>"><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $account["Email"]; ?>"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $account["Password"]; ?>"><br>
        <button type="submit" name="submit">Save Changes</button>
    </form>
</body>

</html>