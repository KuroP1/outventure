<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <h2>User Accounts</h2>
    <?php
        require_once("view_accounts.php");

        $accounts = getAccounts();

        if (count($accounts) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Email</th><th>Password</th><th>Action</th></tr>";
            foreach ($accounts as $account) {
                echo "<tr><td>" . $account["id"] . "</td><td>" . $account["email"] . "</td><td>" . $account["password"] . "</td><td><a href='edit_account.php?id=" . $account["id"] . "'>Edit</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No accounts found.</p>";
        }
    ?>
</body>

</html>